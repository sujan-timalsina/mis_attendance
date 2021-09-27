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

    public function insert($emp_data)
    {
        $emp_id = $emp_data['emp_id'];
        $emp_check = $emp_data['emp_check'];
        $emp_date = $emp_data['emp_date'];
        $emp_time = $emp_data['emp_time'];
        $emp_remarks = $emp_data['emp_remarks'];

        $find_emp_cat = $this->db->query("SELECT fp_category_id from fp_employee_category where employee_id=$emp_id and status=1");

        if ($find_emp_cat->num_rows() == 1) {
            $res = $find_emp_cat->result();
            foreach ($res as $row) {
                $emp_cat = $row->fp_category_id;

                $insert_query = $this->db->query("INSERT into fp_timestamp(employee_id,timestamp_date,timestamp_time,is_check_in,updated_by_id,remarks,fp_employee_category_id) VALUES($emp_id,'$emp_date','$emp_time',$emp_check,NULL,'$emp_remarks',$emp_cat)");
            }
        } else {
            return false;
        }

        if ($insert_query) {
            return true;
        } else {
            return false;
        }
    }

    public function get_spec_emp($id)
    {
        $get_id = $this->db->query("SELECT * FROM fp_timestamp WHERE fp_timestamp_id=$id");
        if ($get_id) {
            return $get_id->result();
        }
    }

    public function post_edit($data)
    {
        $timestamp_id = $data['timestamp_id'];
        $emp_id = $data['emp_id'];
        $emp_check = $data['emp_check'];
        $emp_date = $data['emp_date'];
        $emp_time = $data['emp_time'];
        $emp_remarks = $data['emp_remarks'];

        $edit_query = $this->db->query("UPDATE fp_timestamp set employee_id=$emp_id,timestamp_date='$emp_date',timestamp_time='$emp_time',is_check_in=$emp_check,remarks='$emp_remarks' where fp_timestamp_id=$timestamp_id");

        if ($edit_query) {
            return true;
        } else {
            return false;
        }
    }
}
