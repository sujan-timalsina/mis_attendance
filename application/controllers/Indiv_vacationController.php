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
}
