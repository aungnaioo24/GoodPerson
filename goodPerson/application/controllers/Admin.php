<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Newfeed_model');
  }

  public function index(){

    if(!($this->session->has_userdata('admin'))){
      header('location: /goodPerson/Welcome');
      exit();
    }

    $totalDisPost = $this->Newfeed_model->getDisPosts();

    $limit = 10;
    $start = 0;

    if(isset($_GET['start'])){
      $start = $_GET['start'];
    }

    $next = $start + $limit;
    $prev = $start - $limit;

    $discussposts = $this->Newfeed_model->getDiscussionPosts($start, $limit);

    $data = array(
      'disposts'=>$discussposts,
      'next'=>$next,
      'prev'=>$prev,
      'totalDisPost'=>$totalDisPost
    );

    $this->load->view('templates/adminheader');
    $this->load->view('pages/adminNewfeed_view', $data);
    $this->load->view('templates/adminfooter');
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

  public function addPosts(){
    $title = $this->input->post('title');
    $text = $this->input->post('text');
    $date = date('Y-m-d H:i:s');

    $insrtData = array(
      'dp_heading'=>$title,
      'dp_text'=>$text,
      'dp_delstatus'=>0,
      'dp_date'=>$date,
      'dp_mdate'=>$date
    );

    $result = $this->Newfeed_model->addPost($insrtData);
    if($result>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }
  }

  public function delPosts(){
    $pid = $this->input->post('pid');
    $result = $this->Newfeed_model->delPost($pid);
    if($result>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }
  }

}

?>
