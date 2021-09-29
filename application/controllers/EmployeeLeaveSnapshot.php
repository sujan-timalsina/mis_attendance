<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeLeaveSnapshot extends CI_Controller
{
    public function index(){
        $data['title'] = '>> Employee Leave Snapshot ';
        $data['username'] = $this->session->userdata('username');
        $this->load->view('header', $data);
        $this->load->view('employee_leave_snapshot');
        $this->load->view('footer');
}
}
?>