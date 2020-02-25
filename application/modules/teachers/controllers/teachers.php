<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_teachers');
        $this->load->model('tattendance/mdl_tattendance');
        $this->load->model('manage_salary/mdl_manage_salary');
        $this->load->model('make_payment/mdl_makepayment');
	}
	public function index(){
		// echo "<h1>Hello, Ready to go. This is Students Module.</h1>";
        // $this->load->library('encryption');
		$data['all_teachers'] = $this->mdl_teachers->get_all_teachers();
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
	public function add(){
		// echo "<h1>Hello, Ready to go. This is Teachers Module.</h1>";
		$this->load->view('create');
	}
    public function view(){
        // $this->load->library('encryption');
        // $teacher_id = $_SESSION['logged_in']['user_id'];
        // $teacher_id = @$this->uri->segment(3);
        $encrypt_id = @$this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
        if($encrypt_id=='')
            $decrypt_id = $_SESSION['logged_in']['user_id'];

        $data['teacher_info'] = $this->mdl_teachers->get_teacher_data($decrypt_id);

        // Teacher Attendance Info
        $filter_arr = array(
            'teacher_id' => $decrypt_id,
        );
        $data['attendance_teacher_data'] = $this->mdl_tattendance->get_attendance_teacher_data($decrypt_id);

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
        $data['teacher_salary_info'] =  $this->mdl_manage_salary->get_teacher_salary_details($decrypt_id);
        // Payment history
        $data['payment_history'] = $this->mdl_makepayment->get_user_payment_history($decrypt_id);

        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('view_teacher_info', $data);
    }
	public function save(){
		/*echo "<pre>";print_r($_POST);
		echo "</pre>";
		exit;*/

		$this->form_validation->set_rules('preferred_name', 'Name', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('designation', 'Designation', 'trim|trim|required');
		$this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

		if ($this->form_validation->run() == FALSE){
                $this->load->view('list');
        }else{
        	$data = array();
            $data['preferred_name'] = !empty($this->input->post('preferred_name')) ? $this->input->post('preferred_name') : '';
        	$data['designation'] = !empty($this->input->post('designation')) ? $this->input->post('designation') : '';
        	$data['date_of_birth'] = !empty($this->input->post('date_of_birth')) ? date('Y-m-d', strtotime($this->input->post('date_of_birth'))) : '';
        	$data['gender'] = !empty($this->input->post('gender')) ? $this->input->post('gender') : '';
        	$data['religion'] = !empty($this->input->post('religion')) ? $this->input->post('religion') : '';
        	$data['email'] = !empty($this->input->post('email')) ? $this->input->post('email') : '';
        	$data['phone'] = !empty($this->input->post('phone')) ? $this->input->post('phone') : '';
        	$data['address'] = !empty($this->input->post('address')) ? $this->input->post('address') : '';
            $data['joining_date'] = !empty($this->input->post('joining_date')) ? date('Y-m-d', strtotime($this->input->post('joining_date'))) : '';
        	$data['username'] = !empty($this->input->post('username')) ? $this->input->post('username') : '';
        	$data['password'] = !empty($this->input->post('password')) ? md5($this->input->post('password')) : '';

        	// file upload
        	$image_name = '';
        	if($_FILES['photo']['name'] != ''){
        		$config['upload_path'] = './assets/images/uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
		        $config['max_size'] = 2000;
		        $config['max_width'] = 1500;
		        $config['max_height'] = 1500;
		        $new_name = date('dmY').'-'.time().'-'.$_FILES["photo"]['name'];
				$config['file_name'] = $new_name;

		        $this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('photo'))
                {
                    // $error = array('error' => $this->upload->display_errors());
                    $message = array('message' => $this->upload->display_errors(),'class' => 'alert alert-danger fade in');
                    $this->session->set_flashdata('item', $message);
	            	redirect('teachers/add');
                }
                else
                {
                    // $data['photo'] = !empty($_FILES['photo']['name']) ? $new_name : '';
                    $upload_data=$this->upload->data();
            		$image_name=$upload_data['file_name'];
                }
                
        	}
            
            $data['photo'] = $image_name;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['role_id'] = 2;
            $data['created_by'] = $_SESSION['logged_in']['user_id'];
            // echo "<pre>";print_r($data);echo "</pre>";exit;
            $insert_status = $this->mdl_teachers->insert_teacher($data);
            if($insert_status){
            	$message = array('message' => 'Teacher has been added successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('teachers');
        }
	}
    public function edit(){
        // $id = $this->uri->segment(3);
        $data['encrypt_id'] = $encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
        // echo $id;exit;
        $data['student_info'] = $this->mdl_teachers->get_student($decrypt_id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('edit', $data);
    }
	public function update(){
		/*echo "<pre>";print_r($_POST);
        print_r($_FILES);
		echo "</pre>";
		exit;*/

		$this->form_validation->set_rules('preferred_name', 'Name', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|trim|required');
        $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		
		if ($this->form_validation->run() == FALSE){
            $this->load->view('list');
        }else{
        	$data = array();
        	// $data['id'] = $this->input->post('id');
            $encrypt_id = $this->input->post('id');
            $data['id'] = $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
            $date_of_birth = $this->input->post('date_of_birth');
        	$data['preferred_name'] = !empty($this->input->post('preferred_name')) ? $this->input->post('preferred_name') : '';
            $data['designation'] = !empty($this->input->post('designation')) ? $this->input->post('designation') : '';
            $data['date_of_birth'] = !empty($this->input->post('date_of_birth')) ? date('Y-m-d', strtotime($date_of_birth)) : '';
            $data['gender'] = !empty($this->input->post('gender')) ? $this->input->post('gender') : '';
            $data['religion'] = !empty($this->input->post('religion')) ? $this->input->post('religion') : '';
            $data['email'] = !empty($this->input->post('email')) ? $this->input->post('email') : '';
            $data['phone'] = !empty($this->input->post('phone')) ? $this->input->post('phone') : '';
            $data['address'] = !empty($this->input->post('address')) ? $this->input->post('address') : '';
            $data['joining_date'] = !empty($this->input->post('joining_date')) ? date('Y-m-d', strtotime($this->input->post('joining_date'))) : '';
            $data['username'] = !empty($this->input->post('username')) ? $this->input->post('username') : '';
        	// $data['password'] = !empty($this->input->post('password')) ? $this->input->post('password') : '';
            
        	// file upload
        	if($_FILES['new_photo']['name'] != ''){
        		$config['upload_path'] = './assets/images/uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
		        $config['max_size'] = 2000;
		        $config['max_width'] = 1500;
		        $config['max_height'] = 1500;
		        $new_name = date('dmY').'-'.time().'-'.$_FILES["new_photo"]['name'];
				$config['file_name'] = $new_name;

		        $this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('new_photo'))
                {
                    // $error = array('error' => $this->upload->display_errors());
                    $message = array('message' => $this->upload->display_errors(),'class' => 'alert alert-danger fade in');
                    $this->session->set_flashdata('item', $message);
	            	redirect('teachers/add');
                }
                else
                {
                    // $image_name=!empty($_FILES['new_photo']['name']) ? $new_name : '';
                	$upload_data=$this->upload->data();
            		$image_name=$upload_data['file_name'];
                }
            }else{
                $image_name=$this->input->post('old_photo');
            }

            $data['photo'] = !empty($image_name) ? $image_name : '';
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $_SESSION['logged_in']['user_id'];
            // echo "<pre>";
            // print_r($data);exit;

            $update_status = $this->mdl_teachers->update_teacher($data);
            if($update_status){
            	$message = array('message' => 'Teacher has been updated successfully','class' => 'alert alert-success fade in');
            }else{
            	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
			$this->session->set_flashdata('item', $message);
            redirect('teachers');
        }
	}
	function delete(){
		// $id = $this->uri->segment(3);
        $encrypt_id = $this->uri->segment(3);
        $decrypt_id = modules::load('common/common/')->my_simple_crypt($encrypt_id, 'd');
		// echo $id;exit;
		$delete_status = $this->mdl_teachers->delete_teacher($decrypt_id);
        if($delete_status){
        	$message = array('message' => 'Teacher has been archived successfully','class' => 'alert alert-success fade in');
        }else{
        	$message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
		$this->session->set_flashdata('item', $message);
        redirect('teachers');
	}
}
