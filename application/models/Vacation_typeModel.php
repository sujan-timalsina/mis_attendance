<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Vacation_typeModel extends CI_Model
{
    public function get_vac_type()
    {
        $get_query = $this->db->query('SELECT * FROM fp_vacation_type');

        if ($get_query->num_rows() > 0) {
            return $get_query->result();
        }
    }

    public function add_vacation($vacation_entry)
    {
        $insertion_query = $this->db->query("INSERT INTO fp_vacation_type(vacation_name,remarks) VALUES('$vacation_entry[name]','$vacation_entry[remark]')");

        if ($insertion_query) {
            return true;
        } else {
            return false;
        }
    }
}
