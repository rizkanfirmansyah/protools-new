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

  public function delete_timeline()
  {
    $this->db->delete('point_project', ['point_id' => $this->input->post('id')]);
  }

  public function check_timeline()
  {
    $this->db->where('point_id', $this->input->post('id'))->set('status', $this->input->post('stats'))->update('point_project');
  }

  // ------------------------------------------------------------------------

}

/* End of file Process_model.php */
/* Location: ./application/models/Process_model.php */