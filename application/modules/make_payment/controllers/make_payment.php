<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Make_payment extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_makepayment');
        $this->load->model('users/mdl_users');
    }
	public function index(){
        $data = [];
        $data['all_users'] = '';
        $this->session->unset_userdata('user_role');
        if(!empty($_POST['user_role'])){
            $user_role = $_POST['user_role'];
            // echo $user_role;exit;
            $data['all_users'] = $this->mdl_makepayment->get_users_rolewise($user_role);
            $this->session->set_flashdata('user_role',$user_role);
        }
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
    public function add(){
		$data = array();
        $id = $this->uri->segment(3);
        
        if(isset($_POST['add_payment']) && $_POST['add_payment']=='Add Payment'){
            // $filter_arr = array();
            $data['user_id'] = !empty($this->input->post('user_id')) ? $this->input->post('user_id') : '';
            $data['net_salary'] = !empty($this->input->post('net_salary')) ? $this->input->post('net_salary') : '';
            $payment_month_year = !empty($this->input->post('payment_month')) ? '01-'.$this->input->post('payment_month') : '';
            $data['payment_month_year'] = date('Y-m-d', strtotime($payment_month_year));
            $data['payment_amount'] = !empty($this->input->post('payment_amount')) ? $this->input->post('payment_amount') : '';
            $data['payment_method'] = !empty($this->input->post('payment_method')) ? $this->input->post('payment_method') : '';
            $data['comments'] = !empty($this->input->post('comments')) ? $this->input->post('comments') : '';
            $data['created_by'] = $_SESSION['logged_in']['user_id'];
            $data['created_at'] = date('Y-m-d H:i:s');
            // echo "<pre>";print_r($data);echo "</pre>";exit;
            $insert_status = $this->mdl_makepayment->add_payment($data);
            if($insert_status){
                $message = array('message' => 'Payment has been added successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            // redirect('make_payment/add');
        }
        $data['payment_history'] = $this->mdl_makepayment->get_user_payment_history($id);
        $data['user_data'] = $this->mdl_makepayment->get_user_data($id);
        $data['salary_info'] = $this->mdl_makepayment->get_user_salary_data($id);
        $data['user_id'] = $id;
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('view_payment_history', $data);
	}
	
    function ajax_check_payment_done_for_user(){
        $data = array();
        $user_id = !empty($this->input->post('user_id')) ? $this->input->post('user_id') : '';
        $payment_month_year = !empty($this->input->post('payment_month_year')) ? '01-'.$this->input->post('payment_month_year') : '';
        $payment_month_year = date('Y-m-d', strtotime($payment_month_year));
        $filter_arr = array(
            'user_id' => $user_id,
            'payment_month' => $payment_month_year
        );
        $payment_exists = $this->mdl_makepayment->verify_monthly_payment_for_user($filter_arr);
        // echo $payment_exists;exit;
        if($payment_exists>0){
            $result_arr = array('status'=>1);
            echo json_encode($result_arr);
        }else{
            $result_arr = array('status'=>0);
            echo json_encode($result_arr);
        }
    }
    
	function view(){
        $user_id = $this->uri->segment(3);
        // echo $user_id;exit;
        $filter_arr = array(
            'user_id' => $user_id,
        );
        $data['user_data'] = $this->mdl_makepayment->get_user_data($user_id);

        $data['total_stats'] = $this->mdl_makepayment->get_user_attendance_stats_data($filter_arr);
        /*echo "<pre>";
        print_r($data['total_stats']);
        echo "</pre>";exit;*/

        $monthwise_attendance = $this->mdl_makepayment->get_user_attendance($filter_arr);
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
