<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EmployeeLeaveModel extends CI_Model
{
    public function getAllEmployees(){
        $query = $this->db->query("SELECT  CONCAT(emp.first_name,' ',emp.last_name)AS full_name,employee_id FROM employee emp where status='Currently Working' ORDER BY first_name");
        if ($query->num_rows() > 0) {
            return $query->result();
    }
    }

    public function getAllRecords(){
        $query = $this->db->query('SELECT CONCAT(emp.first_name," ",emp.last_name)AS full_name,empl.* FROM employee emp INNER JOIN employee_leave empl ON emp.employee_id=empl.employee_id ORDER BY emp.type,emp.first_name,emp.last_name');
        if ($query->num_rows() > 0) {
            return $query->result();
    }
    }

    public function storeRecord($data){
        // $link=[
        //     'employee_leave_id'=>$data[''],
        //     'leave_date'=>$data[''],
        // ];
        // $query2=$this->db->insert('fp_leave',$link);
        // var_dump($data['purpose']);

        $query1=$this->db->insert('employee_leave',$data);
        
        

        if($query1){
            return true;
        }else{
            return false;
        }
    }
    public function get_single_record($id){
        $query = $this->db->query('SELECT CONCAT(emp.first_name," ",emp.last_name)AS full_name,empl.* FROM employee emp INNER JOIN employee_leave empl ON emp.employee_id=empl.employee_id WHERE employee_leave_id='.$id.' ORDER BY emp.type,emp.first_name,emp.last_name');
            return $query->row();
    }

    public function modifyRecord($id,$data){
        $this->db->where('employee_leave_id', $id);
        $query1=$this->db->update('employee_leave',$data);
        if($query1){
            return true;
        }else{
            return false;
        } 
    }
    

    public function removeRecord($leave_id){
        // $query1=$this->db->query("DELETE FROM fp_leave WHERE employee_leave_id=$leave_id");
        
        $query2=$this->db->query("DELETE FROM employee_leave WHERE employee_leave_id=$leave_id");
        
        if($query1){
            return true;
        }else{
            return false;
        } 
    }

}



?>