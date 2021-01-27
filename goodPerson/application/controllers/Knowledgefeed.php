<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Knowledgefeed extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Profile_model');
    $this->load->model('Knowledgefeed_model');
  }

  public function index(){

    if(!($this->session->has_userdata('user'))){
      header('location: /goodPerson/Welcome');
      exit();
    }

    $userData = $this->Profile_model->getUserData();
    $totalKnowledge = $this->Knowledgefeed_model->getTotalKnowledge();

    $limit = 10;
    $start = 0;

    if(isset($_GET['start'])){
      $start = $_GET['start'];
    }

    $next = $start + $limit;
    $prev = $start - $limit;

    $knowledgeposts = $this->Knowledgefeed_model->getKnowledgePosts($start, $limit);
    $likeUserResult = $this->Knowledgefeed_model->getLikeUsers();

    $likeUser = array();
    $likeNum = array();

    foreach ($likeUserResult as $key => $value) {
      $likeNum[$value->kl_k_id] = 0;
    }

    foreach ($likeUserResult as $key => $value) {
      $likeUser[$value->kl_k_id][] = $value->kl_user_id;
      $likeNum[$value->kl_k_id] += 1;
    }

    $data = array(
      'userData'=>$userData,
      'knowledgeposts'=>$knowledgeposts,
      'likeUser'=>$likeUser,
      'likeNum'=>$likeNum,
      'totalKnowledge'=>$totalKnowledge,
      'next'=>$next,
      'prev'=>$prev
    );

    $this->load->view('templates/header');
    $this->load->view('pages/knowledgefeed_view', $data);
    $this->load->view('templates/footer');
  }

  public function kLikeClick(){
    $postid = $this->input->post('postid');
    $userid = $_SESSION['user_id'];

    $insrtData = array(
      'kl_k_id'=>$postid,
      'kl_user_id'=>$userid,
      'kl_value'=>1
    );

    $numResult = $this->Knowledgefeed_model->kLikeAdd($insrtData);
    if($numResult>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }

  }

  public function kUnlikeClick(){
    $postid = $this->input->post('postid');
    $userid = $_SESSION['user_id'];

    $numResult = $this->Knowledgefeed_model->kUnlikeDelete($postid, $userid);
    if($numResult>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }

  }

}

?>
