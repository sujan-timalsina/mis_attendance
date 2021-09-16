<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_categoryController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_categoryModel');
    }

    public function index()
    {
        $data['title'] = '>> Employee Category Link Administration for Attendance System';
        $data['username'] = $this->session->userdata('username');

        $emp_data['emp_cat'] = $this->Employee_categoryModel->get_emp_cat();
        $emp_data['cat'] = $this->Employee_categoryModel->get_cat();

        $this->load->view('header', $data);
        $this->load->view('employee_category', $emp_data);
        $this->load->view('footer');
    }
}
