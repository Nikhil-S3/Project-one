<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('mdl_user');
	}
	public function index(){
		$this->load->view('login_view');
	}
	public function isUserLoggedin(){
		if(!$this->session->userdata['logged_in']){
			redirect('user');
			// $this->load->view('login_view');
		}
	}
	public function validate_user(){
		// echo "<pre>";print_r($_POST);echo "</pre>";exit;

		$this->form_validation->set_rules('user_name', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			/*if(isset($this->session->userdata['logged_in'])){
				$this->load->view('admin_page');
			}else{
				redirect('user');
				$this->load->view('login_view');
			}*/
			$this->load->view('login_view');
		} else {
			$data = array(
			'username' => $this->input->post('user_name'),
			'password' => md5($this->input->post('user_password'))
			);
			// echo "<pre>";print_r($data);echo "</pre>";exit;
			$result = $this->mdl_user->login($data);
			if ($result == TRUE) {

				$user_name = $this->input->post('user_name');
				$result = $this->mdl_user->read_user_information($user_name);
				if ($result != false) {
					$role_id = $result[0]->role_id;
					$session_data = array(
						'user_id' => $result[0]->id,
						'user_name' => $result[0]->username,
						'email' => $result[0]->email,
						'role_id' => $role_id,
						'photo'	=>	$result[0]->photo
					);
					$permissions = $this->mdl_user->read_role_permissions($role_id);
					if(count($permissions)>0){
						// echo "<pre>";print_r($permissions);echo "</pre>";
						$permissions_arr = array();
						foreach ($permissions as $key => $value) {
							$permissions_arr[$value['module_id']]['module_id'] = $value['module_id'];
							$permissions_arr[$value['module_id']]['p_add'] = $value['p_add'];
							$permissions_arr[$value['module_id']]['p_edit'] = $value['p_edit'];
							$permissions_arr[$value['module_id']]['p_delete'] = $value['p_delete'];
							$permissions_arr[$value['module_id']]['p_view'] = $value['p_view'];
						}
						// echo "<pre>";print_r($permissions_arr);echo "</pre>";exit;
					}
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$this->session->set_userdata('module_permissions', $permissions_arr);
					// echo "<pre>";print_r($_SESSION);echo "</pre>";exit;
					redirect('students');
					// $this->load->view('admin_page');
				}
			} else {
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login_view', $data);
			}
		}	
	}
	public function profile(){
		/*$user_id = $this->uri->segment(3);
		$data['profile_data'] = $this->mdl_user->get_user_profile_data($user_id);
		echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('profile',$data);*/

		$this->load->module('teachers/teachers');
		$this->teachers->view();
	}
	// Logout from admin page
	public function logout() {
		// Removing session data
		$sess_array = array(
		'user_name' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		redirect('user');
		// $this->load->view('login_view', $data);
	}
    
}
