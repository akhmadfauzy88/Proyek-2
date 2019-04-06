<?php
class LoginModel extends CI_Model {
  public function get_auth_mhs($user, $pass){
    $query = $this->db->get_where('users_mhs', array('username' => $user, 'password' => $pass));
    $data = $query->row_array();
    return $data;
  }

  public function get_auth_tch($user, $pass){
    $query = $this->db->get_where('users_teacher', array('username' => $user, 'password' => $pass));
    $data = $query->row_array();
    return $data;
  }
}
