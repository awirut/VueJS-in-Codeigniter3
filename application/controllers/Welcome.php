<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('welcome_model');
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function do_User()
	{

		$res = array('error' => false);

		$action = 'read';

		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}


		if($action == 'read'){

			$result = $this->welcome_model->do_getUser();

			$users = array();
	
			foreach($result as $row){
				
				array_push($users, $row);
			}
	
			$res['users'] = $users;
		}

		if($action == 'create'){

			$data = array(
				'username' 	=> $this->input->get_post('username'),
				'email' 	=> $this->input->get_post('email'),
				'mobile' 	=> $this->input->get_post('mobile')
			);

			$result = $this->welcome_model->do_insert($data);
			
			if($result){
				$res['message'] = "เพิ่มข้อมูลผู้ใช้ สำเร็จ";
			}else{
				$res['error'] = true;
				$res['message'] = "เกิดข้อผิดพลาด กรุณาลองอีกครั้ง";
			}
		}

		if($action == 'update'){

			$id	= $this->input->get_post('id');

			$data = array(
				'username' 	=> $this->input->get_post('username'),
				'email' 	=> $this->input->get_post('email'),
				'mobile' 	=> $this->input->get_post('mobile')
			);

			$result = $this->welcome_model->do_update($id,$data);

			if($result){
				$res['message'] = "แก้ไขข้อมูลผู้ใช้สำเร็จ";
			} else{
				$res['error'] = true;
				$res['message'] = "เกิดข้อผิดพลาด กรุณาลองอีกครั้ง";
			}

		}

		if($action == 'delete'){
			
			$data = $this->input->get_post('id');

			$result = $this->welcome_model->do_delete($data);
			
			if($result){
				$res['message'] = "ลบข้อมูลผู้ใช้ สำเร็จ";
			}else{
				$res['error'] = true;
				$res['message'] = "เกิดข้อผิดพลาด กรุณาลองอีกครั้ง";
			}

		}

		header("Content-type: application/json");
		echo json_encode($res);
	}
	
}
