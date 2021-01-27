<?php
  class Profile_model extends CI_Model{

    public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->library('session');
    }

    public function getUserData(){
      $user_id = $this->session->userdata('user_id');
      $this->db->select("user_id, u_name, u_propic, u_ambition, u_favquote, u_university, u_work, u_city, u_email, u_address");
      $this->db->from("users");
      $this->db->where("user_id", $user_id);
      $this->db->where("u_delstatus", 0);
      $u_data_query = $this->db->get();
      return $u_data_query->row();
    }

    public function getAllUsers(){
      $this->db->select("user_id, u_name");
      $this->db->from("users");
      $this->db->where("u_delstatus", 0);
      $u_data_query = $this->db->get();
      return $u_data_query->result();
    }

    public function getname($name){
      $this->db->select("user_id, u_name");
      $this->db->from("users");
      $this->db->where("u_name",$name);
      $this->db->where("u_delstatus", 0);
      $query = $this->db->get();
      $namedata = array(
        'numOfNames' => $this->db->affected_rows(),
        'getname' => $query->row()
      );
      return $namedata;
    }

    public function update($insrtData, $id, $propic_array){

      if($propic_array['p_size']>0){
        $extension = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF');
        $ext = pathinfo($propic_array['p_name'], PATHINFO_EXTENSION);
        $propic_location = $_SERVER['DOCUMENT_ROOT'].'/goodPerson/static/img/'.$propic_array['p_name'];

        if(in_array($ext, $extension)){
          if(!file_exists($propic_location)){
            move_uploaded_file($propic_array['p_tmp'], $propic_location);
            $insrtData['u_propic'] = $propic_array['p_name'];

            $this->db->where("user_id", $id);
            $this->db->update("users", $insrtData);
            $result = $this->db->affected_rows();
            return $result;
          }else{
            $newPropicName = time().'-'.$propic_array['p_name'];
            move_uploaded_file($propic_array['p_tmp'], $_SERVER['DOCUMENT_ROOT'].'/goodPerson/static/img/'.$newPropicName);
            $insrtData['u_propic'] = $newPropicName;

            $this->db->where("user_id", $id);
            $this->db->update("users", $insrtData);
            $result = $this->db->affected_rows();
            return $result;
          }
        }else{
          echo "File type Error!";
        }
      }

      $this->db->where("user_id", $id);
      $this->db->update("users", $insrtData);
      $result = $this->db->affected_rows();
      return $result;
    }

    public function delete($insrtData, $id){
      $this->db->where("user_id", $id);
      $this->db->update("users", $insrtData);
      $result = $this->db->affected_rows();
      return $result;
    }

  }
?>
