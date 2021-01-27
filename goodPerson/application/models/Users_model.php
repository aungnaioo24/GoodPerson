<?php
class Users_model extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function getusers($name){

    $this->db->select("user_id, u_password");
    $this->db->from("users");
    $this->db->where("u_name", $name);
    $this->db->where("u_delstatus", 0);
    $query = $this->db->get();
    return $query->row();

  }

  public function getadmin($name){
    $this->db->select("admin_pass");
    $this->db->from("admin");
    $this->db->where("admin_name", $name);
    $query = $this->db->get();
    return $query->row();
  }

  public function getname($name){
    $this->db->select("u_name");
    $this->db->from("users");
    $this->db->where("u_name",$name);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function register($user_arr){
    $this->db->insert('users', $user_arr);
    return $this->db->affected_rows();
  }

}

?>
