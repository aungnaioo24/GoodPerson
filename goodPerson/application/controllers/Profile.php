<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Profile_model');
  }

  public function index(){

    if(!($this->session->has_userdata('user'))){
      header('location: /goodPerson/Welcome');
      exit();
    }

    $userData = $this->Profile_model->getUserData();

    $this->load->view('templates/header');
    $this->load->view('pages/profile_view', array('userData'=>$userData));
    $this->load->view('templates/footer');
  }

  public function edit(){
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $city = $this->input->post('city');
    $address = $this->input->post('address');
    $favquote = $this->input->post('favquote');
    $ambition = $this->input->post('ambition');
    $university = $this->input->post('university');
    $work = $this->input->post('work');
    $mdate = date('Y-m-d H:i:s');
    $propic_name = $_FILES['propic']['name'];
    $propic_tmp_name = $_FILES['propic']['tmp_name'];
    $propic_size = $_FILES['propic']['size'];

    $data = array();
    $namedata = $this->Profile_model->getname($name);

    if($namedata['numOfNames']>0){
      $getname = $namedata['getname'];
      if(($getname->u_name)==$name and ($getname->user_id)!=$id){
        $validName = FALSE;
      }else{
        $validName = TRUE;
      }
    }else {
      $validName = TRUE;
    }

    if(!preg_match("/^[a-z_0-9]*$/", $name)){
      $data['userData'] = $this->Profile_model->getUserData();
      $data['nameErr'] = "Name can only be small letters, numbers and underscored!";
      $name = "";
      $this->load->view('templates/header');
      $this->load->view('pages/profile_view', $data);
      $this->load->view('templates/footer');
      return;
    }else if(!$validName){
      $data['userData'] = $this->Profile_model->getUserData();
      $data['nameErr'] = "Sorry, this name already have. Name must be unique. Try another name.";
      $name = "";
      $this->load->view('templates/header');
      $this->load->view('pages/profile_view', $data);
      $this->load->view('templates/footer');
      return;
    }

    $propic_array = array(
      'p_name' => $propic_name,
      'p_tmp' => $propic_tmp_name,
      'p_size' => $propic_size
    );

    $insrtData = array(
      'u_name' => $name,
      'u_email' => $email,
      'u_city' => $city,
      'u_address' => $address,
      'u_favquote' => $favquote,
      'u_ambition' => $ambition,
      'u_university' => $university,
      'u_work' => $work,
      'u_mdate' => $mdate
    );

    $result = $this->Profile_model->update($insrtData, $id, $propic_array);
    if($result>0){
      header("location: /goodPerson/Profile");
    }{
      echo "Unsuccessful update!";
    }

  }

  public function del(){
    $insrtData = array('u_delstatus' => 1);
    $id = $this->session->userdata('user_id');
    $result = $this->Profile_model->delete($insrtData, $id);
    if($result>0){
      $user_arr = array('user_id', 'user');
      $this->session->unset_userdata($user_arr);
      echo "Deleted account!";
    }else{
      echo "Unsuccessful deleting account!";
    }
  }

}

 ?>
