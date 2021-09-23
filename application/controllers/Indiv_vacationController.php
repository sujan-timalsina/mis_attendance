<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Indiv_vacationController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Indiv_vacationModel');
    }

    public function index()
    {
        $data['title'] = '>> Individual Vacation for Employee';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);
        $this->load->view('indiv_vacation');
        $this->load->view('footer');
    }

    public function get_num()
    {
        $view_data['num'] = $this->input->get('no_of_vacation');
        $view_data['get_name'] = $this->Indiv_vacationModel->get_name();

        $data['title'] = '>> Individual Vacation for Employee';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);
        $this->load->view('indiv_vacation1', $view_data);
        $this->load->view('footer');
    }

    public function insert_form_data()
    {
        $num = $this->input->post('no_of_vac');
        for ($i = 0; $i < $num; $i++) {
            $eid[] = $this->input->post('eid_' . $i);
            $sdate[] = $this->input->post('sdate_' . $i);
            $edate[] = $this->input->post('edate_' . $i);
            $remark[] = $this->input->post('remark_' . $i);
        }

        $data = [
            'loop_num' => $num,
            'emp_id' => $eid,
            'start_date' => $sdate,
            'end_date' => $edate,
            'remarks' => $remark
        ];

        $check = $this->Indiv_vacationModel->insert_form_data($data);

        if ($check = true) {
            //Success
            $this->session->set_flashdata('msg', 'Successfully updated data');
            redirect(base_url() . 'indiv_vacation');
        } else {
            //Failed
            $this->session->set_flashdata('msg', 'Failed to update data');
            redirect(base_url() . 'indiv_vacation');
        }

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
