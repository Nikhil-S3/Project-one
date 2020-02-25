<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uattendance extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_uattendance');
        $this->load->model('users/mdl_users');
    }
	public function index(){
        $data = [];
        $data['all_users'] = $this->mdl_users->get_all_users();
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
    public function add(){
		$data = array();
        $this->session->unset_userdata('attendance_date');
        if(isset($_POST['attendance_submit']) && $_POST['attendance_submit']=='Attendance'){
            // $filter_arr = array();
            $data['attendance_date'] = !empty($_POST['attendance_date'])?$_POST['attendance_date']:'';
            $data['user_attendance_info'] = $this->mdl_users->get_all_users();
            $flashdata = array(
                'attendance_date' => $data['attendance_date'],
            );
            $this->session->set_flashdata($flashdata);
            
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }
        $this->load->view('create', $data);
	}
	public function ajax_save_attendance(){
		/*echo "<pre>";print_r($_POST);
		echo "</pre>";
		exit;*/

    	$data = array();
        $attendance_date = !empty($this->input->post('a_date')) ? $this->input->post('a_date') : '';
        // convert date_format from d/m/Y to d-m-Y becoz PHP doesn't work well with dd/mm/yyyy format
        $converted_date = str_replace('/', '-', $attendance_date);
        $data['a_date'] = date('Y-m-d', strtotime($converted_date));
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $user_arr = array();
        $attendance_arr = array();
        if(!empty($_POST['attendance']) && count($_POST['attendance'])>0){
            foreach($_POST['attendance'] as $a_key=>$a_val){
                $user_arr[] = str_replace('attendance', '', $a_key);
                $attendance_arr[] = $a_val;
            }
            // echo "User array : ";
            // echo "<pre>";print_r($user_arr)."\n";
            // echo "Attendance array : ";
            // echo "<pre>";print_r($attendance_arr);echo "</pre>";exit;
        } 
        if(count($user_arr)>0 && count($attendance_arr)>0){
            $data['attendance'] = array_combine($user_arr,$attendance_arr);
        }
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $insert_status = $this->mdl_uattendance->save_attendance($data);
        if($insert_status){
        	$response = array(
                'status'=>'1',
                'message' => 'User attendance has been taken successfully',
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
        $user_id = $this->uri->segment(3);
        // echo $user_id;exit;
        $filter_arr = array(
            'user_id' => $user_id,
        );
        $data['user_data'] = $this->mdl_uattendance->get_user_data($user_id);

        $data['total_stats'] = $this->mdl_uattendance->get_user_attendance_stats_data($filter_arr);
        /*echo "<pre>";
        print_r($data['total_stats']);
        echo "</pre>";exit;*/

        $monthwise_attendance = $this->mdl_uattendance->get_user_attendance($filter_arr);
        /*echo "<pre>";
        print_r($monthwise_attendance);
        echo "</pre>";exit;*/

        $data['user_attendance'] = $monthwise_attendance;
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
        $this->load->view('view_user_attendance', $data);
    }
}
