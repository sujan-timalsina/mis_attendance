<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DailysheetController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = '>> Attendance Daily Sheet';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);
        $this->load->view('daily_sheet');
        $this->load->view('footer');
    }
}
// hello sujan how u doin.. is this working/????
