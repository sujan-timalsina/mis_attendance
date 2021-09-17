<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Vacation_entryModel extends CI_Model
{
    public function get_type()
    {
        $get_type = $this->db->query("SELECT * FROM fp_vacation_type ORDER BY vacation_name");
        if ($get_type) {
            return $get_type->result();
        }
    }

    public function get_category()
    {
        $get_category = $this->db->query("SELECT * FROM fp_category ORDER BY category_name");
        if ($get_category) {
            return $get_category->result();
        }
    }
}
