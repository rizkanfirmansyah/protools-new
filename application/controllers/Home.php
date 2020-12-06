<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Project_model', 'project');
  }

  public function index()
  {
    check_session();
    $this->load->view('template/id/layout');
  }

  public function login()
  {
    check_login();
    $this->load->view('template/login/layout');
  }

  public function detail()
  {
    check_session();
    $title = $_GET['title'];
    $idp = $_GET['idp'];
    if (!empty($idp)) {
      $data = [
        'project' => $this->project->getDetail($idp),
        'key' => $this->project->getKey($idp),
        'rules' => $this->project->getRules($idp),
      ];
      if ($data['project'] == null) {
        redirect('id/project');
      } else {
        $this->load->view('template/id/layout', $data);
      }
    } else {
      redirect('id/project');
    }
  }

  public function timeline()
  {
    check_session();
    check_access();
    $this->load->view('template/id/layout');
  }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */