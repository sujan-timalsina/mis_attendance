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

    public function edit_data($data)
    {
        $multi_id = $data['ids'];
        $category_id = $data['cat_id'];

        foreach ($multi_id as $id) {
            $this->db->trans_begin();
            $edit_query = $this->db->query("UPDATE fp_employee_category SET status=0 WHERE employee_id=$id AND status=1");
            $insert_query = $this->db->query("INSERT INTO fp_employee_category(employee_id,fp_category_id,status) VALUES($id,$category_id,1)");
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                //if something went wrong, rollback everything
                $this->db->trans_rollback();
            } else {
                //if everything went right, commit the data to the database
                $this->db->trans_commit();
            }
        }

        if ($edit_query && $insert_query) {
            return true;
        } else {
            return false;
        }
    }

    public function get_emp_cat_search($search)
    {
        $name = $search['s_name'];
        $type = $search['s_type'];

        if ($type == 'All' || $type == '' || $type == NULL) {
            $get_query = $this->db->query("SELECT e.employee_id,CONCAT(first_name,' ',middle_name,' ',last_name) AS full_name,type,category_name,remarks FROM employee e LEFT JOIN fp_employee_category fec ON(e.employee_id=fec.employee_id) LEFT JOIN fp_category fc ON(fc.fp_category_id=fec.fp_category_id) WHERE e.status<>'Left' and e.agreement_type='full-time' and (fec.status is null or fec.status=1) AND CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) like '%$name%' ORDER BY e.first_name,e.middle_name,e.last_name");
        } else {
            $get_query = $this->db->query("SELECT e.employee_id,CONCAT(first_name,' ',middle_name,' ',last_name) AS full_name,type,category_name,remarks FROM employee e LEFT JOIN fp_employee_category fec ON(e.employee_id=fec.employee_id) LEFT JOIN fp_category fc ON(fc.fp_category_id=fec.fp_category_id) WHERE e.status<>'Left' and e.agreement_type='full-time' and (fec.status is null or fec.status=1) AND CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) like '%$name%' AND e.type='$type' ORDER BY e.first_name,e.middle_name,e.last_name");
        }

        return $get_query->result();
    }
}
