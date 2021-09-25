<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DailysheetController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DailysheetModel');
    }

    public function index()
    {
        $data['title'] = '>> Attendance Daily Sheet';
        $data['username'] = $this->session->userdata('username');

        $view_data['emp_data'] = $this->DailysheetModel->get_emp_data();

        $this->load->view('header', $data);
        $this->load->view('daily_sheet', $view_data);
        $this->load->view('footer');
    }

    public function select_emp_data()
    {
        $emp_id = $this->input->post('emp_id');

        $data = [
            'emp_id' => $emp_id
        ];

        $view_data['emp_details'] = $this->DailysheetModel->select_emp_data($data);

        //Below same as index
        $data['title'] = '>> Attendance Daily Sheet';
        $data['username'] = $this->session->userdata('username');

        $view_data['emp_data'] = $this->DailysheetModel->get_emp_data();

        $this->load->view('header', $data);
        $this->load->view('daily_sheet', $view_data);
        $this->load->view('footer');

        // echo "<pre>";
        // print_r($view_data);
    }
}
