<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminKnowledgeFeed extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Knowledgefeed_model');
  }

  public function index(){

    if(!($this->session->has_userdata('admin'))){
      header('location: /goodPerson/Welcome');
      exit();
    }

    $totalKnowledge = $this->Knowledgefeed_model->getTotalKnowledge();

    $limit = 10;
    $start = 0;

    if(isset($_GET['start'])){
      $start = $_GET['start'];
    }

    $next = $start + $limit;
    $prev = $start - $limit;

    $knowledgeposts = $this->Knowledgefeed_model->getKnowledgePosts($start, $limit);

    $data = array(
      'knowledgeposts'=>$knowledgeposts,
      'totalKnowledge'=>$totalKnowledge,
      'next'=>$next,
      'prev'=>$prev
    );

    $this->load->view('templates/adminheader');
    $this->load->view('pages/Adminknowledgefeed_view', $data);
    $this->load->view('templates/adminfooter');
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

  public function addPosts(){
    $title = $this->input->post('title');
    $text = $this->input->post('text');
    $date = date('Y-m-d H:i:s');

    $insrtData = array(
      'k_title'=>$title,
      'k_text'=>$text,
      'k_delstatus'=>0,
      'k_date'=>$date,
      'k_mdate'=>$date
    );

    $result = $this->Knowledgefeed_model->addPost($insrtData);
    if($result>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }
  }

  public function delPosts(){
    $pid = $this->input->post('pid');
    $result = $this->Knowledgefeed_model->delPost($pid);
    if($result>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }
  }

}

?>
