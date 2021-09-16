<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vacation_typeController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vacation_typeModel');
    }

    public function index()
    {
        $data['title'] = '>> Vacation Type Administration for Attendance System';
        $data['username'] = $this->session->userdata('username');

        $view_data['vac_type'] = $this->Vacation_typeModel->get_vac_type();

        $this->load->view('header', $data);
        $this->load->view('vacation_type', $view_data);
        $this->load->view('footer');
    }

    public function add_vac()
    {
        $this->form_validation->set_rules('vac_name', 'Vacation Name', 'required');
        $this->form_validation->set_rules('remark', 'Remark', 'required');

        if ($this->form_validation->run()) {
            //Success
            $name = $this->input->post('vac_name');
            $remark = $this->input->post('remark');

            $vacation_entry = [
                'name' => $name,
                'remark' => $remark
            ];

            //model function
            $this->Vacation_typeModel->add_vacation($vacation_entry);

            $check = $this->Vacation_typeModel->add_vacation($vacation_entry);
            if ($check == TRUE) {
                $this->session->set_flashdata('query_message', 'Record has been added');
            } else {
                $this->session->set_flashdata('query_message', 'Failed to add record');
            }
            redirect('vacation_type');
        } else {
            //Failed
            $this->index();
        }
    }
}
