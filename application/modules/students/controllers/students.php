<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_students');
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
        $data['all_students'] = $this->mdl_students->get_all_students();
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

		$this->form_validation->set_rules('preferred_name', 'Name', 'required');
		$this->form_validation->set_rules('class_id', 'Class', 'required');
		$this->form_validation->set_rules('section_id', 'Section', 'required');
		$this->form_validation->set_rules('register_no', 'Register No', 'required');
		$this->form_validation->set_rules('roll_no', 'Roll No', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
                $this->load->view('create');
        }else{
        	$data = array();
        	$data['preferred_name'] = !empty($this->input->post('preferred_name')) ? $this->input->post('preferred_name') : '';
        	$data['parent_id'] = !empty($this->input->post('parent_id')) ? $this->input->post('parent_id') : '';
        	$data['date_of_birth'] = !empty($this->input->post('date_of_birth')) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : '';
        	$data['gender'] = !empty($this->input->post('gender')) ? $this->input->post('gender') : '';
        	$data['blood_group'] = !empty($this->input->post('blood_group')) ? $this->input->post('blood_group') : '';
        	$data['religion'] = !empty($this->input->post('religion')) ? $this->input->post('religion') : '';
        	$data['email'] = !empty($this->input->post('email')) ? $this->input->post('email') : '';
        	$data['phone'] = !empty($this->input->post('phone')) ? $this->input->post('phone') : '';
        	$data['address'] = !empty($this->input->post('address')) ? $this->input->post('address') : '';
        	$data['state'] = !empty($this->input->post('state')) ? $this->input->post('state') : '';
        	$data['country'] = !empty($this->input->post('country')) ? $this->input->post('country') : '';
        	$data['class_id'] = !empty($this->input->post('class_id')) ? $this->input->post('class_id') : '';
        	$data['section_id'] = !empty($this->input->post('section_id')) ? $this->input->post('section_id') : '';
        	$data['group'] = !empty($this->input->post('group')) ? $this->input->post('group') : '';
        	$data['optional_subject_id'] = !empty($this->input->post('optional_subject_id')) ? $this->input->post('optional_subject_id') : '';
        	$data['register_no'] = !empty($this->input->post('register_no')) ? $this->input->post('register_no') : '';
        	$data['roll_no'] = !empty($this->input->post('roll_no')) ? $this->input->post('roll_no') : '';
        	$data['extra_curricular_activities'] = !empty($this->input->post('extra_curricular_activities')) ? $this->input->post('extra_curricular_activities') : '';
        	$data['remarks'] = !empty($this->input->post('remarks')) ? $this->input->post('remarks') : '';
        	$data['username'] = !empty($this->input->post('username')) ? $this->input->post('username') : '';
        	$data['password'] = !empty($this->input->post('password')) ? md5($this->input->post('password')) : '';
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
            $data['role_id'] = 4;
            $data['created_by'] = $_SESSION['logged_in']['user_id'];
            $insert_status = $this->mdl_students->insert_student($data);
            if($insert_status){
            	$message = array('message' => 'Student has been added successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('students');
        }
	}
    
    public function edit(){

        $data['encrypt_id'] = $encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
        
        // echo $id;exit;
        $data['student_info'] = $this->mdl_students->get_student($decrypt_id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $class_id = '';
        if(!empty($data['student_info'])){
            $class_id = !empty($data['student_info']->class_id)?$data['student_info']->class_id:'';
        }
        // echo $class_id;exit;
        $data['all_parents'] = $this->mdl_parents->get_all_parents();
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $data['all_sections'] = $this->mdl_sections->get_all_sections();
        $this->load->module('subject/subject');
        if(!empty($class_id)){
            // $data['class_optional_subjects'] = $this->subject->ajax_get_class_optional_subjects($class_id);
            $data['class_optional_subjects'] = $this->subject->ajax_get_class_subjects($class_id,$is_optional_subjects='1');
        }
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('edit', $data);
    }

	public function update(){
		/*echo "<pre>";print_r($_POST);
		echo "</pre>";
		exit;*/

		$this->form_validation->set_rules('preferred_name', 'Name', 'required');
        $this->form_validation->set_rules('class_id', 'Class', 'required');
        $this->form_validation->set_rules('section_id', 'Section', 'required');
        $this->form_validation->set_rules('register_no', 'Register No', 'required');
        $this->form_validation->set_rules('roll_no', 'Roll No', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
		// $this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
                $this->load->view('edit');
        }else{
        	$data = array();
            $encrypt_id = $this->input->post('student_id');
            $data['id'] = $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
        	$data['preferred_name'] = !empty($this->input->post('preferred_name')) ? $this->input->post('preferred_name') : '';
        	$data['parent_id'] = !empty($this->input->post('parent_id')) ? $this->input->post('parent_id') : '';
        	$data['date_of_birth'] = !empty($this->input->post('date_of_birth')) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : '';
        	$data['gender'] = !empty($this->input->post('gender')) ? $this->input->post('gender') : '';
        	$data['blood_group'] = !empty($this->input->post('blood_group')) ? $this->input->post('blood_group') : '';
        	$data['religion'] = !empty($this->input->post('religion')) ? $this->input->post('religion') : '';
        	$data['email'] = !empty($this->input->post('email')) ? $this->input->post('email') : '';
        	$data['phone'] = !empty($this->input->post('phone')) ? $this->input->post('phone') : '';
        	$data['address'] = !empty($this->input->post('address')) ? $this->input->post('address') : '';
        	$data['state'] = !empty($this->input->post('state')) ? $this->input->post('state') : '';
        	$data['country'] = !empty($this->input->post('country')) ? $this->input->post('country') : '';
        	$data['class_id'] = !empty($this->input->post('class_id')) ? $this->input->post('class_id') : '';
        	$data['section_id'] = !empty($this->input->post('section_id')) ? $this->input->post('section_id') : '';
        	$data['group'] = !empty($this->input->post('group')) ? $this->input->post('group') : '';
        	$data['optional_subject_id'] = !empty($this->input->post('optional_subject_id')) ? $this->input->post('optional_subject_id') : '';
        	$data['register_no'] = !empty($this->input->post('register_no')) ? $this->input->post('register_no') : '';
        	$data['roll_no'] = !empty($this->input->post('roll_no')) ? $this->input->post('roll_no') : '';
        	$data['extra_curricular_activities'] = !empty($this->input->post('extra_curricular_activities')) ? $this->input->post('extra_curricular_activities') : '';
        	$data['remarks'] = !empty($this->input->post('remarks')) ? $this->input->post('remarks') : '';
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
	            	redirect('students/add');
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
            $update_status = $this->mdl_students->update_student($data);
            if($update_status){
            	$message = array('message' => 'Student has been updated successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('students');
        }
	}
    
	function delete(){
		$encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
		// echo $id;exit;
		$delete_status = $this->mdl_students->delete_student($decrypt_id);
        if($delete_status){
        	$message = array('message' => 'Student has been archived successfully','class' => 'alert alert-success fade in');
        }else{
        	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
		$this->session->set_flashdata('item', $message);
        redirect('students');
	}
}
