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
        $this->load->view('employee_leave');
        $this->load->view('footer');  
    }

    
}
?>