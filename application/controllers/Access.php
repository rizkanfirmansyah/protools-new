<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    show_404();
  }

  public function user_position()
  {
    if ($_POST['username'] == null) {
      echo json_encode(['']);
    } else {
      $data = $this->db->get_where('user', ['username' => $_POST['username']])->row();
      if ($data->role_id == 4) {
        echo json_encode(['participant']);
      } else {
        echo json_encode(['pic', 'participant']);
      }
    }
  }

  public function user_project()
  {
    if ($this->input->post('project_id') == null) {
      echo json_encode(0);
    } else {
      $data = $this->db->select('*')->from('access_project')->join('user', 'username=user_id')->where('project_id', $this->input->post('project_id'))->get()->result();
      echo json_encode($data);
    }
  }

  public function user_role()
  {
    $id = $this->input->post('id');
    $username = $this->session->userdata('username');
    $res = $this->db->get_where('access_project', ['project_id' => $id, 'position' => 'pic'])->num_rows();
    $resul = $this->db->get_where('access_project', ['project_id' => $id, 'user_id' => $username])->num_rows();
    $user = $this->db->get_where('user', ['username' => $username])->row();

    if ($resul > 0) {
      $result = 0;
    } elseif ($res > 0 || $user->role_id == 4) {
      $result = 10;
    } else {
      if ($user->role_id != 4) {
        $result = 1;
      } else {
        $result = 10;
      }
    }

    echo json_encode($result);
  }

  public function out_project()
  {
    $id = $this->input->post('id');
    $username = $this->session->userdata('username');

    $this->db->where('project_id', $id)->where('user_id', $username)->delete('access_project');
  }

  public function set_project()
  {
    $id = $this->input->post('id');
    $secret = $this->input->post('secret');
    $data = ['secret' => $secret, 'id' => $id];

    $this->session->set_userdata($data);
    echo json_encode($secret);
  }
}


/* End of file Access.php */
/* Location: ./application/controllers/Access.php */