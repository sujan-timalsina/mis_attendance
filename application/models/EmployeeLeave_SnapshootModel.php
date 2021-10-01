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

        $search_query = $this->db->query("SELECT el.employee_id,sum(el.leave_days) as total_days,min(leave_from) as start_date, max(leave_to) as now_date,e.first_name,e.last_name,e.middle_name,e.status from employee_leave el inner join employee e on e.employee_id=el.employee_id WHERE {} group by el.employee_id  having sum(el.leave_days)>0  order by total_days desc");
    }
}
