<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeWithinCollege extends CI_Controller
{
    public function index(){
        $data['title'] = '>> Employee Within College ';
        $data['username'] = $this->session->userdata('username');
        $this->load->view('header', $data);
        $this->load->view('employee_within_college');
        $this->load->view('footer');
}
}
?>