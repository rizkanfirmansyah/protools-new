<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Process_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    show_404();
  }

  public function login()
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
    return $error;
  }

  public function sign()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $email = $this->input->post('email');
    $codeUser = $this->input->post('codeUser');

    $check_username = $this->db->get_where('user', ['username' => $username])->num_rows();
    $check_email = $this->db->get_where('user', ['email' => $email])->num_rows();
    $check_code = $this->db->get_where('user_code', ['email' => $email, 'active' => 1])->row();
    if ($check_username < 1) {
      if ($check_email < 1) {
        if ($codeUser) {
          $data = [
            'username' => htmlspecialchars(strtolower($username)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'image' => 'profile.png',
            'status' => 1,
            'role_id' => 3,
            'create_at' => date('Y-m-d H:i:s'),
          ];
          if ($check_code) {
            if ($check_code->code == $codeUser) {
              $this->db->insert('user', $data);
              return 'sukses';
            } else {
              return 'Code do Not Match';
            }
          }
          return 'Code Not Found, please contact admin before register';
        } else {
          $data = [
            'username' => htmlspecialchars(strtolower($username)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'image' => 'profile.png',
            'status' => 1,
            'role_id' => 4,
            'create_at' => date('Y-m-d H:i:s'),
          ];
          $this->db->insert('user', $data);
          return 'Sukses';
        }
      } else {
        return 'Email Has been Used';
      }
    } else {
      return 'Username has been Registered';
    }
  }

  public function insert_project()
  {
    $data = [
      'title' => htmlspecialchars($this->input->post('title')),
      'description' => htmlspecialchars($this->input->post('description')),
      'client_company' => htmlspecialchars($this->input->post('client_company')),
      'client_name' => htmlspecialchars($this->input->post('client_name')),
      'type' => htmlspecialchars($this->input->post('type')),
      'deadline' => htmlspecialchars($this->input->post('deadline')),
      'rules' => htmlspecialchars($this->input->post('rules')),
      'status' => htmlspecialchars($this->input->post('status')),
      'create_by' => htmlspecialchars($this->input->post('create_by')),
      'create_at' => htmlspecialchars($this->input->post('create_at')),
    ];
    if (empty($_POST['idp'])) {
      $this->db->insert('project', $data);
      $res = $this->db->get_where('project', ['create_at' => $data['create_at'], 'title' => $data['title']])->row();
    } else {
      $this->db->where('id', $_POST['idp']);
      $this->db->update('project', $data);
      $res = $this->db->get_where('project', ['id' => $_POST['idp']])->row();
    }

    return $res;
  }


  public function insert_timeline()
  {
    $id = $this->db->get_where('detail_project', ['project_id' => $this->session->userdata('id')])->row()->id;
    $data = [
      'project_detail_id' => $id,
      'point' => $this->input->post('point'),
      'description' => $this->input->post('desc'),
      'create_at' => date('Y-m-d H:i:s'),
      'updated' => date('Y-m-d H:i:s'),
      'create_by' => $this->session->userdata('username')
    ];
    $this->db->insert('point_project', $data);
  }

  public function insert_point()
  {
    $data = [
      'id_point' => $this->input->post('id'),
      'point_name' => $this->input->post('point'),
      'status' => 0,
      'create_at' => date('Y-m-d H:i:s'),
      'updated' => date('Y-m-d H:i:s'),
      'create_by' => $this->session->userdata('username'),
      'update_by' => $this->session->userdata('username'),
    ];
    $this->db->insert('detail_point', $data);
  }

  public function delete_timeline()
  {
    $this->db->delete('point_project', ['point_id' => $this->input->post('id')]);
  }

  public function delete_point()
  {
    $this->db->delete('detail_point', ['id' => $this->input->post('id')]);
  }

  public function check_timeline()
  {
    $this->db->where('point_id', $this->input->post('id'))->set('status', $this->input->post('stats'))->update('point_project');
  }

  public function check_point()
  {
    $this->db->where('id', $this->input->post('id'))->set('status', $this->input->post('status'))->update('detail_point');
  }

  // ------------------------------------------------------------------------

}

/* End of file Process_model.php */
/* Location: ./application/models/Process_model.php */