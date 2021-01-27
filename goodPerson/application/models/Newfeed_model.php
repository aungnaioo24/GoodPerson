<?php
  class Newfeed_model extends CI_Model{

    public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->library('session');
    }

    public function getDisPosts(){
      $this->db->select("dp_id");
      $this->db->from("discussionpost");
      $this->db->where("dp_delstatus", 0);
      $query = $this->db->get();
      return $query->num_rows();
    }

    public function getDiscussionPosts($start, $limit){
      $this->db->select("dp_id, dp_heading, dp_text, dp_date");
      $this->db->from("discussionpost");
      $this->db->where("dp_delstatus", 0);
      $this->db->order_by("dp_mdate", "DESC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();
      return $query->result();
    }

    public function getLikeUsers(){
      $this->db->select("dplike.dpl_dp_id, dplike.dpl_user_id");
      $this->db->from("dplike");
      $this->db->join("users", "dplike.dpl_user_id=users.user_id", "left");
      $this->db->where("users.u_delstatus", 0);
      $query = $this->db->get();
      return $query->result();
    }

    public function dpLikeAdd($insrtData){
      $this->db->insert('dplike', $insrtData);
      return $this->db->affected_rows();
    }

    public function dpUnlikeDelete($postid, $userid){
      $this->db->where("dpl_dp_id", $postid);
      $this->db->where("dpl_user_id", $userid);
      $this->db->delete("dplike");
      return $this->db->affected_rows();
    }

    public function getCmt(){
      $this->db->select("discussion.dis_dp_id");
      $this->db->from("discussion");
      $this->db->join("users", "discussion.dis_user_id=users.user_id");
      $this->db->where("users.u_delstatus", 0);
      $query = $this->db->get();
      return $query->result();
    }

    public function addPost($insrtData){
      $this->db->insert("discussionpost", $insrtData);
      return $this->db->affected_rows();
    }

    public function delPost($pid){
      $this->db->where("dp_id", $pid);
      $this->db->delete("discussionpost");
      return $this->db->affected_rows();
    }

  }
?>
