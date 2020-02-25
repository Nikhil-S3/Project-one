<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_teacher');
        $this->load->model('tattendance/mdl_tattendance');
        $this->load->model('manage_salary/mdl_manage_salary');
        $this->load->model('make_payment/mdl_makepayment');
    }
	public function index(){
		// echo "<h1>Hello, Ready to go. This is Students Module.</h1>";
        // $this->load->library('encryption');
        $teacher_id = $_SESSION['logged_in']['user_id'];
		$data['teacher_info'] = $this->mdl_teacher->get_teacher_data($teacher_id);

        // Teacher Attendance Info
        $filter_arr = array(
            'teacher_id' => $teacher_id,
        );
        $data['attendance_teacher_data'] = $this->mdl_tattendance->get_attendance_teacher_data($teacher_id);

        $data['total_stats'] = $this->mdl_tattendance->get_teacher_attendance_stats_data($filter_arr);
        /*echo "<pre>";
        print_r($data['total_stats']);
        echo "</pre>";exit;*/

        $monthwise_attendance = $this->mdl_tattendance->get_teacher_attendance($filter_arr);
        /*echo "<pre>";
        print_r($monthwise_attendance);
        echo "</pre>";exit;*/

        $data['teacher_attendance'] = $monthwise_attendance;
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

        // Teacher Salary Info
        $data['teacher_salary_info'] =  $this->mdl_manage_salary->get_teacher_salary_details($teacher_id);
        // Payment history
        $data['payment_history'] = $this->mdl_makepayment->get_user_payment_history($teacher_id);

		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('view_teacher_info', $data);
	}
}
