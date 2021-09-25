<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DailysheetModel extends CI_Model
{
    public function get_emp_data()
    {
        $select_query = $this->db->query("SELECT employee_id,CONCAT(first_name,' ',middle_name,' ',last_name) AS name FROM employee WHERE status='Currently Working' ORDER BY first_name");
        if ($select_query) {
            return $select_query->result();
        }
    }

    public function select_emp_data($data)
    {
        if ($data['emp_id'] == 0) {
            $select_query = $this->db->query("SELECT fp_timestamp_id,fp.employee_id,concat(emp.first_name,' ',emp.middle_name,' ',emp.last_name) as name,timestamp_date,timestamp_time,check_remarks,is_check_in,fp.updated_by_id,concat(usr.fname,' ',usr.lname) as usr_name,fp.remarks,fp.fp_employee_category_id from fp_timestamp fp inner join employee emp on(fp.employee_id = emp.employee_id) left join user usr on(usr.user_id=fp.updated_by_id)");
        } else {
            $emp_id = $data['emp_id'];
            $select_query = $this->db->query("SELECT fp_timestamp_id,fp.employee_id,concat(emp.first_name,' ',emp.middle_name,' ',emp.last_name) as name,timestamp_date,timestamp_time,check_remarks,is_check_in,fp.updated_by_id,concat(usr.fname,' ',usr.lname) as usr_name,fp.remarks,fp.fp_employee_category_id from fp_timestamp fp inner join employee emp on(fp.employee_id = emp.employee_id) left join user usr on(usr.user_id=fp.updated_by_id) WHERE fp.employee_id=$emp_id");
        }
        if ($select_query) {
            return $select_query->result();
        }
    }
}
