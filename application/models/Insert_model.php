<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Insert_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function table($table, $data)
  {
    $this->db->insert($table, $data);
  }


  public function update($table, $data, $cond, $value)
  {
    $this->db->where($cond, $value);
    $this->db->update($table, $data);
  }

  // ------------------------------------------------------------------------

}

/* End of file Insert_model.php */
/* Location: ./application/models/Insert_model.php */