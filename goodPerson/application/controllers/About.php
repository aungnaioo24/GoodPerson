<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class About extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
  }

  public function index(){

    if(!($this->session->has_userdata('user'))){
      header('location: /goodPerson/Welcome');
      exit();
    }

    $this->load->view('templates/header');
    $this->load->view('pages/about_view');
    $this->load->view('templates/footer');
  }

}
?>
