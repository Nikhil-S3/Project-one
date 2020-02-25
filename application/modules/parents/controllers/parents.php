<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parents extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_parents');
	}
	public function index(){
		// echo "<h1>Hello, Ready to go. This is Students Module.</h1>";
		$data['all_parents'] = $this->mdl_parents->get_all_parents();
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
	public function add(){
		// echo "<h1>Hello, Ready to go. This is Teachers Module.</h1>";
		$this->load->view('create');
	}

	public function save(){
		/*echo "<pre>";print_r($_POST);
		echo "</pre>";
		exit;*/

		$this->form_validation->set_rules('parent_guardian_name', 'Name', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

		if ($this->form_validation->run() == FALSE){
                $this->load->view('create');
        }else{
        	$data = array();
            $data['parent_guardian_name'] = !empty($this->input->post('parent_guardian_name')) ? $this->input->post('parent_guardian_name') : '';
        	$data['parent_father_name'] = !empty($this->input->post('parent_father_name')) ? $this->input->post('parent_father_name') : '';
            $data['parent_mother_name'] = !empty($this->input->post('parent_mother_name')) ? $this->input->post('parent_mother_name') : '';
            $data['parent_father_profession'] = !empty($this->input->post('parent_father_profession')) ? $this->input->post('parent_father_profession') : '';
        	$data['parent_mother_profession'] = !empty($this->input->post('parent_mother_profession')) ? $this->input->post('parent_mother_profession') : '';
        	$data['email'] = !empty($this->input->post('email')) ? $this->input->post('email') : '';
        	$data['phone'] = !empty($this->input->post('phone')) ? $this->input->post('phone') : '';
        	$data['address'] = !empty($this->input->post('address')) ? $this->input->post('address') : '';
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
            $data['role_id'] = 3;
            $data['created_by'] = $_SESSION['logged_in']['user_id'];
            $insert_status = $this->mdl_parents->insert_parent($data);
            if($insert_status){
            	$message = array('message' => 'Parent has been added successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('parents');
        }
	}
    public function edit(){
        // $id = $this->uri->segment(3);
        // echo $id;exit;
        $data['encrypt_id'] = $encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
        $data['parent_info'] = $this->mdl_parents->get_student($decrypt_id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('edit', $data);
    }
	public function update(){
		/*echo "<pre>";print_r($_POST);
        print_r($_FILES);
		echo "</pre>";
		exit;*/

		$this->form_validation->set_rules('parent_guardian_name', 'Name', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]');
        
		if ($this->form_validation->run() == FALSE){
            $this->load->view('create');
        }else{
        	$data = array();
        	// $data['id'] = $this->input->post('id');
            $encrypt_id = $this->input->post('id');
            $data['id'] = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
            $data['parent_guardian_name'] = !empty($this->input->post('parent_guardian_name')) ? $this->input->post('parent_guardian_name') : '';
            $data['parent_father_name'] = !empty($this->input->post('parent_father_name')) ? $this->input->post('parent_father_name') : '';
            $data['parent_mother_name'] = !empty($this->input->post('parent_mother_name')) ? $this->input->post('parent_mother_name') : '';
            $data['parent_father_profession'] = !empty($this->input->post('parent_father_profession')) ? $this->input->post('parent_father_profession') : '';
            $data['parent_mother_profession'] = !empty($this->input->post('parent_mother_profession')) ? $this->input->post('parent_mother_profession') : '';
            $data['email'] = !empty($this->input->post('email')) ? $this->input->post('email') : '';
            $data['phone'] = !empty($this->input->post('phone')) ? $this->input->post('phone') : '';
            $data['address'] = !empty($this->input->post('address')) ? $this->input->post('address') : '';
            $data['username'] = !empty($this->input->post('username')) ? $this->input->post('username') : '';
            // $data['password'] = !empty($this->input->post('password')) ? $this->input->post('password') : '';
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
            // echo "<pre>";
            // print_r($data);exit;

            $update_status = $this->mdl_parents->update_parent($data);
            if($update_status){
            	$message = array('message' => 'Parent has been updated successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('parents');
        }
	}
	function delete(){
		// $id = $this->uri->segment(3);
		// echo $id;exit;
        $encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
		$delete_status = $this->mdl_parents->delete_parent($decrypt_id);
        if($delete_status){
        	$message = array('message' => 'Parent has been archived successfully','class' => 'alert alert-success fade in');
        }else{
        	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
		$this->session->set_flashdata('item', $message);
        redirect('parents');
	}
}
