<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Api extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Api_model', 'api');
  }

  public function index()
  {
    // 
  }

  public function get()
  {
    $table = $_GET['table'];
    $type = $_GET['type'];
    $param = $_GET['param'];
    $data = $this->api->getProject($table, $type, $param);
    echo json_encode($data);
  }

  public function getuser()
  {
    $data = $this->api->getUser();
    echo json_encode($data);
  }

  public function postTable()
  {
    $table = $_POST['table'];
    if (is_array($table)) {
      $data = 'oke array';
    } else {
      $data = 'bykan array';
    }
    // $data = $this->api->getData($table);
    echo json_encode($data);
  }


  public function rule()
  {
    if (empty($this->input->get('idp'))) {
      echo json_encode('Rules Not Found');
    } else {
      echo json_encode($this->db->get_where('rules', ['project_id' => $this->input->get('idp')])->result());
    }
  }

  public function project()
  {
    $data = $this->db->get_where('project', ['id' => $this->input->post('id')])->row();
    echo json_encode($data);
  }

  public function role()
  {
    if ($_POST['con'] == 'active') {
      $this->db->where('role_id', 2);
      $res = $this->db->get('user')->num_rows();
      if ($res < 3) {
        $this->db->where('id !=', 1);
        $data = $this->db->get('role')->result();
      } else {
        $this->db->where('id !=', 1);
        $this->db->where('id !=', 2);
        $data = $this->db->get('role')->result();
      }
    } else {
      $this->db->where('id !=', 1);
      $data = $this->db->get('role')->result();
    }
    echo json_encode($data);
  }

  public function user()
  {
    $data = $this->db->select('*')
      ->from('user')
      ->join('role', 'role_id=role.id', 'left')
      ->where('username', $this->input->post('username'))
      ->get()->row();
    echo json_encode($data);
  }

  public function timeline()
  {
  }
}


/* End of file Api.php */
/* Location: ./application/controllers/Api.php */