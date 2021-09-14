<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run()) {
            //Success
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            //model function
            $this->load->model('LoginModel');

            if ($this->LoginModel->can_login($username, $password)) {
                $session_data = array(
                    'username' => $username
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'home');
            } else {
                $this->session->set_flashdata('login_error', 'Invalid Username and Password');
                redirect(base_url() . 'login');
            }
        } else {
            //Failed
            $this->index();
        }
    }

    // public function loggedin()
    // {
    //     if ($this->session->userdata('username') != '') {
    //         echo '<h2>Welcome - ' . $this->session->userdata('username') . '</h2>';
    //         echo '<a href="' . base_url() . 'logout">Logout</a>';
    //     } else {
    //         redirect(base_url() . 'login');
    //     }
    // }

    function logout()
    {
        $this->session->unset_userdata('username');
        redirect(base_url() . 'login');
    }
}
