<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sattendance extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_sattendance');
        $this->load->model('classes/mdl_class');
        $this->load->model('students/mdl_students');
	}
	public function index(){

        $class_id = '';
        $data = [];
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        if(!empty($_POST['class_id'])){
            $class_id = $_POST['class_id'];
            // echo $class_id;exit;
            $data['all_attendance'] = $this->mdl_sattendance->get_attendance_classwise($class_id);
            $this->load->model('sections/mdl_sections');
            $data['class_sections'] = $this->mdl_sections->get_class_sections($class_id);
            $this->session->set_flashdata('class_id',$class_id);
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }

		// $this->load->model('students/mdl_students');
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
    public function get_students_sectionwise(){
        $section_id = '';
        $data = [];
        if(!empty($_POST['section_id'])){
            $section_id = $_POST['section_id'];
            // echo 'section_id '.$section_id;exit;
            $data['section_attendance'] = $this->mdl_sattendance->get_attendance_students_sectionwise($section_id);
        }
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('sectionwise_attendance_students', $data);
    }
	public function add(){
		$data = array();
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $this->session->unset_userdata('class_id', 'section_id', 'attendance_date');
        if(isset($_POST['attendance_submit']) && $_POST['attendance_submit']=='Attendance'){
            // $filter_arr = array();
            $data['class_id'] = !empty($_POST['class_id'])?$_POST['class_id']:'';
            $data['section_id'] = !empty($_POST['section_id'])?$_POST['section_id']:'';
            // $data['subject_id'] = !empty($_POST['subject_id'])?$_POST['subject_id']:'';
            $data['attendance_date'] = !empty($_POST['attendance_date'])?$_POST['attendance_date']:'';
            // $this->load->model('mdl_sattendance');
            $data['student_attendance_info'] = $this->mdl_students->get_students_class_sectionwise($data);
            $flashdata = array(
                'class_id'  => $data['class_id'],
                'section_id'     => $data['section_id'],
                // 'subject_id' => $data['subject_id'],    
                'attendance_date' => $data['attendance_date'],
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
	public function ajax_save_attendance(){
		/*echo "<pre>";print_r($_POST);
		echo "</pre>";
		exit;*/

    	$data = array();
        $data['class_id'] = !empty($this->input->post('class_id')) ? $this->input->post('class_id') : '';
        $data['section_id'] = !empty($this->input->post('section_id')) ? $this->input->post('section_id') : '';
        // $data['subject_id'] = !empty($this->input->post('subject_id')) ? $this->input->post('subject_id') : '';
        $attendance_date = !empty($this->input->post('a_date')) ? $this->input->post('a_date') : '';
        // convert date_format from d/m/Y to d-m-Y becoz PHP doesn't work well with dd/mm/yyyy format
        $converted_date = str_replace('/', '-', $attendance_date);
        $data['a_date'] = date('Y-m-d', strtotime($converted_date));
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $student_arr = array();
        $attendance_arr = array();
        if(!empty($_POST['attendance']) && count($_POST['attendance'])>0){
            foreach($_POST['attendance'] as $a_key=>$a_val){
                $student_arr[] = str_replace('attendance', '', $a_key);
                $attendance_arr[] = $a_val;
            }
            // echo "student array : ";
            // echo "<pre>";print_r($student_arr);echo "</pre>";exit;
        } 
        if(count($student_arr)>0 && count($attendance_arr)>0){
            $data['attendance'] = array_combine($student_arr,$attendance_arr);
        }
        // $data['student_ids_arr'] = $student_arr;
        // $data['attendance_arr'] = $attendance_arr;
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $insert_status = $this->mdl_sattendance->save_attendance($data);
        if($insert_status){
        	$response = array(
                'status'=>'1',
                'message' => 'Student attendance has been taken successfully',
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
    
	function view(){
        $student_id = $this->uri->segment(3);
        // echo $student_id;exit;
        $attendance_type = $this->uri->segment(5);
        $section_id = '';
        if(!empty($attendance_type) && $attendance_type=='section'){
            $section_id = $this->uri->segment(4);
        }
        $filter_arr = array(
            'student_id' => $student_id,
            'section_id' => $section_id
        );
        $data['attendance_student_data'] = $this->mdl_sattendance->get_attendance_student_data($student_id);

        $data['total_stats'] = $this->mdl_sattendance->get_student_attendance_stats_data($filter_arr);
        /*echo "<pre>";
        print_r($data['total_stats']);
        echo "</pre>";exit;*/

        /*$filter_arr = array(
            'student_id' => $student_id,
            'section_id' => $section_id
        );*/
        $monthwise_attendance = $this->mdl_sattendance->get_student_monthly_attendance($filter_arr);
        /*echo "<pre>";
        print_r($monthwise_attendance);
        echo "</pre>";exit;*/

        $data['student_attendance'] = $monthwise_attendance;
        $month_arr = array(
            '1'=>'Jan',
            '2'=>'Feb',
            '3'=>'Mar',
            '4'=>'Apr',
            '5'=>'May',
            '6'=>'Jun',
            '7'=>'Jul',
            '8'=>'Aug',
            '9'=>'Sep',
            '10'=>'Oct',
            '11'=>'Nov',
            '12'=>'Dec'
            );
        $data['month_arr'] = $month_arr;
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('view_student_attendance', $data);
    }
}
