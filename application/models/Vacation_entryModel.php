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

    public function insert_form_data($data)
    {
        $num = $data['loop_num'];

        for ($i = 0; $i < $num; $i++) {
            $repeat[] = sizeof($data['assign'][$i], 1);
        }

        $select_query = [];
        $insert1_query = [];
        $insert2_query = [];

        for ($i = 0; $i < $num; $i++) {
            $this->db->trans_begin();
            $insert1_query = $this->db->query("INSERT INTO fp_vacation(vacation_date,remarks,fp_vacation_type_id) VALUES('data[start_date]','data[remarks]',data[type])");
            $select_query = $this->db->query("SELECT fp_vacation_id FROM fp_vacation WHERE vacation_date='data[start_date]' AND remarks='data[remarks]' AND fp_vacation_type_id=data[type]");
            $req_id = $select_query->result_array();
            foreach ($repeat as $rep) {
                for ($j = 0; $j < $rep; $j++) {
                    $insert2_query = $this->db->query("INSERT INTO fp_vacation_category(fp_vacation_id,fp_category_id) VALUES($req_id[0],data[assign][$i][$j])");
                }
            }
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                //if something went wrong, rollback everything
                $this->db->trans_rollback();
            } else {
                //if everything went right, commit the data to the database
                $this->db->trans_commit();
            }
        }
    }
}
