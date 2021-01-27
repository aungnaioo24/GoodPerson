<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Discussion extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Profile_model');
    $this->load->model('Discussion_model');
    $this->load->model('Newfeed_model');
  }

  public function index(){

    if(!($this->session->has_userdata('user'))){
      header('location: /goodPerson/Welcome');
      exit();
    }

    $postid = $this->input->get('postid');

    $userData = $this->Profile_model->getUserData();
    $discussposts = $this->Discussion_model->getDiscussionPosts($postid);
    $likeUserResult = $this->Newfeed_model->getLikeUsers();
    $disNumResult = $this->Discussion_model->getCmtNum();
    $disResult = $this->Discussion_model->getDiscussions($postid);
    $dLikesResult = $this->Discussion_model->dLikes($postid);

    $likeUser = array();
    $likeNum = array();
    $disNum = array();
    $dLikeUsers = array();
    $dLikeNum = array();

    foreach ($likeUserResult as $key => $value) {
      $likeNum[$value->dpl_dp_id] = 0;
    }

    foreach ($likeUserResult as $key => $value) {
      $likeUser[$value->dpl_dp_id][] = $value->dpl_user_id;
      $likeNum[$value->dpl_dp_id] += 1;
    }

    foreach ($disNumResult as $key => $value) {
      $disNum[$value->dis_dp_id]=0;
    }

    foreach ($disNumResult as $key => $value) {
      $disNum[$value->dis_dp_id] +=1;
    }

    foreach ($dLikesResult as $key => $value) {
      $dLikeNum[$value->dl_dis_id] = 0;
    }

    foreach ($dLikesResult as $key => $value) {
      $dLikeUsers[$value->dl_dis_id][] = $value->dl_user_id;
      $dLikeNum[$value->dl_dis_id] += 1;
    }

    $data = array(
      'userData'=>$userData,
      'dp_value'=>$discussposts,
      'likeUser'=>$likeUser,
      'likeNum'=>$likeNum,
      'disNum'=>$disNum,
      'disResult'=>$disResult,
      'dLikeUsers'=>$dLikeUsers,
      'dLikeNum'=>$dLikeNum
    );

    $this->load->view('templates/header');
    $this->load->view('pages/discussion_view', $data);
    $this->load->view('templates/footer');
  }

  public function addDiscussion(){
    $postid = $this->input->post('postid');
    $disText = $this->input->post('disText');
    $user_id = $this->session->userdata('user_id');
    $date = date('Y-m-d H:i:s');

    $insrtData = array(
      'dis_dp_id'=>$postid,
      'dis_user_id'=>$user_id,
      'dis_text'=>$disText,
      'dis_date'=>$date,
      'dis_mdate'=>$date
    );

    $addDisResult = $this->Discussion_model->addDis($insrtData);
    if($addDisResult>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }
  }

  public function delDiscussion(){
    $dis_id = $this->input->post('dis_id');
    $delResult = $this->Discussion_model->delDis($dis_id);
    if($delResult>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }
  }

  public function likeDiscussion(){
    $dis_id = $this->input->post('dis_id');
    $postid = $this->input->post('postid');
    $user_id = $this->session->userdata('user_id');

    $insrtData = array(
      'dl_dis_id'=>$dis_id,
      'dl_dp_id'=>$postid,
      'dl_user_id'=>$user_id,
      'dl_value'=>1
    );
    $addDLikeResult = $this->Discussion_model->likeDis($insrtData);
    if($addDLikeResult>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }
  }

  public function unlikeDiscussion(){
    $dis_id = $this->input->post('dis_id');
    $postid = $this->input->post('postid');
    $user_id = $this->session->userdata('user_id');

    $delDLikeResult = $this->Discussion_model->unlikeDis($dis_id, $postid, $user_id);
    if($delDLikeResult>0){
      echo json_encode(array('res'=>TRUE));
    }else{
      echo json_encode(array('res'=>FALSE));
    }
  }

}
?>
