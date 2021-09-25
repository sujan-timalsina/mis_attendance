<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditEmployeeLeave extends CI_Controller
{
    public function index($id)
    {
        $id=$id;
        // var_dump($id);
        $data['title'] = '>> Employee Leave >> Edit';
        $data['username'] = $this->session->userdata('username');
        $emp_data['emp_cat']=$this->EmployeeLeaveModel->getAllRecords();
        $emp_data['one_data'] = $this->EmployeeLeaveModel->get_single_record($id);

        $this->load->view('header', $data);
        $this->load->view('edit_employee_leave', $emp_data);
        $this->load->view('footer');
    }

    public function editRecord($id){
        $result=$this->EmployeeLeaveModel->modifyRecord($id,[
            // 'employee_id'=>$this->input->post('employee_id'),
            'leave_type' =>$this->input->post('leave_type_id'),
            'purpose' =>$this->input->post('purpose_id'),
            'leave_from' =>$this->input->post('leave_from_id'),
            'leave_to' =>$this->input->post('leave_to_id'),
            'leave_days' =>$this->input->post('leave_days_id'),
        ]);


        redirect('/EmployeeLeave');
    }
}