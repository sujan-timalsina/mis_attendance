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
}
