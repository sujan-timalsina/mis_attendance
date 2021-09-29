<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AttendanceReportSummary extends CI_Controller
{
    public function index()
    {
        $data['title'] = '>> Attendance Summary Report ';
        $data['username'] = $this->session->userdata('username');
        $this->load->view('header', $data);

        $emp_data['type']=$this->AttendanceReportModel->getAllTypes();
        $this->load->view('attendance_summary_report',$emp_data);
        $this->load->view('footer');
    }
}
