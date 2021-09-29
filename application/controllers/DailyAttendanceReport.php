<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DailyAttendanceReport extends CI_Controller
{
    public function index(){
        $data['title'] = '>> Daily Attendance Report ';
        $data['username'] = $this->session->userdata('username');
        $this->load->view('header', $data);
        $this->load->view('daily_attendance_report');
        $this->load->view('footer');
}
}
?>