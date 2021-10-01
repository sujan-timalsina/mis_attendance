<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AttendanceReportModel extends CI_Model
{
    public function getAllTypes()
    {
        $query = $this->db->query('SELECT distinct type from employee ORDER BY type');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getSearchResults($type, $agree_type)
    {
        if ($type == "all") {
            $query = $this->db->query('SELECT CONCAT(e.first_name," ",e.last_name) AS full_name,e.employee_id,e.agreement_type,e.type FROM employee e WHERE agreement_type="' . $agree_type . '" ORDER BY type');
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        } else {
            if ($agree_type == "part-time" || $agree_type == "full-time") {

                $query = $this->db->query('SELECT CONCAT(e.first_name," ",e.last_name) AS full_name,e.employee_id,e.agreement_type,e.type FROM employee e where type="' . $type . '" AND agreement_type="' . $agree_type . '" ORDER BY type');
                // $query = $this->db->query('SELECT CONCAT(first_name," ",last_name) AS full_name,employee_id FROM employee WHERE agreement_type="'.$agree_type.'"');
            } else {
                $query = $this->db->query('SELECT CONCAT(e.first_name," ",e.last_name) AS full_name,e.employee_id,e.agreement_type,e.type FROM employee e where type="' . $type . '" ORDER BY type');
            }
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        }
    }

    public function getOneDetail($id)
    {
    }
}
