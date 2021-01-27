<?php
  class Knowledgefeed_model extends CI_Model{

    public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->library('session');
    }

    public function getKnowledgePosts($start, $limit){
      $this->db->select("k_id, k_title, k_text, k_date");
      $this->db->from("knowledge");
      $this->db->where("k_delstatus", 0);
      $this->db->order_by("k_mdate", "DESC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();
      return $query->result();
    }

    public function getLikeUsers(){
      $this->db->select("k_like.kl_k_id, k_like.kl_user_id");
      $this->db->from("k_like");
      $this->db->join("users", "k_like.kl_user_id=users.user_id", "left");
      $this->db->where("users.u_delstatus", 0);
      $query = $this->db->get();
      return $query->result();
    }

    public function kLikeAdd($insrtData){
      $this->db->insert('k_like', $insrtData);
      return $this->db->affected_rows();
    }

    public function kUnlikeDelete($postid, $userid){
      $this->db->where("kl_k_id", $postid);
      $this->db->where("kl_user_id", $userid);
      $this->db->delete("k_like");
      return $this->db->affected_rows();
    }

    public function getTotalKnowledge(){
      $this->db->select("k_id");
      $this->db->from("knowledge");
      $this->db->where("k_delstatus", 0);
      $query = $this->db->get();
      return $query->num_rows();
    }

    public function addPost($insrtData){
      $this->db->insert("knowledge", $insrtData);
      return $this->db->affected_rows();
    }

    public function delPost($pid){
      $this->db->where("k_id", $pid);
      $this->db->delete("knowledge");
      return $this->db->affected_rows();
    }

  }
?>
