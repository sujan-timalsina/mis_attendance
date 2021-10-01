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

    public function post_search($data)
    {

        $emp_name = $data['emp_name'];
        $emp_datef = $data['emp_datef'];
        $emp_datet = $data['emp_datet'];
        $emp_year = $data['emp_year'];
        $emp_left = $data['emp_left'];

        if ($emp_left == "yes") {
            if ($emp_year == "All") {
                $search_query = $this->db->query("SELECT el.employee_id,sum(el.leave_days) as total_days,min(leave_from) as starting_date, max(leave_to) as now_date,CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) AS full_name,e.status from employee_leave el inner join employee e on e.employee_id=el.employee_id WHERE e.status like'%%' AND CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) like '%$emp_name%' group by el.employee_id  having sum(el.leave_days)>0  order by total_days desc");
            } else {
                $search_query = $this->db->query("SELECT el.employee_id,sum(el.leave_days) as total_days,min(leave_from) as starting_date, max(leave_to) as now_date,CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) AS full_name,e.status from employee_leave el inner join employee e on e.employee_id=el.employee_id WHERE e.status like'%%' AND CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) like '%$emp_name%' AND el.leave_from >='$emp_datef' AND el.leave_to <='$emp_datet' group by el.employee_id  having sum(el.leave_days)>0  order by total_days desc");
            }
        } else {
            if ($emp_year == "All") {
                $search_query = $this->db->query("SELECT el.employee_id,sum(el.leave_days) as total_days,min(leave_from) as starting_date, max(leave_to) as now_date,CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) AS full_name,e.status from employee_leave el inner join employee e on e.employee_id=el.employee_id WHERE e.status<>'Left' AND CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) like '%$emp_name%' group by el.employee_id  having sum(el.leave_days)>0  order by total_days desc");
            } else {
                $search_query = $this->db->query("SELECT el.employee_id,sum(el.leave_days) as total_days,min(leave_from) as starting_date, max(leave_to) as now_date,CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) AS full_name,e.status from employee_leave el inner join employee e on e.employee_id=el.employee_id WHERE e.status<>'Left' AND CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) like '%$emp_name%' AND el.leave_from >='$emp_datef' AND el.leave_to <='$emp_datet' group by el.employee_id  having sum(el.leave_days)>0  order by total_days desc");
            }
        }
        if ($search_query) {
            return $search_query->result();
        }
    }
}
