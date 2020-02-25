<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marks extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_marks');
        $this->load->model('classes/mdl_class');
	}
	public function index(){

        $class_id = '';
        $data = [];
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $this->session->unset_userdata('class_id');
        if(!empty($_POST['class_id'])){
            $class_id = $_POST['class_id'];
            // echo $class_id;exit;
            $data['all_students'] = $this->mdl_marks->get_markassigned_students_classwise($class_id);
            $this->load->model('sections/mdl_sections');
            $data['class_sections'] = $this->mdl_sections->get_class_sections($class_id);
            $this->session->set_flashdata('class_id',$class_id);
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }

		// $this->load->model('students/mdl_students');
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
    function get_markassigned_students_sectionwise(){
        $section_id = '';
        $data = [];
        if(!empty($_POST['section_id'])){
            $section_id = $_POST['section_id'];
            // echo 'section_id '.$section_id;exit;
            $data['sectionwise_students'] = $this->mdl_marks->get_markassigned_students_sectionwise($section_id);
        }
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('sectionwise_marksassigned_students', $data);
    }
    function view(){
        $student_id = $this->uri->segment(3);
        // echo $student_id;exit;
        $view_type = $this->uri->segment(5);
        $section_id = '';
        if(!empty($view_type) && $view_type=='section'){
            $section_id = $this->uri->segment(4);
        }
        $filter_arr = array(
            'student_id' => $student_id,
            'section_id' => $section_id
        );
        $this->load->model('sattendance/mdl_sattendance');
        $data['student_info'] = $this->mdl_sattendance->get_attendance_student_data($student_id);
        $data['student_exams'] = $this->mdl_marks->get_student_exams($student_id);
        /*echo "<pre>";
        print_r($data['student_exams']);
        echo "</pre>";exit;*/
        $student_marks = array();
        foreach ($data['student_exams'] as $key => $value) {
            $filter_arr['exam_id'] = $value->exam_id;
            $student_marks[$value->exam_id] = $this->mdl_marks->get_student_marks($filter_arr);
        }
        // get Grades
        foreach ($student_marks as $outer_arrk => $outer_arrv) {
            foreach ($outer_arrv as $key => $value) {
                $subject_grades[$value->id] = $this->mdl_marks->get_student_subject_grades($value->marks);
            }
        }
        // $data['total_stats'] = $this->mdl_sattendance->get_student_attendance_stats_data($filter_arr);
        /*echo "<pre>";
        print_r($subject_grades);
        echo "</pre>";exit;*/

        $data['student_marks'] = $student_marks;
        $data['subject_grades'] = $subject_grades;
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('view_student_marks', $data);
    }
    public function get_students_sectionwise(){
        $section_id = '';
        $data = [];
        if(!empty($_POST['section_id'])){
            $section_id = $_POST['section_id'];
            // echo 'section_id '.$section_id;exit;
            $this->load->model('mdl_sattendance');
            $data['section_attendance'] = $this->mdl_sattendance->get_attendance_students_sectionwise($section_id);
        }
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('sectionwise_attendance_students', $data);
    }
	public function add(){
		$data = array();
        $this->load->model('exams/mdl_exams');
        $data['all_exams'] = $this->mdl_exams->get_all_exams();
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $flashdata = array(
            'exam_id','class_id','section_id','subject_id'    
        );
        $this->session->unset_userdata($flashdata);
        // echo "<pre>";print_r($_POST);echo "</pre>";exit;
        if(isset($_POST['mark_submit']) && $_POST['mark_submit']=='Mark'){
            // $filter_arr = array();
            $data['exam_id'] = !empty($_POST['exam_id'])?$_POST['exam_id']:'';
            $data['class_id'] = !empty($_POST['class_id'])?$_POST['class_id']:'';
            $data['section_id'] = !empty($_POST['section_id'])?$_POST['section_id']:'';
            $data['subject_id'] = !empty($_POST['subject_id'])?$_POST['subject_id']:'';
            $this->load->model('marks/mdl_marks');
            $data['student_marks_info'] = $this->mdl_marks->get_students_marks($data);

            // echo "<pre>";print_r($data);echo "</pre>";exit;
            $data['student_exam_info'] = $this->mdl_marks->get_students_attendancewise($data);
            $flashdata = array(
                'exam_id' => $data['exam_id'],
                'class_id'  => $data['class_id'],
                'section_id'     => $data['section_id'],
                'subject_id' => $data['subject_id'],    
            );
            $this->session->set_flashdata($flashdata);
            
            $this->load->module('subject/subject');
            $this->load->module('sections/sections');
            if(!empty($data['class_id'])){
                $data['class_subjects'] = $this->subject->ajax_get_class_subjects($data['class_id'],$is_optional_subjects='0');
                $data['class_sections'] = $this->sections->ajax_get_class_sections($data['class_id']);
            }
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }
        $this->load->view('create', $data);
	}
	public function ajax_save_marks(){
		/*echo "<pre>";print_r($_POST);
		echo "</pre>";
		exit;*/

    	$data = array();
        $data['class_id'] = !empty($this->input->post('class_id')) ? $this->input->post('class_id') : '';
        $data['section_id'] = !empty($this->input->post('section_id')) ? $this->input->post('section_id') : '';
        $data['subject_id'] = !empty($this->input->post('subject_id')) ? $this->input->post('subject_id') : '';
        $data['exam_id'] = !empty($this->input->post('exam_id')) ? $this->input->post('exam_id') : '';
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $student_arr = array();
        $marks_arr = array();
        if(!empty($_POST['attendance']) && count($_POST['attendance'])>0){
            foreach($_POST['attendance'] as $a_key=>$a_val){
                $student_arr[] = str_replace('student-', '', $a_key);
                $marks_arr[] = $a_val;
            }
            // echo "student array : ";
            // echo "<pre>";print_r($student_arr);echo "</pre>";exit;
        } 
        if(count($student_arr)>0 && count($marks_arr)>0){
            $data['marks'] = array_combine($student_arr,$marks_arr);
        }
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $insert_status = $this->mdl_marks->save_marks($data);
        if($insert_status){
        	$response = array(
                'status'=>'1',
                'message' => 'Student marks has been taken successfully',
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
    
}
