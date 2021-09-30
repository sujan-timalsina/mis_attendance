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

    public function getSearchResults($type,$agree_type){
        // $query = $this->db->query('SELECT CONCAT(first_name," ",last_name) AS full_name,id,agreement_type,type FROM employee where type="'.$type.'" AND agreement_type="'.$agree_type.'"');
        $query = $this->db->query('SELECT CONCAT(first_name," ",last_name) AS full_name,employee_id FROM employee WHERE agreement_type="'.$agree_type.'"');

        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }
}