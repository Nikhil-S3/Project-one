<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examschedule extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_examschedule');
        $this->load->model('classes/mdl_class');
        $this->load->model('exams/mdl_exams');
	}
	public function index(){
        $data = [];
        $data['all_exams'] = $this->mdl_exams->get_all_exams();
        $data['all_examschedule'] = $this->mdl_examschedule->get_all_examschedules();
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
    public function add(){
        // echo "<pre>";print_r($_POST);echo "</pre>";exit;
		$data = array();
        if(isset($_POST['submit']) && $_POST['submit']=='Submit'){
            // echo "<pre>";print_r($data);echo "</pre>";exit;
            $insert_status = $this->mdl_examschedule->insert_exam_schedule();
            if($insert_status){
                $message = array('message' => 'ExamSchedule has been added successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            redirect('examschedule');
        }
        $this->load->view('create', $data);
	}
	
    public function edit(){
        $id = $this->uri->segment(3);
        // echo $id;exit;
        $data = array();
        $this->load->model('sections/mdl_sections');
        $data['examschedule_info'] = $this->mdl_examschedule->get_examschedule($id);
        $class_id = '';
        if(!empty($data['examschedule_info'])){
            $class_id = !empty($data['examschedule_info']->class_id)?$data['examschedule_info']->class_id:'';
        }
        $data['all_exams'] = $this->mdl_exams->get_all_exams();
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $this->load->module('subject/subject');
        if(!empty($class_id)){
            $data['class_subjects'] = $this->subject->ajax_get_class_subjects($class_id);
            $data['all_sections'] = $this->mdl_sections->get_class_sections($class_id);
        }
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('edit', $data);
    }

    public function update(){
        /*echo "<pre>";print_r($_POST);
        echo "</pre>";
        exit;*/
        if(isset($_POST['submit']) && $_POST['submit']=='Update'){
            $update_status = $this->mdl_examschedule->update_exam_schedule();
            if($update_status){
                $message = array('message' => 'ExamSchedule has been updated successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            // $this->edit();
            redirect('examschedule');
        }        
    }
    function ajax_get_examschedule_data(){
        if($_POST['es_id'] != ''){
            $examschedule_info = $this->mdl_examschedule->get_examschedule_data($_POST['es_id']);
            // echo "<pre>";print_r($examschedule_info']);echo "</pre>";exit;
            if(count($examschedule_info)>0){
                $response = array(
                    'exam_id' => $examschedule_info->exam_id,
                    'class_id' => $examschedule_info->class_id,
                    'section_id' => $examschedule_info->section_id,
                    'subject_id' => $examschedule_info->subject_id,
                    'exam_name' => $examschedule_info->exam_name,
                    'class' => $examschedule_info->class,
                    'section' => $examschedule_info->section,
                    'subject_name' => $examschedule_info->subject_name,
                    'attendance_taken' => $examschedule_info->attendance_taken,
                );
                echo json_encode($response);
            }
        }
    }
    function delete(){
        $id = $this->uri->segment(3);
        // echo $id;exit;
        $delete_status = $this->mdl_examschedule->delete_examschedule($id);
        if($delete_status){
            $message = array('message' => 'Exam Schedule has been archived successfully','class' => 'alert alert-success fade in');
        }else{
            $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
        $this->session->set_flashdata('item', $message);
        redirect('examschedule');
    }
}
