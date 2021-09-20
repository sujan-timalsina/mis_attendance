<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = '';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('header', $data);
        $this->load->view('home');
        $this->load->view('footer');
        echo "changes";
    }
}
