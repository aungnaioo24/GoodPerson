<?php
class Userprofile_model extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
  }

  public function getDisUserData($disuser_id){
    $this->db->select("user_id, u_name, u_propic, u_ambition, u_favquote, u_university, u_work, u_city, u_email, u_address");
    $this->db->from("users");
    $this->db->where("user_id", $disuser_id);
    $this->db->where("u_delstatus", 0);
    $u_data_query = $this->db->get();
    return $u_data_query->row();
  }

  public function getSearchUserData($disuser_name){
    $this->db->select("user_id, u_name, u_propic, u_ambition, u_favquote, u_university, u_work, u_city, u_email, u_address");
    $this->db->from("users");
    $this->db->where("u_name", $disuser_name);
    $this->db->where("u_delstatus", 0);
    $u_data_query = $this->db->get();
    $u_query_num = $u_data_query->num_rows();
    $returnValue = array(
      'u_data_query'=>$u_data_query,
      'u_query_num'=>$u_query_num
    );
    return $returnValue;
  }

}
?>
