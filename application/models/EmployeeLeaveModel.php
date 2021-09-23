<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EmployeeLeaveModel extends CI_Model
{
    public function getAllEmployees(){
        $get_query = $this->db->query("SELECT  CONCAT(emp.first_name,' ',emp.last_name)AS full_name,employee_id FROM employee emp where status='Currently Working' ORDER BY first_name");
        if ($get_query->num_rows() > 0) {
            return $get_query->result();
    }
    }

    public function getAllRecords(){
        $get_query = $this->db->query('SELECT CONCAT(emp.first_name,emp.last_name)AS full_name,empl.* FROM employee emp INNER JOIN employee_leave empl ON emp.employee_id=empl.employee_id ORDER BY emp.type,emp.first_name,emp.last_name');
        if ($get_query->num_rows() > 0) {
            return $get_query->result();
    }
    }

}



?>