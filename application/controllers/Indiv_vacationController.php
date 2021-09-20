<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Indiv_vacationController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = '>> Individual Vacation for Employee';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);
        $this->load->view('indiv_vacation');
        $this->load->view('footer');
    }
}
