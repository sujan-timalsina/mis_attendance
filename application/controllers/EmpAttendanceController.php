<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmpAttendanceController extends CI_Controller
{
    public function index($id)
    {

        $data['title'] = '>> Employee Within College ';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);

        $emp_data['emp_cat'] = $this->EmpAttendanceModel->getRecords($id);
        $emp_data['emp_det'] = $this->EmpAttendanceModel->getReports($id);
        $emp_data['month'] = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        // echo "<pre>";
        // print_r($emp_data);

        $this->load->view('emp_attendance', $emp_data);

        $this->load->view('footer');
    }
}
