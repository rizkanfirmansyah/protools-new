<?php

function url($id)
{
    $add = get_instance();
    return $add->uri->segment($id);
}

function urll()
{
    return 'hai';
}

function status_icon($id)
{
    if ($id == 1) {
        return 'mdi mdi-check text-success';
    } else {
        return 'mdi mdi-remove text-danger';
    }
}

function status_icon_full($id)
{
    if ($id == 1) {
        return "<i class='mdi mdi-check text-success'></i> ";
    } else {
        return "<i class='mdi mdi-remove text-danger'></i> ";
    }
}

function status_active($id)
{
    if ($id == 1) {
        return "<span class='badge badge-success'><i class='mdi mdi-account-check'></i> Active</span> ";
    } else {
        return "<span class='badge badge-danger'><i class='mdi mdi-account-remove'></i> Inactive</span> ";
    }
}

function coba_res($id)
{
    $protools = get_instance();
    $data = '';
    $result = $protools->db->get_where('detail_point', ['id_point' => $id]);
    if ($result->num_rows() > 0) {
        foreach ($result->result() as $r) {
            $data .=  status_icon_full($r->status) . $r->point_name . '<br>';
        }
    } else {
        $data = 'tidak ada';
    }

    return $data;
}

function check_image($id)
{
    if ($id == null) {
        return 'image.png';
    } else {
        return $id;
    }
}

function check_type($id)
{
    if ($id == 1) {
        return '<i data-toggle="tooltip" data-placement="top" title="Private" class="ml-2 mdi mdi-lock"></i>';
    } else {
        return '<i data-toggle="tooltip" data-placement="top" title="Public" class="ml-2 mdi mdi-lock-open"></i>';
    }
}

function image_user($username)
{
    $add = get_instance();
    return $add->db->get_where('user', ['username' => $username])->row()->image;
}

function check_username($username)
{
    $add = get_instance();
    $data = $add->db->get_where('user', ['username' => $username])->row();
    return $data->image;
}

function cek_status($id, $parm)
{
    if ($id == 1) {
        return '<a href="#" data-id="0" data-parm="' . $parm . '" id="statusUser" class="badge badge-danger"><i class="mdi mdi-account-remove"></i></a>';
    } else {
        return '<a href="#" data-id="1" data-parm="' . $parm . '" id="statusUser" class="badge badge-success"><i class="mdi mdi-account-check"></i></a>';
    }
}

function check_session()
{
    $add = get_instance();
    $res = $add->db->get_where('user', ['username' => $add->session->userdata('username')])->row();
    if ($add->session->userdata('username')) {
        if ($res->role_id != 1 && url(1) == 'home') {
            show_404();
        }
    } else {
        redirect('login');
    }
}

function check_login()
{
    $add = get_instance();
    if ($add->session->userdata('username')) {
        redirect('id/user');
    } else {
        // redirect('login');
    }
}

function pic($id, $pos)
{
    $add = get_instance();
    $data = '';
    $result = $add->db->select('*')
        ->from('access_project')
        ->join('user', 'user.username=user_id', 'left')
        ->where('project_id', $id)
        ->where('position', $pos)
        ->get();

    if ($result->num_rows() > 0) {
        if ($pos == 'pic') {
            $data = '<img src="' . base_url('assets/private/img/users/') . $result->row()->image . '" alt="image">';
        } else {
            foreach ($result->result() as $r) {
                $data .= '<img src="' . base_url('assets/private/img/users/') . $r->image . '" alt="image">';
            }
        }
    } else {
        $data = 'no ' . $pos;
    }
    return ($data);
}

function check_access()
{
    $add = get_instance();
    $id = $_GET['id'];
    $code = $_GET['codename'];
    $secret = $add->session->userdata('secret');
    $username = $add->session->userdata('username');
    $res = $add->db->get_where('access_project', ['project_id' => $id, 'user_id' => $username]);

    if ($res->num_rows() > 0) {
        if ($code != $secret) {
            show_404();
        }
    } else {
        show_404();
    }
}


function status_timeline($id, $point_id)
{
    $add = get_instance();
    $result = $add->db->get_where('detail_point', ['id_point' => $point_id]);
    $add->db->where('status !=', 1);
    $success = $add->db->get_where('detail_point', ['id_point' => $point_id])->num_rows();
    if ($result->num_rows() < 1) {
        $res = 'Not Found';
        $icon = ' ';
        $color = 'secondary';
        $status = ' ';
    } else {
        $res = $success * 100 / $result->num_rows() . '%';
        if ($res < 50) {
            $icon = 'arrow-down';
            $color = 'danger';
            $status = 'Pending';
        } elseif ($res > 50 && $res < 80) {
            $icon = 'arrow-right';
            $color = 'warning';
            $status = 'In Progress';
        } elseif ($res > 80 && $res < 99) {
            $icon = 'arrow-up';
            $color = 'success';
            $status = 'Fixed';
        } else {
            $icon = 'check';
            $color = 'success';
            $status = 'Completed';
        }
    }

    if ($status == ' ') {
        if ($id == 1) {
            $data = '<label class="badge badge-success statusTimeline" id="timeline' . $point_id . '" data-id="' . $point_id . '">Completed</label>';
        } else {
            $data = '<label class="badge badge-danger statusTimeline" id="timeline' . $point_id . '" data-id="' . $point_id . '">Pending</label>';
        }
    } else {
        $data = '<label class="badge badge-' . $color . ' statusTimeline" id="timeline' . $point_id . '" data-id="' . $point_id . '">' . $status . '</label>';
    }
    $presentase = '<a class="text-' . $color . ' statusPresentase"  data-id="' . $point_id . '" id="point' . $point_id . '" style="display:none;">' . $res . '<i class="mdi mdi-' . $icon  . '"></i></a>';

    return $data . $presentase;
}

function search_value($table, $parm, $id)
{
    $add = get_instance();

    return $add->db->get_where($table, [$parm => $id])->row();
}
