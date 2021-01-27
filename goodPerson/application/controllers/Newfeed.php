<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newfeed extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Profile_model');
    $this->load->model('Newfeed_model');
  }

  public function index(){

    if(!($this->session->has_userdata('user'))){
      header('location: /goodPerson/Welcome');
      exit();
    }

    $userData = $this->Profile_model->getUserData();
    $totalDisPost = $this->Newfeed_model->getDisPosts();

    $limit = 10;
    $start = 0;

    if(isset($_GET['start'])){
      $start = $_GET['start'];
    }

    $next = $start + $limit;
    $prev = $start - $limit;

    $discussposts = $this->Newfeed_model->getDiscussionPosts($start, $limit);
    $likeUserResult = $this->Newfeed_model->getLikeUsers();
    $disResult = $this->Newfeed_model->getCmt();

    $likeUser = array();
    $likeNum = array();
    $disNum = array();

    foreach ($likeUserResult as $key => $value) {
      $likeNum[$value->dpl_dp_id] = 0;
    }

    foreach ($disResult as $key => $value) {
      $disNum[$value->dis_dp_id]=0;
    }

    foreach ($likeUserResult as $key => $value) {
      $likeUser[$value->dpl_dp_id][] = $value->dpl_user_id;
      $likeNum[$value->dpl_dp_id] += 1;
    }

    foreach ($disResult as $key => $value) {
      $disNum[$value->dis_dp_id] +=1;
    }

    $data = array(
      'userData'=>$userData,
      'disposts'=>$discussposts,
      'likeUser'=>$likeUser,
      'likeNum'=>$likeNum,
      'disNum'=>$disNum,
      'next'=>$next,
      'prev'=>$prev,
      'totalDisPost'=>$totalDisPost
    );

    $this->load->view('templates/header');
    $this->load->view('pages/newfeed_view', $data);
    $this->load->view('templates/footer');
  }

  public function dpLikeClick(){
    $postid = $this->input->post('postid');
    $userid = $_SESSION['user_id'];

    $insrtData = array(
      'dpl_dp_id'=>$postid,
      'dpl_user_id'=>$userid,
      'dpl_value'=>1
    );

    $numResult = $this->Newfeed_model->dpLikeAdd($insrtData);
    if($numResult>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }

  }

  public function dpUnlikeClick(){
    $postid = $this->input->post('postid');
    $userid = $_SESSION['user_id'];

    $numResult = $this->Newfeed_model->dpUnlikeDelete($postid, $userid);
    if($numResult>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }

  }

}

 ?>
