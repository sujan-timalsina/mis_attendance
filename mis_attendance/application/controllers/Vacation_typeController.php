<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vacation_typeController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = '>> Vacation Type Administration for Attendance System';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);
        $this->load->view('vacation_type');
        $this->load->view('footer');
    }
}
