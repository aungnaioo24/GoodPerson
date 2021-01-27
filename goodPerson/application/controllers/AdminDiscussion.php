<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class AdminDiscussion extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Discussion_model');
  }

  public function index(){

    if(!($this->session->has_userdata('admin'))){
      header('location: /goodPerson/Welcome');
      exit();
    }

    $postid = $this->input->get('postid');

    $discussposts = $this->Discussion_model->getDiscussionPosts($postid);
    $disResult = $this->Discussion_model->getDiscussions($postid);

    $data = array(
      'dp_value'=>$discussposts,
      'disResult'=>$disResult
    );

    $this->load->view('templates/adminheader');
    $this->load->view('pages/adminDiscussion_view', $data);
    $this->load->view('templates/adminfooter');
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

}
?>
