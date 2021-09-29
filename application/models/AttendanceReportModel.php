<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AttendanceReportModel extends CI_Model
{
    public function getAllTypes()
    {
        $query = $this->db->query('SELECT distinct type from employee ORDER BY type');
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }
}