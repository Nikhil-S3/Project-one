<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_admin extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_systemadmin');
        $this->load->model('classes/mdl_class');
        $this->load->model('sections/mdl_sections');
        $this->load->model('parents/mdl_parents');
	}
	/*public function add(){
		$this->load->view('create');
	}*/
    public function index(){
        // echo "<pre>";print_r($_SESSION);echo "</pre>";exit;
        // echo "<h1>Hello, Ready to go. This is Students Module.</h1>";
        $data['all_users'] = $this->mdl_systemadmin->get_all_users();
        $data['all_parents'] = $this->mdl_parents->get_all_parents();
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        // $data['all_sections'] = $this->mdl_sections->get_all_sections();
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('list', $data);
    }
	
	public function save(){
		/*echo "<pre>";print_r($_POST);
		echo "</pre>";
		exit;*/

		if(isset($_POST['add_systemadmin'])){
        	$data = array();
        	$data['preferred_name'] = !empty($this->input->post('preferred_name')) ? $this->input->post('preferred_name') : '';
        	$data['date_of_birth'] = !empty($this->input->post('date_of_birth')) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : '';
        	$data['gender'] = !empty($this->input->post('gender')) ? $this->input->post('gender') : '';
        	$data['religion'] = !empty($this->input->post('religion')) ? $this->input->post('religion') : '';
            $data['email'] = !empty($this->input->post('email')) ? $this->input->post('email') : '';
            $data['phone'] = !empty($this->input->post('phone')) ? $this->input->post('phone') : '';
            $data['address'] = !empty($this->input->post('address')) ? $this->input->post('address') : '';
            $data['joining_date'] = !empty($this->input->post('joining_date')) ? $this->input->post('joining_date') : '';
        	$data['username'] = !empty($this->input->post('username')) ? $this->input->post('username') : '';
        	$data['password'] = !empty($this->input->post('password')) ? $this->input->post('password') : '';
            $data['created_at'] = date('Y-m-d H:i:s');

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
	            	redirect('students/add');
                }
                else
                {
                    // $data['photo'] = !empty($_FILES['photo']['name']) ? $new_name : '';
                    $upload_data=$this->upload->data();
            		$image_name=$upload_data['file_name'];
                }
                
        	}
            
            $data['photo'] = $image_name;
            $data['role_id'] = 1;
            $data['created_by'] = $_SESSION['logged_in']['user_id'];
            $insert_status = $this->mdl_systemadmin->insert_systemadmin($data);
            if($insert_status){
            	$message = array('message' => 'System admin has been added successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('system_admin');
        }
	}
    
    public function edit(){
        $id = $this->uri->segment(3);
        // echo $id;exit;
        $data['user_info'] = $this->mdl_systemadmin->get_user($id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('edit', $data);
    }

	public function update(){
		/*echo "<pre>";print_r($_POST);
		echo "</pre>";
		exit;*/

		if (isset($_POST['update_systemadmin'])){
            $data = array();
        	$data['id'] = $this->input->post('system_admin_id');
        	$data['preferred_name'] = !empty($this->input->post('preferred_name')) ? $this->input->post('preferred_name') : '';
            $data['date_of_birth'] = !empty($this->input->post('date_of_birth')) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : '';
            $data['gender'] = !empty($this->input->post('gender')) ? $this->input->post('gender') : '';
            $data['religion'] = !empty($this->input->post('religion')) ? $this->input->post('religion') : '';
            $data['email'] = !empty($this->input->post('email')) ? $this->input->post('email') : '';
            $data['phone'] = !empty($this->input->post('phone')) ? $this->input->post('phone') : '';
            $data['address'] = !empty($this->input->post('address')) ? $this->input->post('address') : '';
            $data['joining_date'] = !empty($this->input->post('joining_date')) ? $this->input->post('joining_date') : '';
            $data['username'] = !empty($this->input->post('username')) ? $this->input->post('username') : '';
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $_SESSION['logged_in']['user_id'];
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
	            	redirect('system_admin/add');
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
            $update_status = $this->mdl_systemadmin->update_system_admin($data);
            if($update_status){
            	$message = array('message' => 'system admin has been updated successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('system_admin');
        }
	}

    function reset_password(){
        // $data['user_info'] = $this->mdl_systemadmin->get_user($id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        if(isset($_POST['reset_password'])){
            $filter_arr = array(
                'user_id' => $_POST['user_id'], 
                'new_password' => $_POST['new_password'], 
            );
            $update_status = $this->mdl_systemadmin->update_user_password($filter_arr);
            if($update_status){
                $message = array('message' => 'Password has been updated successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            redirect('system_admin/reset_password');
        }
        $this->load->view('reset_password');
    }

	function delete(){
		$id = $this->uri->segment(3);
		// echo $id;exit;
		$delete_status = $this->mdl_students->delete_system_admin($id);
        if($delete_status){
        	$message = array('message' => 'System admin has been archived successfully','class' => 'alert alert-success fade in');
        }else{
        	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
		$this->session->set_flashdata('item', $message);
        redirect('students');
	}
}
