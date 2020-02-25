<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct(){
		parent::__construct();
        /*if($this->session->userdata('logged_in')['role_id']!='1'){
            echo modules::run('common/access_denied');exit;
        }*/
        $this->load->model('mdl_users');
	}
	public function index(){
		// echo "<h1>Hello, Ready to go. This is Students Module.</h1>";
		$data['all_users'] = $this->mdl_users->get_all_users();
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
	public function add(){
		// echo "<h1>Hello, Ready to go. This is Teachers Module.</h1>";
		$this->load->view('create');
	}
	public function edit(){
		$id = $this->uri->segment(3);
		// echo $id;exit;
		$data['user_info'] = $this->mdl_users->get_user($id);
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('edit', $data);
	}
	public function save(){
		/*echo "<pre>";print_r($_POST);
		echo "</pre>";
		exit;*/

        $this->form_validation->set_rules('preferred_name', 'Name', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('joining_date', 'Joining Date', 'required');
		$this->form_validation->set_rules('user_role', 'Role', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

		if ($this->form_validation->run() == FALSE){
                $this->load->view('list');
        }else{
        	$data = array();
            $data['preferred_name'] = !empty($this->input->post('preferred_name')) ? $this->input->post('preferred_name') : '';
            $date_of_birth = $this->input->post('date_of_birth');
            $converted_date = str_replace('/', '-', $date_of_birth);
            $data['date_of_birth'] = date('Y-m-d', strtotime($converted_date));
            $data['gender'] = !empty($this->input->post('gender')) ? $this->input->post('gender') : '';
            $data['religion'] = !empty($this->input->post('religion')) ? $this->input->post('religion') : '';
        	$data['email'] = !empty($this->input->post('email')) ? $this->input->post('email') : '';
        	$data['phone'] = !empty($this->input->post('phone')) ? $this->input->post('phone') : '';
            $data['address'] = !empty($this->input->post('address')) ? $this->input->post('address') : '';
            $joining_date = $this->input->post('joining_date');
            $jd_converted_date = str_replace('/', '-', $joining_date);
            $data['joining_date'] = date('Y-m-d', strtotime($jd_converted_date));
        	$data['username'] = !empty($this->input->post('username')) ? $this->input->post('username') : '';
        	$data['password'] = !empty($this->input->post('password')) ? md5($this->input->post('password')) : '';

        	// file upload
        	$image_name = '';
        	if($_FILES['photo']['name'] != ''){
        		$config['upload_path'] = './assets/images/uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
		        $config['max_size'] = 2000;
		        $config['max_width'] = 1500;
		        $config['max_height'] = 1500;
		        $new_name = date('dmY').'-'.time().'-'.$_FILES["photo"]['name'];
				$config['file_name'] = $new_name;

		        $this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('photo'))
                {
                    // $error = array('error' => $this->upload->display_errors());
                    $message = array('message' => $this->upload->display_errors(),'class' => 'alert alert-danger fade in');
                    $this->session->set_flashdata('item', $message);
	            	redirect('parents/add');
                }
                else
                {
                    // $data['photo'] = !empty($_FILES['photo']['name']) ? $new_name : '';
                    $upload_data=$this->upload->data();
            		$image_name=$upload_data['file_name'];
                }
                
        	}
            
            $data['photo'] = $image_name;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['role_id'] = $_POST['user_role'];
            $data['created_by'] = $_SESSION['logged_in']['user_id'];
            $insert_status = $this->mdl_users->insert_user($data);
            if($insert_status){
            	$message = array('message' => 'User has been added successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('users');
        }
	}
	public function update(){
		/*echo "<pre>";print_r($_POST);
        print_r($_FILES);
		echo "</pre>";
		exit;*/

		$this->form_validation->set_rules('preferred_name', 'Name', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('joining_date', 'Joining Date', 'required');
        $this->form_validation->set_rules('user_role', 'Role', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]');
        
		if ($this->form_validation->run() == FALSE){
            $this->load->view('edit');
        }else{
        	$data = array();
        	$data['id'] = $this->input->post('id');
            $data['preferred_name'] = !empty($this->input->post('preferred_name')) ? $this->input->post('preferred_name') : '';
            $date_of_birth = $this->input->post('date_of_birth');
            $converted_date = str_replace('/', '-', $date_of_birth);
            $data['date_of_birth'] = date('Y-m-d', strtotime($converted_date));
            $data['gender'] = !empty($this->input->post('gender')) ? $this->input->post('gender') : '';
            $data['religion'] = !empty($this->input->post('religion')) ? $this->input->post('religion') : '';
            $data['email'] = !empty($this->input->post('email')) ? $this->input->post('email') : '';
            $data['phone'] = !empty($this->input->post('phone')) ? $this->input->post('phone') : '';
            $data['address'] = !empty($this->input->post('address')) ? $this->input->post('address') : '';
            $joining_date = $this->input->post('joining_date');
            $jd_converted_date = str_replace('/', '-', $joining_date);
            $data['joining_date'] = date('Y-m-d', strtotime($jd_converted_date));
            $data['username'] = !empty($this->input->post('username')) ? $this->input->post('username') : '';
        	// $data['password'] = !empty($this->input->post('password')) ? $this->input->post('password') : '';
            
        	// file upload
        	if($_FILES['new_photo']['name'] != ''){
        		$config['upload_path'] = './assets/images/uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
		        $config['max_size'] = 2000;
		        $config['max_width'] = 1500;
		        $config['max_height'] = 1500;
		        $new_name = date('dmY').'-'.time().'-'.$_FILES["new_photo"]['name'];
				$config['file_name'] = $new_name;

		        $this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('new_photo'))
                {
                    // $error = array('error' => $this->upload->display_errors());
                    $message = array('message' => $this->upload->display_errors(),'class' => 'alert alert-danger fade in');
                    $this->session->set_flashdata('item', $message);
	            	redirect('parents/add');
                }
                else
                {
                    // $image_name=!empty($_FILES['new_photo']['name']) ? $new_name : '';
                	$upload_data=$this->upload->data();
            		$image_name=$upload_data['file_name'];
                }
            }else{
                $image_name=$this->input->post('old_photo');
            }

            $data['photo'] = !empty($image_name) ? $image_name : '';
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $_SESSION['logged_in']['user_id'];
            $data['role_id'] = $_POST['user_role'];
            // echo "<pre>";
            // print_r($data);exit;

            $update_status = $this->mdl_users->update_user($data);
            if($update_status){
            	$message = array('message' => 'User has been updated successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('users');
        }
	}
	function delete(){
		$id = $this->uri->segment(3);
		// echo $id;exit;
		$delete_status = $this->mdl_users->delete_user($id);
        if($delete_status){
        	$message = array('message' => 'User has been archived successfully','class' => 'alert alert-success fade in');
        }else{
        	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
		$this->session->set_flashdata('item', $message);
        redirect('users');
	}
}
