<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccManage extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Profile_model');
  }

  public function index(){

    if(!($this->session->has_userdata('admin'))){
      header('location: /goodPerson/Welcome');
      exit();
    }

    $users = $this->Profile_model->getAllUsers();

    $this->load->view('templates/adminheader');
    $this->load->view('pages/admin_accmanage_view', array('users'=>$users));
    $this->load->view('templates/adminfooter');
  }

  public function del(){
    $insrtData = array('u_delstatus' => 1);
    $id = $this->input->post("user_id");
    $result = $this->Profile_model->delete($insrtData, $id);

    if($result>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }
  }

}

 ?>
