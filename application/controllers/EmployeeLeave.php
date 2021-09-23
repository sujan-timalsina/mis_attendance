<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeLeave extends CI_Controller
{
    public function index(){
        $data['title'] = '>> Employee Leave ';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);
        // $emp_data['emp_cat'] = $this->EmployeeTimeModel->get_emp_cat();
        // $emp_data['cat'] = $this->EmployeeTimeModel->get_cat();
        $emp_data['emp_names']=$this->EmployeeLeaveModel->getAllEmployees();
        $emp_data['emp_cat']=$this->EmployeeLeaveModel->getAllRecords();
        $this->load->view('employee_leave',$emp_data);
        $this->load->view('footer');  
    }

    
}
?>