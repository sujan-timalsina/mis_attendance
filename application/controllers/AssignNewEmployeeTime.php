<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AssignNewEmployeeTime extends CI_Controller
{
    public function index(){
        $data['title'] = '>> Change Employee Work Time ';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);
        $emp_data['emp_cat'] = $this->EmployeeTimeModel->get_emp_cat();
        $emp_data['cat'] = $this->EmployeeTimeModel->get_cat();
        $this->load->view('new_employee_time',$emp_data);
        $this->load->view('footer');
        
        
    }

    public function setUpdateTime(){

        $emp_id=$this->input->post('employee_id');
        $category_id=$this->input->post('category_id');
        $emp_data['success'] = $this->EmployeeTimeModel->updateTime($emp_id,$category_id);
        redirect('/AssignNewEmployeeTime');

    }

    
}
?>

