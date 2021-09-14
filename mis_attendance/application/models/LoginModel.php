<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LoginModel extends CI_Model
{
    public function can_login($username, $password)
    {
        $this->db->where('user_name', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
