<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employee_categoryModel extends CI_Model
{
    public function get_emp_cat()
    {
        $get_query = $this->db->query('SELECT CONCAT(first_name," ",last_name) AS full_name,type,category_name,remarks FROM employee e INNER JOIN fp_employee_category fec ON(e.employee_id=fec.employee_id) INNER JOIN fp_category fc ON(fc.fp_category_id=fec.fp_category_id)');

        if ($get_query->num_rows() > 0) {
            return $get_query->result();
        }
    }
}
