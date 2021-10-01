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
        $view_data['get_year'] = $this->DailysheetModel->get_year();
        $view_data['get_month'] = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        $this->load->view('header', $data);
        $this->load->view('daily_sheet', $view_data);
        $this->load->view('footer');
    }

    public function select_emp_data()
    {
        $emp_id = $this->input->post('emp_id');
        $emp_year = $this->input->post('emp_year');
        $emp_month = $this->input->post('emp_month');
        $emp_day = $this->input->post('emp_day');

        $data = [
            'emp_id' => $emp_id,
            'emp_year' => $emp_year,
            'emp_month' => $emp_month,
            'emp_day' => $emp_day
        ];

        $view_data['emp_details'] = $this->DailysheetModel->select_emp_data($data);

        //Below same as index
        $data['title'] = '>> Attendance Daily Sheet';
        $data['username'] = $this->session->userdata('username');

        $view_data['emp_data'] = $this->DailysheetModel->get_emp_data();
        $view_data['get_year'] = $this->DailysheetModel->get_year();
        $view_data['get_month'] = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        $this->load->view('header', $data);
        $this->load->view('daily_sheet', $view_data);
        $this->load->view('footer');

        // echo "<pre>";
        // print_r($view_data);
    }

    public function insert()
    {
        $this->form_validation->set_rules('add_empid', 'Employee Name', 'required');
        $this->form_validation->set_rules('add_check', 'Check', 'required');
        $this->form_validation->set_rules('add_date', 'Date', 'required');
        $this->form_validation->set_rules('add_time', 'Time', 'required');
        // $this->form_validation->set_rules('add_remarks', 'Remarks', 'required');

        if ($this->form_validation->run()) {
            //Success
            $emp_id = $this->input->post('add_empid');
            $emp_check = $this->input->post('add_check');
            $emp_date = $this->input->post('add_date');
            $emp_time = $this->input->post('add_time');
            $emp_remarks = $this->input->post('add_remarks');

            $emp_data = [
                'emp_id' => $emp_id,
                'emp_check' => $emp_check,
                'emp_date' => $emp_date,
                'emp_time' => $emp_time,
                'emp_remarks' => $emp_remarks
            ];

            $check = $this->DailysheetModel->insert($emp_data);
            if ($check == true) {
                $this->session->set_flashdata('insert_msg', 'Inserted Successfully');
                redirect(base_url() . 'daily_sheet');
            } else {
                $this->session->set_flashdata('insert_msg', 'Failed to Insert');
                redirect(base_url() . 'daily_sheet');
            }
        } else {
            //Failed
            // redirect(base_url() . 'daily_sheet');
            $this->index();
        }
    }

    public function get_edit($id)
    {
        $view_data['to_edit_data'] = $this->DailysheetModel->get_spec_emp($id);

        $data['title'] = '>> Edit Attendance Daily Sheet';
        $data['username'] = $this->session->userdata('username');

        $view_data['emp_data'] = $this->DailysheetModel->get_emp_data();
        $view_data['get_year'] = $this->DailysheetModel->get_year();
        $view_data['get_month'] = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        $this->load->view('header', $data);
        $this->load->view('edit_daily_sheet', $view_data);
        $this->load->view('footer');
    }

    public function post_edit()
    {
        $data = [
            'timestamp_id' => $this->input->post('edit_timestamp_id'),
            'emp_id' => $this->input->post('edit_empid'),
            'emp_check' => $this->input->post('edit_check'),
            'emp_date' => $this->input->post('edit_date'),
            'emp_time' => $this->input->post('edit_time'),
            'emp_remarks' => $this->input->post('edit_remarks')
        ];

        $check = $this->DailysheetModel->post_edit($data);
        if ($check == true) {
            $this->session->set_flashdata('edit_msg', 'Updated Successfully');
            redirect(base_url() . 'daily_sheet');
        } else {
            $this->session->set_flashdata('edit_msg', 'Failed to Update');
            redirect(base_url() . 'daily_sheet');
        }
    }

    public function to_delete($id)
    {
        $for_insert = $this->DailysheetModel->get_spec_emp($id);
        echo ($for_insert->employee_id);
        $my_id = $this->DailysheetModel->get_my_id();

        $check = $this->DailysheetModel->insert_deleted($for_insert, $my_id);

        if ($check == true) {
            $this->session->set_flashdata('delete_msg', 'Deleted Successfully');
            redirect(base_url() . 'daily_sheet');
        } else {
            $this->session->set_flashdata('delete_msg', 'Failed to Delete');
            redirect(base_url() . 'daily_sheet');
        }
    }
}
