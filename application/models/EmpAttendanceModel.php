<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EmpAttendanceModel extends CI_Model
{
    public function getRecords($emp_id)
    {
        $query = $this->db->query('SELECT CONCAT(e.first_name," ",e.last_name)AS full_name,e.agreement_type,e.type,phone_no FROM employee e WHERE employee_id=' . $emp_id);
        return $query->row();
    }

    public function getReports($id)
    {
        $query = $this->db->query("select fp_t.employee_id as emp,year(fp_t.timestamp_date) as Year, month(fp_t.timestamp_date) as Month, day(LAST_DAY(fp_t.timestamp_date))as Total_Days, count(distinct fp_r_v.present) as present, count(distinct fp_r_v.leave) as LeaveDay, count(distinct fp_r_v.vacation) as Vacation, ((day(LAST_DAY(fp_t.timestamp_date)))-(count(distinct fp_r_v.present)+count(distinct fp_r_v.leave)+count(distinct fp_r_v.vacation))) as Absent from fp_timestamp fp_t left join fp_report_view fp_r_v on year(fp_t.timestamp_date)=  year(fp_r_v.date) and month(fp_t.timestamp_date)= month(fp_r_v.date) where fp_t.employee_id=".$id." group by fp_t.employee_id,year(fp_t.timestamp_date),month(fp_t.timestamp_date) order by year desc,month desc");

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
}
