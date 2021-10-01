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

    public function post_search()
    {
        $emp_name = $this->input->post('name_id');
        $emp_datef = $this->input->post('datefrom_id');
        $emp_datet = $this->input->post('dateto_id');
        $emp_year = $this->input->post('value_id');
        $emp_left = $this->input->post('emp_left');

        $data = [
            'emp_name' => $emp_name,
            'emp_datef' => $emp_datef,
            'emp_datet' => $emp_datet,
            'emp_year' => $emp_year,
            'emp_left' => $emp_left
        ];

        $view_data['emp_details'] = $this->EmployeeLeave_SnapshootModel->post_search($data);
        $view_data['title_from'] = $emp_datef;
        $view_data['title_to'] = $emp_datet;

        //Same as index
        $data['title'] = '>> Employee Leave Snapshot ';
        $data['username'] = $this->session->userdata('username');

        $view_data['get_year'] = $this->EmployeeLeave_SnapshootModel->get_year();

        $this->load->view('header', $data);
        $this->load->view('employee_leave_snapshot', $view_data);
        $this->load->view('footer');
    }
}
