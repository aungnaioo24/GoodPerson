<?php
class Discussion_model extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
  }

  public function getDiscussionPosts($postid){
    $this->db->select("dp_id, dp_heading, dp_text, dp_date");
    $this->db->from("discussionpost");
    $this->db->where("dp_delstatus", 0);
    $this->db->where("dp_id", $postid);
    $this->db->order_by("dp_mdate", "DESC");
    $query = $this->db->get();
    return $query->row();
  }

  public function getCmtNum(){
    $this->db->select("discussion.dis_dp_id, users.user_id");
    $this->db->from("discussion");
    $this->db->join("users", "discussion.dis_user_id=users.user_id", "left");
    $this->db->where("users.u_delstatus", 0);
    $query = $this->db->get();
    return $query->result();
  }

  public function getDiscussions($postid){
    $this->db->select("discussion.dis_id, discussion.dis_dp_id, discussion.dis_user_id, discussion.dis_text, discussion.dis_date, users.u_name, users.u_propic");
    $this->db->from("discussion");
    $this->db->join("users", "discussion.dis_user_id=users.user_id", "left");
    $this->db->where("discussion.dis_dp_id", $postid);
    $this->db->where("users.u_delstatus", 0);
    $this->db->order_by("discussion.dis_date", "DESC");
    $query = $this->db->get();
    return $query->result();
  }

  public function addDis($insrtData){
    $this->db->insert("discussion", $insrtData);
    return $this->db->affected_rows();
  }

  public function delDis($dis_id){
    $this->db->where("dis_id", $dis_id);
    $this->db->delete("discussion");
    return $this->db->affected_rows();
  }

  public function dLikes($postid){
    $this->db->select("dis_like.dl_dis_id, dis_like.dl_user_id, users.u_delstatus");
    $this->db->from("dis_like");
    $this->db->join("users", "dis_like.dl_user_id=users.user_id", "left");
    $this->db->where("dl_dp_id", $postid);
    $this->db->where("users.u_delstatus", 0);
    $query = $this->db->get();
    return $query->result();
  }

  public function likeDis($insrtData){
    $this->db->insert("dis_like", $insrtData);
    return $this->db->affected_rows();
  }

  public function unlikeDis($dis_id, $postid, $user_id){
    $this->db->where("dl_dis_id", $dis_id);
    $this->db->where("dl_dp_id", $postid);
    $this->db->where("dl_user_id", $user_id);
    $this->db->delete("dis_like");
    return $this->db->affected_rows();
  }

}
?>
