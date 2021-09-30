<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AttendanceReportSummary extends CI_Controller
{
    public function index(){
        $data['title'] = '>> Attendance Summary Report ';
        $data['username'] = $this->session->userdata('username');
        $this->load->view('header', $data);


        
        $emp_data['type']=$this->AttendanceReportModel->getAllTypes();
        $this->load->view('attendance_summary_report',$emp_data);
        $this->load->view('footer');
}
public function get_results(){
    $data['title'] = '>> Attendance Summary Report ';
    $data['username'] = $this->session->userdata('username');
    $this->load->view('header', $data);
    $emp_data['type']=$this->AttendanceReportModel->getAllTypes();
    $type=$this->input->post('selection_id');
    $agree_type=$this->input->post('radio_id');
    $emp_data['results']=$this->AttendanceReportModel->getSearchResults($type,$agree_type);
    $this->load->view('attendance_summary_report',$emp_data);
    $this->load->view('footer');
}
}
?>