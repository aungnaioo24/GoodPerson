<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogout extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
  }

  public function index(){

    $admin_arr = array('admin');
    $this->session->unset_userdata($admin_arr);

    header("location: /goodPerson/Welcome");
  }

}

 ?>
