<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_subject');
        $this->load->model('classes/mdl_class');
        $this->load->model('teachers/mdl_teachers');
	}
	public function index(){
		// echo "<h1>Hello, Ready to go. This is Students Module.</h1>";
		$data['all_classes'] = $this->mdl_class->get_all_classes();
        $data['all_teachers'] = $this->mdl_teachers->get_all_teachers();
		$data['all_subjects'] = $this->mdl_subject->get_all_subjects();
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

        $this->form_validation->set_rules('class_id', 'Class', 'required');
		$this->form_validation->set_rules('teacher_id', 'teacher name', 'trim|required');
        $this->form_validation->set_rules('subject_type', 'Type', 'trim|required');
        $this->form_validation->set_rules('pass_mark', 'Pass Mark', 'trim|required|Numeric');
        $this->form_validation->set_rules('final_mark', 'Final Mark', 'trim|required|Numeric');
        $this->form_validation->set_rules('subject_name', 'Subject Name', 'trim|required');
        $this->form_validation->set_rules('subject_code', 'Subject Code', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
                $this->load->view('list');
        }else{
        	$data = array();
            $data['class_id'] = !empty($this->input->post('class_id')) ? $this->input->post('class_id') : '';
        	$data['teacher_id'] = !empty($this->input->post('teacher_id')) ? $this->input->post('teacher_id') : '';
        	 
            if(strlen($_POST['subject_type']) > 0) 
            { 
                $data['subject_type'] = $this->input->post('subject_type');
            }
        	
            $data['pass_mark'] = !empty($this->input->post('pass_mark')) ? $this->input->post('pass_mark') : '';
        	$data['final_mark'] = !empty($this->input->post('final_mark')) ? $this->input->post('final_mark') : '';
            $data['subject_name'] = !empty($this->input->post('subject_name')) ? $this->input->post('subject_name') : '';
            $data['subject_author'] = !empty($this->input->post('subject_author')) ? $this->input->post('subject_author') : '';
        	$data['subject_code'] = !empty($this->input->post('subject_code')) ? $this->input->post('subject_code') : '';
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $_SESSION['logged_in']['user_id'];
        	/*echo "<pre>";print_r($data);
            echo "</pre>";
            exit;*/
            $insert_status = $this->mdl_subject->insert_subject($data);
            if($insert_status){
            	$message = array('message' => 'Subject has been added successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('subject');
        }
	}
    public function edit(){
        // $id = $this->uri->segment(3);
        // echo $id;exit;
        $data['encrypt_id'] = $encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $data['all_teachers'] = $this->mdl_teachers->get_all_teachers();
        $data['subject_info'] = $this->mdl_subject->get_subject($decrypt_id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('edit', $data);
    }
	public function update(){
		/*echo "<pre>";print_r($_POST);
        // print_r($_FILES);
		echo "</pre>";
		exit;*/

		$this->form_validation->set_rules('class_id', 'Class', 'required');
        $this->form_validation->set_rules('teacher_id', 'teacher name', 'trim|required');
        $this->form_validation->set_rules('subject_type', 'Type', 'trim|required');
        $this->form_validation->set_rules('pass_mark', 'Pass Mark', 'trim|required|Numeric');
        $this->form_validation->set_rules('final_mark', 'Final Mark', 'trim|required|Numeric');
        $this->form_validation->set_rules('subject_name', 'Subject Name', 'trim|required');
        $this->form_validation->set_rules('subject_code', 'Subject Code', 'trim|required');
        
        if ($this->form_validation->run() == FALSE){
                $this->load->view('list');
        }else{
            $data = array();
            // $data['id'] = $this->input->post('id');
            $encrypt_id = $this->input->post('id');
            $data['id'] = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
            $data['class_id'] = !empty($this->input->post('class_id')) ? $this->input->post('class_id') : '';
            $data['teacher_id'] = !empty($this->input->post('teacher_id')) ? $this->input->post('teacher_id') : '';
            $data['subject_type'] = '';
            if(strlen($_POST['subject_type']) > 0) 
            { 
                $data['subject_type'] = $this->input->post('subject_type');
            }
            $data['pass_mark'] = !empty($this->input->post('pass_mark')) ? $this->input->post('pass_mark') : '';
            $data['final_mark'] = !empty($this->input->post('final_mark')) ? $this->input->post('final_mark') : '';
            $data['subject_name'] = !empty($this->input->post('subject_name')) ? $this->input->post('subject_name') : '';
            $data['subject_author'] = !empty($this->input->post('subject_author')) ? $this->input->post('subject_author') : '';
            $data['subject_code'] = !empty($this->input->post('subject_code')) ? $this->input->post('subject_code') : '';
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $_SESSION['logged_in']['user_id'];
            // echo "<pre>";print_r($data);echo "</pre>";exit;
            $update_status = $this->mdl_subject->update_subject($data);
            if($update_status){
                $message = array('message' => 'Subject has been updated successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            redirect('subject');
        }
	}
	function delete(){
		// $id = $this->uri->segment(3);
		// echo $id;exit;
        $encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
		$delete_status = $this->mdl_subject->delete_subject($decrypt_id);
        if($delete_status){
        	$message = array('message' => 'Subject has been archived successfully','class' => 'alert alert-success fade in');
        }else{
        	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
		$this->session->set_flashdata('item', $message);
        redirect('subject');
	}
    
    function ajax_get_class_subjects($class_id = '',$is_optional_subjects='',$is_ajax=''){

        if(!empty($_POST['class_id'])){
            $class_id = $_POST['class_id'];
        }
        $is_optional_subjects = !empty($_POST['is_optional_subjects'])?$_POST['is_optional_subjects']:$is_optional_subjects;
        /*echo $class_id;
        echo "\n".$is_optional_subjects;exit;*/
        
        $result = $this->mdl_subject->get_class_subjects($class_id,$is_optional_subjects);
        // echo "<pre>";print_r($result);exit;
        if(!empty($_POST['is_ajax'])){
            if($is_optional_subjects)
                echo "<option value='0'>Select Optional Subject</option>";
            else
                echo "<option value='0'>Select Subject</option>";
            
            if(count($result)>0){
                foreach($result as $key=>$val){
                    echo "<option value='".$val->id."'>".$val->subject_name."</option>";
                }
            }
        }
        return $result;
    }
    /*function ajax_get_class_optional_subjects($class_id = '',$is_ajax=''){
        if(!empty($_POST['class_id'])){
            $class_id = $_POST['class_id'];
        }
        $this->load->model('mdl_subject');
        $result = $this->mdl_subject->get_class_optional_subjects($class_id);
        // echo "<pre>";print_r($result);exit;
        if(!empty($_POST['is_ajax'])){
            echo "<option value='0'>Select Optional Subject</option>";
            if(count($result)>0){
                foreach($result as $key=>$val){
                    echo "<option value='".$val->id."'>".$val->subject_name."</option>";
                }
            }
        }
        return $result;
    }*/
}
