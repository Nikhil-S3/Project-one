<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_salary extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_manage_salary');
        $this->load->model('teachers/mdl_teachers');
        $this->load->model('salary_template/mdl_salary_template');
	}
	public function index(){

        $class_id = '';
        $data = [];
        $data['all_manage_salary'] = $this->mdl_manage_salary->get_teachers_all_salary_templates();
        $selected_fields = array('id','preferred_name');
        $data['all_teachers'] = $this->mdl_teachers->get_all_teachers($selected_fields);
        $selected_fields = array('id','grade');
        $data['all_salary_template'] = $this->mdl_salary_template->get_all_salary_templates($selected_fields);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}

    function assign_salary_template_to_teacher(){
        // echo "<pre>";print_r($_POST);echo "</pre>";exit;
        $data = array();
        $data['s_template_id'] = !empty($this->input->post('salary_template_id')) ? $this->input->post('salary_template_id') : '';
        $data['teacher_id'] = !empty($this->input->post('teacher_id')) ? $this->input->post('teacher_id') : '';
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $_SESSION['logged_in']['user_id'];
        $assign_status =  $this->mdl_manage_salary->assign_salarytemplate_to_teachers($data);
        if($assign_status){
            $message = array('message' => 'Salary Template has been assigned.','class' => 'alert alert-success fade in');
        }else{
            $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
        $this->session->set_flashdata('item', $message);
        redirect('manage_salary');
    }
    
	function view(){
        $manage_salary_id = $this->uri->segment(3);
        $data['teacher_salary_info'] =  $this->mdl_manage_salary->get_teacher_salary_details($manage_salary_id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('view', $data);
    }

    function edit(){
        $manage_salary_id = $this->uri->segment(3);
        $data['teacher_salary_info'] =  $this->mdl_manage_salary->get_teacher_salary_details($manage_salary_id);
        $selected_fields = array('id','preferred_name');
        $data['all_teachers'] = $this->mdl_teachers->get_all_teachers($selected_fields);
        $selected_fields = array('id','grade');
        $data['all_salary_template'] = $this->mdl_salary_template->get_all_salary_templates($selected_fields);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('edit', $data);
    }
    function update(){
        // echo "<pre>";print_r($_POST);echo "</pre>";exit;
        $data = array();
        $data['id'] = !empty($this->input->post('manage_salary_id')) ? $this->input->post('manage_salary_id') : '';
        $data['s_template_id'] = !empty($this->input->post('salary_template_id')) ? $this->input->post('salary_template_id') : '';
        $data['teacher_id'] = !empty($this->input->post('teacher_id')) ? $this->input->post('teacher_id') : '';
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $_SESSION['logged_in']['user_id'];
        $update_status =  $this->mdl_manage_salary->update_teachers_salarytemplate($data);
        if($update_status){
            $message = array('message' => 'Salary Template has been assigned.','class' => 'alert alert-success fade in');
        }else{
            $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
        $this->session->set_flashdata('item', $message);
        redirect('manage_salary');
    }
    public function ajax_check_teacher_assigned_or_not(){
        if(!empty($_POST['id'])){
            $teacher_id = $_POST['id'];
            $result = $this->mdl_manage_salary->check_teacher_exists($teacher_id);
            // echo "<pre>";print_r($result);echo "</pre>";exit;
            if($result>0){
                $result_arr = array('status'=>1);
                echo json_encode($result_arr);
            }else{
                $result_arr = array('status'=>0);
                echo json_encode($result_arr);
            }
        }
    }
}
