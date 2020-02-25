<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sections extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_sections');
        $this->load->model('classes/mdl_class');
        $this->load->model('teachers/mdl_teachers');
	}
	public function index(){
		// echo "<h1>Hello, Ready to go. This is Students Module.</h1>";
		$data['all_classes'] = $this->mdl_class->get_all_classes();
        $data['all_teachers'] = $this->mdl_teachers->get_all_teachers();
		$data['all_sections'] = $this->mdl_sections->get_all_sections();
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
		$this->form_validation->set_rules('section', 'Section', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('capacity', 'Capacity', 'trim|required');
        $this->form_validation->set_rules('class_of_section', 'Class', 'required');
		$this->form_validation->set_rules('teacher_id', 'teacher name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
                $this->load->view('list');
        }else{
        	$data = array();
            $data['section'] = !empty($this->input->post('section')) ? $this->input->post('section') : '';
        	$data['category'] = !empty($this->input->post('category')) ? $this->input->post('category') : '';
        	$data['capacity'] = !empty($this->input->post('capacity')) ? $this->input->post('capacity') : '';
        	$data['class_id'] = !empty($this->input->post('class_of_section')) ? $this->input->post('class_of_section') : '';
        	$data['teacher_id'] = !empty($this->input->post('teacher_id')) ? $this->input->post('teacher_id') : '';
        	$data['notes'] = !empty($this->input->post('notes')) ? $this->input->post('notes') : '';
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $_SESSION['logged_in']['user_id'];
        	
            $insert_status = $this->mdl_sections->insert_section($data);
            if($insert_status){
            	$message = array('message' => 'Section has been added successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('sections');
        }
	}
    public function edit(){
        // $id = $this->uri->segment(3);
        // echo $id;exit;
        $data['encrypt_id'] = $encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $data['all_teachers'] = $this->mdl_teachers->get_all_teachers();
        $data['section_info'] = $this->mdl_sections->get_section($decrypt_id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('edit', $data);
    }
	public function update(){
		/*echo "<pre>";print_r($_POST);
        print_r($_FILES);
		echo "</pre>";
		exit;*/

		$this->form_validation->set_rules('section', 'Section', 'trim|required');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('capacity', 'Capacity', 'trim|required');
        $this->form_validation->set_rules('class_of_section', 'Class', 'required');
        $this->form_validation->set_rules('teacher_id', 'teacher name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
            $this->load->view('list');
        }else{
        	$data = array();
        	// $data['id'] = $this->input->post('id');
            $encrypt_id = $this->input->post('id');
            $data['id'] = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
            $data['section'] = !empty($this->input->post('section')) ? $this->input->post('section') : '';
            $data['category'] = !empty($this->input->post('category')) ? $this->input->post('category') : '';
            $data['capacity'] = !empty($this->input->post('capacity')) ? $this->input->post('capacity') : '';
            $data['class_id'] = !empty($this->input->post('class_of_section')) ? $this->input->post('class_of_section') : '';
            $data['teacher_id'] = !empty($this->input->post('teacher_id')) ? $this->input->post('teacher_id') : '';
            $data['notes'] = !empty($this->input->post('notes')) ? $this->input->post('notes') : '';
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $_SESSION['logged_in']['user_id'];
        	// echo "<pre>";
            // print_r($data);exit;

            $update_status = $this->mdl_sections->update_section($data);
            if($update_status){
            	$message = array('message' => 'Section has been updated successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('sections');
        }
	}
	function delete(){
		// $id = $this->uri->segment(3);
		// echo $id;exit;
        $encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
		$delete_status = $this->mdl_sections->delete_section($decrypt_id);
        if($delete_status){
        	$message = array('message' => 'Section has been archived successfully','class' => 'alert alert-success fade in');
        }else{
        	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
		$this->session->set_flashdata('item', $message);
        redirect('sections');
	}
    public function ajax_get_class_sections($class_id = '',$is_ajax=''){
        if(!empty($_POST['class_id'])){
            $class_id = $_POST['class_id'];
        }
        // echo $class_id;exit;
        $result = $this->mdl_sections->get_class_sections($class_id);
        // echo "<pre>";print_r($result);exit;
        if(!empty($_POST['is_ajax'])){
            echo "<option value='0'>Select Section</option>";
            if(count($result)>0){
                foreach($result as $key=>$val){
                    echo "<option value='".$val->id."'>".$val->section."</option>";
                }
            }
        }
        return $result;
    }
}
