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

    public function insert_form_data($data)
    {
        $num = $data['loop_num'];

        for ($i = 0; $i < $num; $i++) {
            $emp_id = $data['emp_id'][$i];
            $vacation_date = $data['start_date'][$i];
            $remarks = $data['remarks'][$i];

            $insert_query = $this->db->query("INSERT INTO fp_individual_vacation(employee_id,date,remarks) VALUES($emp_id,'$vacation_date','$remarks')");
        }

        if ($insert_query) {
            return true;
        } else {
            return false;
        }
    }
}
