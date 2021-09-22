<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vacation_entryController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vacation_entryModel');
    }

    public function index()
    {
        $data['title'] = '>> Category Administration for Attendance System';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);
        $this->load->view('vacation_entry');
        $this->load->view('footer');
    }

    public function get_num()
    {
        $view_data['num'] = $this->input->get('no_of_vacation');

        $view_data['get_type'] = $this->Vacation_entryModel->get_type();
        $view_data['get_category'] = $this->Vacation_entryModel->get_category();

        $data['title'] = '>> Category Administration for Attendance System';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);
        $this->load->view('vacation_entry1', $view_data);
        $this->load->view('footer');
    }

    public function insert_form_data()
    {
        $num = $this->input->post('no_of_vac');
        for ($i = 0; $i < $num; $i++) {
            $sdate[] = $this->input->post('sdate_' . $i);
            $edate[] = $this->input->post('edate_' . $i);
            $remark[] = $this->input->post('remark_' . $i);
            $assign[] = $this->input->post('assign_' . $i);
            $type[] = $this->input->post('type_' . $i);
        }

        $data = [
            'loop_num' => $num,
            'start_date' => $sdate,
            'end_date' => $edate,
            'remarks' => $remark,
            'assign' => $assign,
            'type' => $type
        ];

        // $this->Vacation_entryModel->insert_form_data($data);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // echo sizeof($data['assign'][0], 1);
        // echo "<br>";
        // echo sizeof($data['assign'][1], 1);
        // echo "<br>";
        // echo $data['assign'][1][0];
    }
}
