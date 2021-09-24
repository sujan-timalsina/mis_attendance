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

    public function addRecord(){
        $result=$this->EmployeeLeaveModel->storeRecord([
            'employee_id'=>$this->input->post('employee_id'),
            'leave_type' =>$this->input->post('leave_type_id'),
            'purpose' =>$this->input->post('purpose_id'),
            'leave_from' =>$this->input->post('leave_from_id'),
            'leave_to' =>$this->input->post('leave_to_id'),
            'leave_days' =>$this->input->post('leave_days_id'),
        ]);


        // redirect('/EmployeeLeave');
    }
    
    public function deleteRecord($leave_id){
        $result=$this->EmployeeLeaveModel->removeRecord($leave_id);
        
    }
    
}
?>