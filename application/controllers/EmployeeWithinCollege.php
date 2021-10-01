<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeWithinCollege extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_withinCollegeModel');
    }

    public function index()
    {
        $data['title'] = '>> Employee Within College ';
        $data['username'] = $this->session->userdata('username');

        $view_data['emp_details'] = $this->Employee_withinCollegeModel->get_today_emp();
        $this->load->view('header', $data);
        $this->load->view('employee_within_college', $view_data);
        $this->load->view('footer');
    }
}
