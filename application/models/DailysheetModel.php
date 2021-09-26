<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DailysheetModel extends CI_Model
{
    public function get_emp_data()
    {
        $select_query = $this->db->query("SELECT employee_id,CONCAT(first_name,' ',middle_name,' ',last_name) AS name FROM employee WHERE status='Currently Working' ORDER BY first_name");
        $select_year = $this->db->query("SELECT distinct year from fp_year order by year desc");
        if ($select_query && $select_year) {
            return $select_query->result();
        }
    }

    public function get_year()
    {
        $select_year = $this->db->query("SELECT distinct year from fp_year order by year desc");
        if ($select_year) {
            return $select_year->result();
        }
    }

    public function select_emp_data($data)
    {
        if ($data['emp_id'] == 0) {
            $emp_year = $data['emp_year'];
            $emp_month = $data['emp_month'];
            $emp_day = $data['emp_day'];

            $select_query = $this->db->query("SELECT fp_timestamp_id,fp.employee_id,concat(emp.first_name,' ',emp.middle_name,' ',emp.last_name) as name,timestamp_date,timestamp_time,check_remarks,is_check_in,fp.updated_by_id,concat(usr.fname,' ',usr.lname) as usr_name,fp.remarks,fp.fp_employee_category_id from fp_timestamp fp inner join employee emp on(fp.employee_id = emp.employee_id) left join user usr on(usr.user_id=fp.updated_by_id) WHERE timestamp_date='$emp_year-$emp_month-$emp_day' order by timestamp_date,timestamp_time,first_name,middle_name,last_name");
        } else {
            $emp_id = $data['emp_id'];
            $emp_year = $data['emp_year'];
            $emp_month = $data['emp_month'];
            $emp_day = $data['emp_day'];

            // $select_query = $this->db->query("SELECT fp_timestamp_id,fp.employee_id,concat(emp.first_name,' ',emp.middle_name,' ',emp.last_name) as name,timestamp_date,timestamp_time,check_remarks,is_check_in,fp.updated_by_id,concat(usr.fname,' ',usr.lname) as usr_name,fp.remarks,fp.fp_employee_category_id from fp_timestamp fp inner join employee emp on(fp.employee_id = emp.employee_id) left join user usr on(usr.user_id=fp.updated_by_id) WHERE fp.employee_id=$emp_id AND YEAR(timestamp_date)='$emp_year' AND MONTH(timestamp_date)='$emp_month' AND DAY(timestamp_date)='$emp_day'");
            $select_query = $this->db->query("SELECT fp_timestamp_id,fp.employee_id,concat(emp.first_name,' ',emp.middle_name,' ',emp.last_name) as name,timestamp_date,timestamp_time,check_remarks,is_check_in,fp.updated_by_id,concat(usr.fname,' ',usr.lname) as usr_name,fp.remarks,fp.fp_employee_category_id from fp_timestamp fp inner join employee emp on(fp.employee_id = emp.employee_id) left join user usr on(usr.user_id=fp.updated_by_id) WHERE fp.employee_id=$emp_id AND timestamp_date='$emp_year-$emp_month-$emp_day' order by timestamp_date,timestamp_time,first_name,middle_name,last_name");
        }
        if ($select_query) {
            return $select_query->result();
        }
    }
}
