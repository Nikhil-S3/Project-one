<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exams extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_exams');
	}
	public function index(){
        $data = [];
        $data['all_exams'] = $this->mdl_exams->get_all_exams();
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
    public function add(){
		$data = array();
        if(isset($_POST['submit']) && $_POST['submit']=='Submit'){
            // $filter_arr = array();
            $data['exam_name'] = !empty($_POST['exam_name'])?$_POST['exam_name']:'';
            $data['exam_date'] = '';
            if(!empty($this->input->post('exam_date'))){
                $exam_date = $this->input->post('exam_date');
                $converted_date = str_replace('/', '-', $exam_date);
                $data['exam_date'] = date('Y-m-d', strtotime($converted_date));
            }
            $data['notes'] = !empty($_POST['notes'])?$_POST['notes']:'';
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $_SESSION['logged_in']['user_id'];
            // echo "<pre>";print_r($data);echo "</pre>";exit;
            $insert_status = $this->mdl_exams->insert_exam($data);
            if($insert_status){
                $message = array('message' => 'Exam has been added successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            redirect('exams');
        }
        $this->load->view('create', $data);
	}
	
    public function edit(){
        $id = $this->uri->segment(3);
        // echo $id;exit;
        $data['exam_info'] = $this->mdl_exams->get_exam($id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('edit', $data);
    }

    public function update(){
        /*echo "<pre>";print_r($_POST);
        echo "</pre>";
        exit;*/

        $this->form_validation->set_rules('exam_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('exam_date', 'Date', 'trim|required');
        
        if ($this->form_validation->run() == FALSE){
                $this->load->view('edit');
        }else{
            $data = array();
            $data['id'] = $this->input->post('exam_id');
            $data['exam_name'] = !empty($_POST['exam_name'])?$_POST['exam_name']:'';
            $data['exam_date'] = '';
            if(!empty($this->input->post('exam_date'))){
                $exam_date = $this->input->post('exam_date');
                $converted_date = str_replace('/', '-', $exam_date);
                $data['exam_date'] = date('Y-m-d', strtotime($converted_date));
            }
            $data['notes'] = !empty($_POST['notes'])?$_POST['notes']:'';
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $_SESSION['logged_in']['user_id'];
            // echo "<pre>";print_r($data);echo "</pre>";exit;
            $update_status = $this->mdl_exams->update_exam($data);
            if($update_status){
                $message = array('message' => 'Exam has been updated successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            redirect('exams');
        }
    }
    function delete(){
        $id = $this->uri->segment(3);
        // echo $id;exit;
        $delete_status = $this->mdl_exams->delete_exam($id);
        if($delete_status){
            $message = array('message' => 'Exam has been archived successfully','class' => 'alert alert-success fade in');
        }else{
            $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
        $this->session->set_flashdata('item', $message);
        redirect('exams');
    }
}
