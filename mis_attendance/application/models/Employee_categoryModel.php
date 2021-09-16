<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employee_categoryModel extends CI_Model
{
    public function get_emp_cat()
    {
        $get_query = $this->db->query('SELECT e.employee_id,CONCAT(first_name," ",middle_name," ",last_name) AS full_name,type,category_name,remarks FROM employee e LEFT JOIN fp_employee_category fec ON(e.employee_id=fec.employee_id) LEFT JOIN fp_category fc ON(fc.fp_category_id=fec.fp_category_id) WHERE e.status<>"Left" and e.agreement_type="full-time" and (fec.status is null or fec.status=1) ORDER BY e.first_name,e.middle_name,e.last_name');

        if ($get_query->num_rows() > 0) {
            return $get_query->result();
        }
    }

    public function get_cat()
    {
        $get_query = $this->db->query("SELECT * FROM fp_category ORDER BY category_name");

        if ($get_query->num_rows() > 0) {
            return $get_query->result();
        }
    }
}
