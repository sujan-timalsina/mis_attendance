<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Indiv_vacationModel extends CI_Model
{

    public function get_name()
    {
        $get_name = $this->db->query("SELECT employee_id,concat(first_name,' ',middle_name,' ',last_name) AS full_name FROM employee WHERE status='Currently Working' ORDER BY first_name,middle_name,last_name");
        if ($get_name) {
            return $get_name->result();
        }
    }
}
