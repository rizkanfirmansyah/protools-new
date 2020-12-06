<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatable extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Datatable_model', 'datatable');
  }

  public function index()
  {
    // 
  }

  public function table($table)
  {
    $this->$table($table);
  }

  private function user($table)
  {
    $column = array(
      0 => 'username',
      1 => 'email ',
      2 => 'image',
      3 => 'role_id',
      4 => 'status',
      5 => 'create_at',
      6 => 'updated',
    );

    $limit  = $this->input->post('length');
    $start  = $this->input->post('start');
    $order  = $column[$this->input->post('order')[0]['column']];
    $dir    = $this->input->post('order')[0]['dir'];
    $scol = ['username', 'email', 'image', 'role_name'];
    $join = ['role' => 'role.id=role_id'];
    $condition = $_POST['id'];
    $parm = 'role_id';

    $totalData = $this->datatable->allDataCount($table, $join, $parm, $condition);

    $totalFiltered = $totalData;

    if (empty($this->input->post('search')['value'])) {
      $posts = $this->datatable->allData($table, $join, $parm, $condition, $limit, $start, $order, $dir);
    } else {
      $search = $this->input->post('search')['value'];

      $posts =  $this->datatable->DataSearch($table, $join, $parm, $condition, $scol, $limit, $start, $search, $order, $dir);

      $totalFiltered = $this->datatable->SearchCount($table, $join, $parm, $condition, $scol, $search);
    }

    $data = array();
    if (!empty($posts)) {
      $i = 1;
      foreach ($posts as $post) {

        $active = cek_status($post->status, $post->username);
        $edit =  ' <a href="#" id="editUser" data-id="' . $post->username . '" class="badge badge-info"><i class="mdi mdi-table-edit"></i></a>';
        $delete = ' <a href="#" id="deleteUser" data-id="' . $post->username . '" class="badge badge-warning"><i class="mdi mdi-account-minus"></i></a>';
        $urlImg = base_url('assets/private/img/users/');

        $nestedData['id'] = $i++;
        $nestedData['username'] = $post->username;
        $nestedData['email'] = $post->email;
        $nestedData['image'] = '<img src="' . $urlImg . $post->image . '" width="50">';
        $nestedData['role_id'] = $post->role_name;
        $nestedData['status'] = status_active($post->status);
        $nestedData['create_at'] = date('d-M-Y', strtotime($post->create_at));
        $nestedData['updated'] = $post->updated;
        $nestedData['button'] = $active . $edit . $delete;

        $data[] = $nestedData;
      }
    }

    $json_data = array(
      "draw"            => intval($this->input->post('draw')),
      "recordsTotal"    => intval($totalData),
      "recordsFiltered" => intval($totalFiltered),
      "data"            => $data
    );

    echo json_encode($json_data);
  }

  private function project($table)
  {
    $column = array(
      0 => 'title',
      1 => 'progress',
      2 => 'status',
      3 => 'create_by',
      4 => 'deadline',
      5 => 'thumbnail',
    );

    $limit  = $this->input->post('length');
    $start  = $this->input->post('start');
    $order  = $column[$this->input->post('order')[0]['column']];
    $dir    = $this->input->post('order')[0]['dir'];
    $scol = ['title',];
    $join = ['access_project' => 'project.id=project_id'];
    $condition = $this->session->userdata('username');
    $parm = 'user_id';

    $totalData = $this->datatable->allDataCount($table, $join, $parm, $condition);

    $totalFiltered = $totalData;

    if (empty($this->input->post('search')['value'])) {
      $posts = $this->datatable->allData($table, $join, $parm, $condition, $limit, $start, $order, $dir);
    } else {
      $search = $this->input->post('search')['value'];

      $posts =  $this->datatable->DataSearch($table, $join, $parm, $condition, $scol, $limit, $start, $search, $order, $dir);

      $totalFiltered = $this->datatable->SearchCount($table, $join, $parm, $condition, $scol, $search);
    }

    $data = array();
    if (!empty($posts)) {
      foreach ($posts as $post) {

        $edit =  ' <a href="#" id="timelineProject" data-id="' . $post->project_id . '" class="badge badge-info"><i class="mdi mdi-table-edit"></i></a>';
        $delete = ' <a href="#" id="outProject" data-id="' . $post->project_id . '" class="badge badge-danger"><i class="mdi mdi-arrow-right-bold-circle-outline"></i></a>';
        $urlImg = base_url('assets/private/img/');

        if ($post->thumbnail == null) {
          $img = 'image.png';
        } else {
          $img = $post->thumbnail;
        }

        $nestedData['thumbnail']    = '<img src="' . $urlImg . $img . '">';
        $nestedData['title']        = $post->title;
        $nestedData['pic']          = pic($post->project_id, 'pic');
        $nestedData['progress']     = '<div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
    </div>';
        $nestedData['participant']  = pic($post->project_id, 'participant');
        $nestedData['create_at']    = date('d-M-Y', strtotime($post->create_at));
        $nestedData['deadline']     = $post->deadline;
        $nestedData['create_by']    = $post->create_by;
        $nestedData['button']       = $edit . $delete;

        $data[] = $nestedData;
      }
    }

    $json_data = array(
      "draw"            => intval($this->input->post('draw')),
      "recordsTotal"    => intval($totalData),
      "recordsFiltered" => intval($totalFiltered),
      "data"            => $data
    );

    echo json_encode($json_data);
  }

  private function point_project($table)
  {
    $column = array(
      0 => 'point',
      1 => 'description',
      2 => 'status',
      3 => 'create_by',
      4 => 'updated ',
    );

    $limit  = $this->input->post('length');
    $start  = $this->input->post('start');
    $order  = $column[$this->input->post('order')[0]['column']];
    $dir    = $this->input->post('order')[0]['dir'];
    $scol = ['title', 'description'];
    $join = ['detail_project' => 'detail_project.id=project_detail_id'];
    $condition = $this->session->userdata('id');
    $parm = 'project_id';

    $totalData = $this->datatable->allDataCount($table, $join, $parm, $condition);

    $totalFiltered = $totalData;

    if (empty($this->input->post('search')['value'])) {
      $posts = $this->datatable->allData($table, $join, $parm, $condition, $limit, $start, $order, $dir);
    } else {
      $search = $this->input->post('search')['value'];

      $posts =  $this->datatable->DataSearch($table, $join, $parm, $condition, $scol, $limit, $start, $search, $order, $dir);

      $totalFiltered = $this->datatable->SearchCount($table, $join, $parm, $condition, $scol, $search);
    }

    $data = array();
    if (!empty($posts)) {
      $i = 1;
      foreach ($posts as $post) {

        $edit =  ' <a href="#" id="timelineProject" data-id="' . $post->project_id . '" class="badge badge-info"><i class="mdi mdi-table-edit"></i></a>';
        $delete = ' <a href="#" id="outProject" data-id="' . $post->project_id . '" class="badge badge-danger"><i class="mdi mdi-arrow-right-bold-circle-outline"></i></a>';
        $urlImg = base_url('assets/private/img/');

        $nestedData['id']           = $i++;
        $nestedData['point']        = $post->point;
        $nestedData['description']  = $post->description;
        $nestedData['status']       = status_timeline($post->status, $post->point_id);
        $nestedData['updated']      = date('d-M-Y', strtotime($post->updated));
        $nestedData['create_by']    = $post->create_by;
        $nestedData['button']       = $edit . $delete;

        $data[] = $nestedData;
      }
    }

    $json_data = array(
      "draw"            => intval($this->input->post('draw')),
      "recordsTotal"    => intval($totalData),
      "recordsFiltered" => intval($totalFiltered),
      "data"            => $data
    );

    echo json_encode($json_data);
  }
}


/* End of file Datatable.php */
/* Location: ./application/controllers/Datatable.php */