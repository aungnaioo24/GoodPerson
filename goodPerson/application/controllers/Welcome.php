<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('Users_model');
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->has_userdata('user')){
			header('location: /goodPerson/Newfeed');
      exit();
		}elseif ($this->session->has_userdata('admin')) {
			header('location: /goodPerson/Admin');
      exit();
		}
		$this->load->view('welcome_page');
	}

	public function formLogin(){

			$name = trim($this->input->post('name'));
			$pass = $this->input->post('password');

			$user = $this->Users_model->getusers($name);

			if(isset($user)){
				$u_id = $user->user_id;
				$u_password = $user->u_password;
				if(password_verify($pass, $u_password)){
					$userData = array(
					'user_id' => $u_id,
					'user' => TRUE
					);
					$this->session->set_userdata($userData);
					header("location: /goodPerson/Newfeed");
				}else {
					$data = array(
						'etitle'=>'Login Error!',
						'etext'=>'Invalid password!'
					);
			    $this->load->view('errors/errors_view', $data);
			    $this->load->view('templates/footer');
				}
			}
			else{
				$admin = $this->Users_model->getadmin($name);
				if(isset($admin)){
					$admin_pass = $admin->admin_pass;
					if(password_verify($pass, $admin_pass)){
						$this->session->set_userdata(array('admin'=>TRUE));
						header("location: /goodPerson/Admin");
					}else{
						$data = array(
							'etitle'=>'Login Error!',
							'etext'=>'Invalid admin!'
						);
				    $this->load->view('errors/errors_view', $data);
				    $this->load->view('templates/footer');
					}
				}else{
					$data = array(
						'etitle'=>'Login Error!',
						'etext'=>'Invalid username or password!'
					);
			    $this->load->view('errors/errors_view', $data);
			    $this->load->view('templates/footer');
				}
			}
	}

	public function formRegister(){

		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$cpassword = password_hash($this->input->post('cpassword'), PASSWORD_DEFAULT);
		$passLength = strlen($password);
		$date = date('Y-m-d H:i:s');

		$data = array();

		$numOfRows = $this->Users_model->getname($name);
		if($numOfRows>0){
			$validName = FALSE;
		}else{
			$validName = TRUE;
		}

		if(!preg_match("/^[a-z_0-9]*$/", $name)){
			$data['nameErr'] = "Name can only be small letters, numbers and underscored!";
			$name = "";
			$this->load->view('welcome_page', $data);
			return;
		}else if(!$validName){
			$data['nameErr'] = "Sorry, this name already have. Name must be unique. Try another name.";
			$name = "";
			$this->load->view('welcome_page', $data);
			return;
		}
		else if($passLength<8){
			$data['passErr'] = "Passwords length must have at least 8 numbers!";
			$password = "";
			$cpassword = "";
			$this->load->view('welcome_page', $data);
			return;
		}else if(!password_verify($password, $cpassword)){
			$data['passErr'] = "Passwords do not match!";
			$password = "";
			$cpassword = "";
			$this->load->view('welcome_page', $data);
			return;
		}

		$user_arr = array(
			'u_name'=>$name,
			'u_email'=>$email,
			'u_password'=>$cpassword,
			'u_delstatus'=>0,
			'u_date'=>$date,
			'u_mdate'=>$date
		);

		$insertedNum = $this->Users_model->register($user_arr);
		if($insertedNum>0){
			$user = $this->Users_model->getusers($name);
			$u_id = $user->user_id;
			$userData = array(
			'user_id' => $u_id,
			'user' => TRUE
			);
			$this->session->set_userdata($userData);
			header("location: /goodPerson/Newfeed");
		}else{
			echo "Unsuccessful registering!";
		}

	}

}

?>
