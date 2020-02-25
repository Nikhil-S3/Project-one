<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {

	public function __construct(){
		parent::__construct();
        if($this->session->userdata('logged_in')['role_id']!='1'){
            echo modules::run('common/access_denied');exit;
        }
        $this->load->model('mdl_reports');
		$this->load->model('classes/mdl_class');
        $this->load->model('students/mdl_students');
        $this->load->model('sections/mdl_sections');
        $this->load->model('subject/mdl_subject');
        $this->load->model('marks/mdl_marks');
	}
/*	public function class(){

        $class_id = '';
        $data = [];
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $flash_data = array(
                'class_id','section_id'
            );
        $this->session->unset_userdata($flash_data);
        if(!empty($_POST['get_report'])){
            $class_id = $_POST['class_id'];
            $section_id = $_POST['section_id'];
            // echo $class_id;exit;
            $filter_data = array(
                'class_id'  => $class_id,
                'section_id'     => $_POST['section_id'],
            );
            $data['class_reports'] = $this->mdl_reports->get_class_reports($filter_data);
            $data['class_sections'] = $this->mdl_sections->get_class_sections($class_id);
            // echo $data['class_reports']['subjects']->total_subjects."\n";
            // echo "<pre>";print_r($data);echo "</pre>";exit;
            $this->session->set_flashdata($filter_data);
        }

		// $this->load->model('students/mdl_students');
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('view_class_report', $data);
	}*/

    public function student(){
        $class_id = '';
        $data = [];
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $search_filter = array('report_for','report_for_dynamic','class_id','section_id');
        $this->session->unset_userdata($search_filter);
        if(!empty($_POST['get_report'])){
            // echo "<pre>";print_r($_POST);echo "</pre>";
            $report_for = $_POST['report_for'];
            $search_filter = array(
                'report_for' => $report_for,
                'report_for_dynamic' => $_POST['report_for_dynamic'],
                'class_id' => $_POST['class_id'],
                'section_id' => $_POST['section_id']
            );
            // echo "<pre>";print_r($search_filter);echo "</pre>";exit;
            $class_id = $_POST['class_id'];
            $section_id = $_POST['section_id'];
            $data['student_reports'] = $this->mdl_reports->get_student_reports($search_filter);
            $data['class_sections'] = $this->mdl_sections->get_class_sections($class_id);
            $this->session->set_flashdata($search_filter);
        }

        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('view_student_report', $data);
    }

    public function examschedule(){
        $class_id = '';
        $data = [];
        $this->load->model('exams/mdl_exams');
        $data['all_exams'] = $this->mdl_exams->get_all_exams();
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $search_filter = array('exam_id','class_id','section_id');
        $this->session->unset_userdata($search_filter);
        if(!empty($_POST['get_report'])){
            // echo "<pre>";print_r($_POST);echo "</pre>";
            $search_filter = array(
                'exam_id' => $_POST['exam_id'],
                'class_id' => $_POST['class_id'],
                'section_id' => $_POST['section_id']
            );
            // echo "<pre>";print_r($search_filter);echo "</pre>";exit;
            // $data['exam_name'] = array_search($_POST['exam_id'], $data['all_exams']);
            // echo "<pre>";print_r($data);echo "</pre>";exit;
            $data['examschedule_reports'] = $this->mdl_reports->get_examschedule_reports($search_filter);
            $data['class_sections'] = $this->mdl_sections->get_class_sections($_POST['class_id']);
            $this->session->set_flashdata($search_filter);
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }

        $this->load->view('view_examschedule_report', $data);
    }

    public function idcardreport(){
        $data = [];
        $this->load->model('teachers/mdl_teachers');
        $this->load->model('students/mdl_students');
        $data['all_teachers'] = $this->mdl_teachers->get_all_teachers();
        $data['all_students'] = $this->mdl_students->get_all_students();
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $search_filter = array('id_card_for','teacher_id','student_id','class_id','section_id');
        $this->session->unset_userdata($search_filter);
        if(!empty($_POST['get_report'])){
            // echo "<pre>";print_r($_POST);echo "</pre>";
            if($_POST['id_card_for']=='teacher'){
                $search_filter = array(
                    'id_card_for' => $_POST['id_card_for'],
                    'teacher_id' => $_POST['teacher_id'],
                );
                $data['report_for'] = 'teacher';
            }else{
                $search_filter = array(
                    'id_card_for' => $_POST['id_card_for'],
                    'student_id' => $_POST['student_id'],
                    'class_id' => $_POST['class_id'],
                    'section_id' => $_POST['section_id'],
                );
                $data['report_for'] = 'student';
            }
            // echo "<pre>";print_r($search_filter);echo "</pre>";exit;
            $data['idcard_reports'] = $this->mdl_reports->get_idcard_reports($search_filter);
            $data['class_sections'] = $this->mdl_sections->get_class_sections($_POST['class_id']);
            $this->session->set_flashdata($search_filter);
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }

        $this->load->view('view_idcard_report', $data);
    }
    public function salaryreport(){
        $data = [];
        $this->load->model('teachers/mdl_teachers');
        $this->load->model('students/mdl_students');
        $search_filter = array('salary_for','salary_for_dynamic_id','payment_month','from_date','to_date','salary_for_dynamic_text');
        $this->session->unset_userdata($search_filter);
        if(!empty($_POST['get_report'])){
            // echo "<pre>";print_r($_POST);echo "</pre>";
            $salary_for = $_POST['salary_for'];
            // echo $salary_for;
            switch ($salary_for){
                case '2': 
                    $salary_for_text = 'Teacher';
                    break;
                case '5': 
                    $salary_for_text = 'Receptionist';
                    break;
                case '6': 
                    $salary_for_text = 'Librarian';
                    break;
                case '7': 
                    $salary_for_text = 'Accountant';
                    break;
                default: 
                    $salary_for_text = '';
            }
            // echo 'iii'.$salary_for_text;exit;
            $search_filter = array(
                'salary_for' => $_POST['salary_for'],
                'salary_for_dynamic_id' => $_POST['salary_for_dynamic_id'],
                'payment_month' => $_POST['payment_month'],
                'from_date' => $_POST['from_date'],
                'to_date' => $_POST['to_date'],
                'salary_for_text' => $salary_for_text
            );
            $role_id = !empty($_POST['salary_for']) ? $_POST['salary_for'] : '';
            $data['user_info'] = $this->mdl_reports->get_user($role_id);
            
            // echo "<pre>";print_r($user_info);echo "</pre>";exit;
            $data['salary_reports'] = $this->mdl_reports->get_salary_reports($search_filter);
            // $data['class_sections'] = $this->mdl_sections->get_class_sections($_POST['class_id']);
            $this->session->set_flashdata($search_filter);
            // echo "<pre>";print_r($this->session->userdata);echo "</pre>";exit;
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }

        $this->load->view('view_salary_report', $data);
    }
    public function ajax_get_user(){
        $role_id = !empty($_POST['role_id']) ? $_POST['role_id'] : '';
        $user_info = $this->mdl_reports->get_user($role_id);
        // echo "<pre>";print_r($user_info);echo "</pre>";exit;
        echo "<option>Please Select</option>";
        foreach ($user_info as $key => $val) {
           echo "<option value='".$val->id."'>".$val->preferred_name."</option>";
        }
    }
    public function progresscard_report(){
        $class_id = '';
        $data = [];
        $data['all_classes'] = $this->mdl_class->get_all_classes();
        $search_filter = array('class_id','section_id','student_id');
        $this->session->unset_userdata($search_filter);
        if(!empty($_POST['get_report'])){
            // echo "<pre>";print_r($_POST);echo "</pre>";
            $student_id = $_POST['student_id'];
            $filter_arr = array(
                'student_id' => $_POST['student_id'],
                'class_id' => $_POST['class_id'],
                'section_id' => $_POST['section_id']
            );
            // echo "<pre>";print_r($filter_arr);echo "</pre>";exit;
            $data['class_subjects'] = $this->mdl_subject->get_class_subjects($_POST['class_id']);
            $data['class_sections'] = $this->mdl_sections->get_class_sections($_POST['class_id']);
            $data['student_exams'] = $this->mdl_marks->get_student_exams($student_id);
            $student_marks = array();
            if(count($data['student_exams'])>0){
                foreach ($data['student_exams'] as $key => $value) {
                    $filter_arr['exam_id'] = $value->exam_id;
                    $student_marks[$value->exam_id] = $this->mdl_marks->get_student_marks($filter_arr);
                }
            }
            // get Grades
            if(count($student_marks)>0){
                foreach ($student_marks as $outer_arrk => $outer_arrv) {
                    foreach ($outer_arrv as $key => $value) {
                        $subject_grades[$value->id] = $this->mdl_marks->get_student_subject_grades($value->marks);
                    }
                }
            }
            // $data['progresscard_reports'] = $this->mdl_reports->get_progresscard_reports($filter_arr);
            $data['student_marks'] = $student_marks;
            $data['subject_grades'] = $subject_grades;
            $this->session->set_flashdata($filter_arr);
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }

        $this->load->view('view_progresscard_report', $data);
    }

    public function ajax_get_students_class_sectionwise(){
        $data['class_id'] = !empty($_POST['class_id'])?$_POST['class_id']:'';
        $data['section_id'] = !empty($_POST['section_id'])?$_POST['section_id']:'';
        $student_info = $this->mdl_students->get_students_class_sectionwise($data);
        // echo "<pre>";print_r($student_info);echo "</pre>";exit;
        echo "<option>Please Select</option>";
        foreach ($student_info as $key => $val) {
           echo "<option value='".$val->id."'>".$val->preferred_name."</option>";
        }
    }

}
