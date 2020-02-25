<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_template extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_salary_template');
	}
	public function index(){

        $class_id = '';
        $data = [];
        $data['all_salary_templates'] = $this->mdl_salary_template->get_all_salary_templates();
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('list', $data);
	}
    public function add(){
        $data = array();
        // echo "<pre>";print_r($_POST);echo "</pre>";exit;
        if(isset($_POST['add_salary_template'])){
            // echo "<pre>";print_r($_POST);echo "</pre>";
            $data['salary_grades'] = !empty($_POST['salary_grades'])?$_POST['salary_grades']:'';
            $data['basic_salary'] = !empty($_POST['basic_salary'])?$_POST['basic_salary']:'';
            $data['overtime_rate'] = !empty($_POST['overtime_rate'])?$_POST['overtime_rate']:'';
            $data['gross_salary'] = !empty($_POST['gross_salary'])?$_POST['gross_salary']:'';
            $data['total_deductions'] = !empty($_POST['total_deductions'])?$_POST['total_deductions']:'';
            $data['net_salary'] = !empty($_POST['net_salary'])?$_POST['net_salary']:'';
            if(count($_POST['allowances_label'])>0){
                if(count($_POST['allowances_amount'])>0){
                    $allowances_arr = array();
                    for ($i=0; $i < count($_POST['allowances_label']); $i++) { 
                        $allowances_arr[$i]['label_name'] = $_POST['allowances_label'][$i];
                        $allowances_arr[$i]['amount'] = $_POST['allowances_amount'][$i];
                    }
                    $data['allowances_arr'] = $allowances_arr;
                }    
                // echo "<pre>";print_r($allowances_arr);echo "</pre>";
            }
            
            if(count($_POST['deductions_label'])>0){
                if(count($_POST['deductions_amount'])>0){
                    $deductions_arr = array();
                    for ($i=0; $i < count($_POST['deductions_label']); $i++) { 
                        $deductions_arr[$i]['label_name'] = $_POST['deductions_label'][$i];
                        $deductions_arr[$i]['amount'] = $_POST['deductions_amount'][$i];
                    }
                    $data['deductions_arr'] = $deductions_arr;
                }
                // echo "<pre>";print_r($deductions_arr);echo "</pre>";exit;
            }
            
            $insert_status = $this->mdl_salary_template->save_salary_template($data);
            if($insert_status){
                $message = array('message' => 'Salary template has been added successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            redirect('Salary_template');
        }

        $this->load->view('create');
    }
    public function view(){
        $id = $this->uri->segment(3);
        // echo $id;exit;
        $data['salary_template_info'] = $this->mdl_salary_template->get_salary_template($id);
        $data['salary_template_allowances'] = $this->mdl_salary_template->get_salary_template_allowances($id);
        $data['salary_template_deductions'] = $this->mdl_salary_template->get_salary_template_deductions($id);
        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('view', $data);
    }

    public function edit(){
        // echo "<pre>";print_r($_POST);echo "</pre>";exit;
        $id = $this->uri->segment(3);
        $data = array();
        $data['salary_template_info'] = $this->mdl_salary_template->get_salary_template($id);
        $data['salary_template_allowances'] = $this->mdl_salary_template->get_salary_template_allowances($id);
        $data['salary_template_deductions'] = $this->mdl_salary_template->get_salary_template_deductions($id);
        

        $this->load->view('edit', $data);
    }

    public function update(){
        if(isset($_POST['update_salary_template'])){
            // echo "<pre>";print_r($_POST);echo "</pre>";
            $data['id'] = !empty($_POST['salary_template_id'])?$_POST['salary_template_id']:'';
            $data['salary_grades'] = !empty($_POST['salary_grades'])?$_POST['salary_grades']:'';
            $data['basic_salary'] = !empty($_POST['basic_salary'])?$_POST['basic_salary']:'';
            $data['overtime_rate'] = !empty($_POST['overtime_rate'])?$_POST['overtime_rate']:'';
            $data['gross_salary'] = !empty($_POST['gross_salary'])?$_POST['gross_salary']:'';
            $data['total_deductions'] = !empty($_POST['total_deductions'])?$_POST['total_deductions']:'';
            $data['net_salary'] = !empty($_POST['net_salary'])?$_POST['net_salary']:'';
            if(count($_POST['allowances_label'])>0){
                if(count($_POST['allowances_amount'])>0){
                    $allowances_arr = array();
                    for ($i=0; $i < count($_POST['allowances_label']); $i++) { 
                        $allowances_arr[$i]['id'] = !empty($_POST['allowance_id'][$i])?$_POST['allowance_id'][$i]:'';
                        $allowances_arr[$i]['label_name'] = $_POST['allowances_label'][$i];
                        $allowances_arr[$i]['amount'] = $_POST['allowances_amount'][$i];
                    }
                    $data['allowances_arr'] = $allowances_arr;
                }    
                // echo "<pre>";print_r($allowances_arr);echo "</pre>";
            }
            
            if(count($_POST['deductions_label'])>0){
                if(count($_POST['deductions_amount'])>0){
                    $deductions_arr = array();
                    for ($i=0; $i < count($_POST['deductions_label']); $i++) { 
                        $deductions_arr[$i]['id'] = !empty($_POST['deduction_id'][$i])?$_POST['deduction_id'][$i]:'';
                        $deductions_arr[$i]['label_name'] = $_POST['deductions_label'][$i];
                        $deductions_arr[$i]['amount'] = $_POST['deductions_amount'][$i];
                    }
                    $data['deductions_arr'] = $deductions_arr;
                }
                // echo "<pre>";print_r($deductions_arr);echo "</pre>";
            }
            
            $insert_status = $this->mdl_salary_template->update_salary_template($data);
            if($insert_status){
                $message = array('message' => 'Salary template has been updated successfully','class' => 'alert alert-success fade in');
            }else{
                $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
            }
            $this->session->set_flashdata('item', $message);
            redirect('Salary_template');
        }
    }
    
}
