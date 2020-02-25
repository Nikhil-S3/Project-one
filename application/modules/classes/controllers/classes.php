<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_class');
        $this->load->model('teachers/mdl_teachers');
    }
	public function index(){
		// echo "<h1>Hello, Ready to go. This is Students Module.</h1>";
		$data['all_classes'] = $this->mdl_class->get_all_classes();
        $data['all_teachers'] = $this->mdl_teachers->get_all_teachers();
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
	public function add(){
		// echo "<h1>Hello, Ready to go. This is Students Module.</h1>";
		$this->load->view('create');
	}
    public function save(){
        /*echo "<pre>";print_r($_POST);
        echo "</pre>";
        exit;*/

        $this->form_validation->set_rules('class_of_student', 'Class', 'trim|required');
        $this->form_validation->set_rules('class_numeric', 'Class Numeric', 'trim|required|numeric');
        $this->form_validation->set_rules('teacher_id', 'Teacher Name', 'trim|required');
        
        if ($this->form_validation->run() == FALSE){
                $this->load->view('create');
        }else{
            $data = array();
            $data['class'] = !empty($this->input->post('class_of_student')) ? $this->input->post('class_of_student') : '';
            $data['class_numeric'] = !empty($this->input->post('class_numeric')) ? $this->input->post('class_numeric') : '';
            $data['teacher_id'] = !empty($this->input->post('teacher_id')) ? $this->input->post('teacher_id') : '';
            $data['notes'] = !empty($this->input->post('notes')) ? $this->input->post('notes') : '';
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $_SESSION['logged_in']['user_id'];
            
            $insert_status = $this->mdl_class->insert_class($data);
            if($insert_status){
                $message = array('message' => 'Class has been added successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            redirect('classes');
        }
    }
	public function edit(){
		// $id = $this->uri->segment(3);
		// echo $id;exit;
        $data['encrypt_id'] = $encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
		$data['class_info'] = $this->mdl_class->get_class($decrypt_id);
        $data['all_teachers'] = $this->mdl_teachers->get_all_teachers();
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('edit', $data);
	}
    public function update(){
		/*echo "<pre>";print_r($_POST);
		echo "</pre>";
		exit;*/

		$this->form_validation->set_rules('class_of_student', 'Class', 'trim|required');
        $this->form_validation->set_rules('class_numeric', 'Class Numeric', 'trim|required|numeric');
        $this->form_validation->set_rules('teacher_id', 'Teacher Name', 'trim|required');

		if ($this->form_validation->run() == FALSE){
                $this->load->view('create');
        }else{
        	$data = array();
        	// $data['id'] = $this->input->post('class_id');
            $encrypt_id = $this->input->post('class_id');
            $data['id'] = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');

        	$data['class'] = !empty($this->input->post('class_of_student')) ? $this->input->post('class_of_student') : '';
            $data['class_numeric'] = !empty($this->input->post('class_numeric')) ? $this->input->post('class_numeric') : '';
            $data['teacher_id'] = !empty($this->input->post('teacher_id')) ? $this->input->post('teacher_id') : '';
            $data['notes'] = !empty($this->input->post('notes')) ? $this->input->post('notes') : '';
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $_SESSION['logged_in']['user_id'];

            $update_status = $this->mdl_class->update_class($data);
            if($update_status){
            	$message = array('message' => 'Class has been updated successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('classes');
        }
	}
	function delete(){
		// $id = $this->uri->segment(3);
		// echo $id;exit;
        $encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
        
		$delete_status = $this->mdl_class->delete_class($decrypt_id);
        if($delete_status){
        	$message = array('message' => 'Class has been archived successfully','class' => 'alert alert-success fade in');
        }else{
        	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
		$this->session->set_flashdata('item', $message);
        redirect('classes');
	}
}
