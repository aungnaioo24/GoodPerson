<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class UserProfile extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Userprofile_model');
  }

  public function index(){

    if(!($this->session->has_userdata('user'))){
      header('location: /goodPerson/Welcome');
      exit();
    }

    $disuser_id = $this->input->get("disuser_id");
    $userData = $this->Userprofile_model->getDisUserData($disuser_id);

    $this->load->view('templates/header');
    $this->load->view('pages/userprofile_view',array('userData'=>$userData));
    $this->load->view('templates/footer');
  }

  public function search(){
    $searchValue = $this->input->post('searchName');
    $searchResult = $this->Userprofile_model->getSearchUserData($searchValue);

    if($searchResult['u_query_num']>0){
      $userData = $searchResult['u_data_query']->row();
    }else{
      echo "";
      $data = array(
        'etitle'=>'Search Name Error!',
        'etext'=>'The name you searched does not exist!'
      );
      $this->load->view('errors/errors_view', $data);
      $this->load->view('templates/footer');
      return;
    }

    $this->load->view('templates/header');
    $this->load->view('pages/userprofile_view',array('userData'=>$userData));
    $this->load->view('templates/footer');
  }

}
?>
