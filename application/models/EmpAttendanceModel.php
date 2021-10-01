<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EmpAttendanceModel extends CI_Model
{
    public function getRecords($id){
        $query=$this->db->query('SELECT CONCAT(e.first_name," ",e.last_name)AS full_name,e.agreement_type,e.type,phone_no FROM employee e WHERE employee_id='.$id);
        return $query->row();
    }
}