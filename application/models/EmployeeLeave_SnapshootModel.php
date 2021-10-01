<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EmployeeLeave_SnapshootModel extends CI_Model
{

    public function get_year()
    {
        $select_year = $this->db->query("SELECT distinct year from fp_year order by year desc");
        if ($select_year) {
            return $select_year->result();
        }
    }
}
