<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_grade');
	}
	public function index(){
        $data = [];
        $data['all_grades'] = $this->mdl_grade->get_all_grades();
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
    public function add(){
        // echo "<pre>";print_r($_POST);echo "</pre>";exit;
		$data = array();
        if(isset($_POST['submit']) && $_POST['submit']=='Submit'){
            $data['grade_name'] = !empty($_POST['grade_name'])?$_POST['grade_name']:'';
            $data['grade_point'] = !empty($_POST['grade_point'])?$_POST['grade_point']:'';
            $data['mark_from'] = !empty($_POST['mark_from'])?$_POST['mark_from']:'';
            $data['mark_upto'] = !empty($_POST['mark_upto'])?$_POST['mark_upto']:'';
            $data['notes'] = !empty($_POST['notes'])?$_POST['notes']:'';
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $_SESSION['logged_in']['user_id'];
            // echo "<pre>";print_r($data);echo "</pre>";exit;
            $insert_status = $this->mdl_grade->insert_grade($data);
            if($insert_status){
                $message = array('message' => 'Grade has been added successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            redirect('grade');
        }
	}
	
    public function edit(){
        $id = $this->uri->segment(3);
        // echo $id;exit;
        $data = array();
        $data['grade_info'] = $this->mdl_grade->get_grade($id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('edit', $data);
    }

    public function update(){
        /*echo "<pre>";print_r($_POST);
        echo "</pre>";
        exit;*/
        if(isset($_POST['submit']) && $_POST['submit']=='Update'){
            $data['id'] = $this->input->post('grade_id');
            $data['grade_name'] = !empty($this->input->post('grade_name')) ? $this->input->post('grade_name') : '';
            $data['grade_point'] = !empty($this->input->post('grade_point')) ? $this->input->post('grade_point') : '';
            $data['mark_from'] = !empty($this->input->post('mark_from')) ? $this->input->post('mark_from') : '';
            $data['mark_upto'] = !empty($this->input->post('mark_upto')) ? $this->input->post('mark_upto') : '';
            $data['notes'] = !empty($this->input->post('notes')) ? $this->input->post('notes') : '';
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $_SESSION['logged_in']['user_id'];
            $update_status = $this->mdl_grade->update_grade($data);
            if($update_status){
                $message = array('message' => 'Grade has been updated successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            // $this->edit();
            redirect('grade');
        }        
    }
    function delete(){
        $id = $this->uri->segment(3);
        // echo $id;exit;
        $delete_status = $this->mdl_grade->delete_grade($id);
        if($delete_status){
            $message = array('message' => 'Grade has been archived successfully','class' => 'alert alert-success fade in');
        }else{
            $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
        }
        $this->session->set_flashdata('item', $message);
        redirect('grade');
    }
}
