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

        for ($k = 0; $k < $num; $k++) {
            $repeat[] = sizeof($data['assign'][$k], 1);
        }

        for ($i = 0; $i < $num; $i++) {
            $this->db->trans_begin();

            $vacation_date = $data['start_date'][$i];
            $remarks = $data['remarks'][$i];
            $type = $data['type'][$i];

            $insert1_query = $this->db->query("INSERT INTO fp_vacation(vacation_date,remarks,fp_vacation_type_id) VALUES('$vacation_date','$remarks',$type)");
            $select_query = $this->db->query("SELECT fp_vacation_id FROM fp_vacation WHERE vacation_date='$vacation_date' AND remarks='$remarks' AND fp_vacation_type_id=$type LIMIT 1");
            $res_one = $select_query->row();

            $req_id = $res_one->fp_vacation_id;
            foreach ($repeat as $rep) {
                for ($j = 0; $j < $rep; $j++) {
                    $fp_category_id = $data['assign'][$i][$j];

                    if (!($fp_category_id == NULL)) {
                        $insert2_query = $this->db->query("INSERT INTO fp_vacation_category(fp_vacation_id,fp_category_id) VALUES($req_id,$fp_category_id)");
                    }
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

        if ($select_query && $insert1_query && $insert2_query) {
            return true;
        } else {
            return false;
        }
    }
}
