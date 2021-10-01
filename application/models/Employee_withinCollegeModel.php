<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employee_withinCollegeModel extends CI_Model
{
    public function get_today_emp()
    {
        $get_query = $this->db->query("SELECT ft.employee_id as emp,concat(emp.first_name,' ',emp.middle_name,' ',emp.last_name) as name,max(ft.timestamp_time) as lastlogintime,emp.type,(count(ft.employee_id)  mod 2) as cnt from fp_timestamp ft inner join employee emp on emp.employee_id=ft.employee_id  Where ft.timestamp_date = curdate() group by ft.employee_id,emp.first_name Having cnt  <> 0 order by name");

        if ($get_query->num_rows() > 0) {
            return $get_query->result();
        }
    }
}
