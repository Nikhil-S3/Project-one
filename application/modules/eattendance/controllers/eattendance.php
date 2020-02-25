<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eattendance extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_eattendance');
        $this->load->model('classes/mdl_class');
	}
	public function index(){
        // echo "<pre>";print_r($_POST);echo "</pre>";exit;
        $class_id = '';
        $data = [];
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $this->load->model('exams/mdl_exams');
        $data['all_exams'] = $this->mdl_exams->get_all_exams();
        $flashdata = array(
            'exam_id','class_id','subject_id'    
        );
        $this->session->unset_userdata($flashdata);
        if(isset($_POST['attendance_submit'])){
            $data['exam_id'] = !empty($_POST['exam_id'])?$_POST['exam_id']:'';
            $data['class_id'] = !empty($_POST['class_id'])?$_POST['class_id']:'';
            $data['subject_id'] = !empty($_POST['subject_id'])?$_POST['subject_id']:'';
            // echo $class_id;exit;
            $data['all_attendance'] = $this->mdl_eattendance->get_attendance_exam_class_subjectwise($data);

            if(!empty($data['class_id'])){
                $this->load->module('subject/subject');
                $data['class_subjects'] = $this->subject->ajax_get_class_subjects($data['class_id']);
                $this->load->model('sections/mdl_sections');
                $data['class_sections'] = $this->mdl_sections->get_class_sections($data['class_id']);
            }

            $flashdata = array(
                'exam_id' => $data['exam_id'],
                'class_id'  => $data['class_id'],
                'subject_id' => $data['subject_id'],    
            );
            $this->session->set_flashdata($flashdata);
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
    
	public function add(){
		$data = array();
        /*$this->load->model('exams/mdl_exams');
        $data['all_exams'] = $this->mdl_exams->get_all_exams();
        $this->load->model('classes/mdl_class');
        $data['all_classes'] = $this->mdl_class->get_all_classes();*/
        $this->load->model('examschedule/mdl_examschedule');
        $data['all_examschedule'] = $this->mdl_examschedule->get_all_examschedules();
        if(isset($_POST['attendance_submit']) && $_POST['attendance_submit']=='Attendance'){
            // $filter_arr = array();
            // echo "<pre>";print_r($_POST);echo "</pre>";exit;
            $data['examschedule_id'] = !empty($_POST['examschedule_id'])?$_POST['examschedule_id']:'';
            $data['exam_id'] = !empty($_POST['exam_id'])?$_POST['exam_id']:'';
            $data['class_id'] = !empty($_POST['class_id'])?$_POST['class_id']:'';
            $data['section_id'] = !empty($_POST['section_id'])?$_POST['section_id']:'';
            $data['subject_id'] = !empty($_POST['subject_id'])?$_POST['subject_id']:'';
            if($_POST['attendance_taken']){
                $data['student_examattendance_info'] = $this->mdl_eattendance->get_examattendance_students_attendancewise($data);
                // echo "<pre>";print_r($data);echo "</pre>";exit;
            }
            $this->load->model('students/mdl_students');
            $data['student_attendance_info'] = $this->mdl_students->get_students_class_sectionwise($data);
            
            $flashdata = array(
                'examschedule_id' => $data['examschedule_id'], 
                'exam_id' => $data['exam_id'], 
                'class_id' => $data['class_id'], 
                'section_id' => $data['section_id'], 
                'subject_id' => $data['subject_id'], 
            );
            $this->session->set_flashdata($flashdata);
            
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }
        $this->load->view('create', $data);
	}
	public function ajax_save_exam_attendance(){
		/*echo "<pre>";print_r($_POST);
		echo "</pre>";
		exit;*/
    	$data = array();
        $data['student_id'] = !empty($_POST['student_id']) ? $_POST['student_id'] : '';
        $data['exam_id'] = !empty($_POST['exam_id']) ? $_POST['exam_id'] : '';
        $data['class_id'] = !empty($_POST['class_id']) ? $_POST['class_id'] : '';
        $data['section_id'] = !empty($_POST['section_id']) ? $_POST['section_id'] : '';
        $data['subject_id'] = !empty($_POST['subject_id']) ? $_POST['subject_id'] : '';
        $data['exam_schedule_id'] = !empty($_POST['exam_schedule_id']) ? $_POST['exam_schedule_id'] : '';
        $data['present_status'] = 0;
        if(isset($_POST['present_status']))
            $data['present_status'] = $_POST['present_status'];

        $data['created_at'] = date('Y-m-d H:i:s');
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        
        $insert_status = $this->mdl_eattendance->save_attendance($data);
        if($insert_status){
        	$response = array(
                'status'=>'1',
                'message' => 'Exam attendance has been taken successfully',
                'class' => 'alert alert-success fade in'
            );
        }else{
        	$response = array(
                'status'=>'0',
                'message' => 'Something went wrong, please try again later',
                'class' => 'alert alert-danger fade in'
            );
        }
        echo json_encode($response);
		// $this->session->set_flashdata('item', $message);
        // redirect('sattendance');
	}

    public function get_students_sectionwise(){
        $section_id = '';
        $data = [];
        if(!empty($_POST['section_id'])){
            $section_id = $_POST['section_id'];
            // echo 'section_id '.$section_id;exit;
            $data['section_attendance'] = $this->mdl_eattendance->get_attendance_students_sectionwise($section_id);
        }
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('sectionwise_exam_attendance_students', $data);
    }
    
}
