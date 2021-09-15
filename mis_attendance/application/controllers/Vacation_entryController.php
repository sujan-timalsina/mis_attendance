<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vacation_entryController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = '>> Category Administration for Attendance System';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);
        $this->load->view('vacation_entry');
        $this->load->view('footer');
    }
}
