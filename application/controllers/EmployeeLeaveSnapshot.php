<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeLeaveSnapshot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('EmployeeLeave_SnapshootModel');
    }

    public function index()
    {
        $data['title'] = '>> Employee Leave Snapshot ';
        $data['username'] = $this->session->userdata('username');

        $view_data['get_year'] = $this->EmployeeLeave_SnapshootModel->get_year();

        $this->load->view('header', $data);
        $this->load->view('employee_leave_snapshot', $view_data);
        $this->load->view('footer');
    }
}
