<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_permission');
        $this->load->model('teachers/mdl_teachers');
    }
	public function index(){
        $data = [];
        $data['all_roles'] = $this->mdl_permission->get_all_roles();
        $this->session->unset_userdata('role_id');
        if(!empty($_POST['role_id'])){
            $role_id = $_POST['role_id'];
            // echo $role_id;exit;
            $data['role_permissions'] = $this->mdl_permission->get_module_permissions_rolewise($role_id);
            $this->session->set_flashdata('role_id',$role_id);
            // echo "<pre>";print_r($data);echo "</pre>";exit;
        }
        
        // echo "<pre>";print_r($data);echo "</pre>";exit;
		$this->load->view('create', $data);
	}
    public function save_permissions(){
        $data = array();
        if(isset($_POST['save_permissions'])){
            // echo "<pre>";print_r($_POST);echo "</pre>";exit;
            $permissions_arr = array();
            if(!empty($_POST) && count($_POST)>0){
                /*foreach($_POST as $key=>$val){
                    if($key != 'save_permissions'){
                        $temp_perm1 = explode('_',$key);
                        // print_r($temp_perm1);
                        $temp_perm2 = 'p_'.$temp_perm1[1];

                        $permissions_arr[$val] = $temp_perm2;
                    }
                }
                echo "final permissions array : ";
                echo "<pre>";print_r($permissions_arr);echo "</pre>";exit;
                $insert_status = $this->mdl_permission->save_role_permissions($permissions_arr);*/
                $insert_status = $this->mdl_permission->save_role_permissions($_POST);
                if($insert_status){
                    $message = array('message' => 'Role Permissions has been updated successfully','class' => 'alert alert-success fade in');
                }else{
                    $message = array('message' => 'Something went wrong, please try again later','class' => 'alert alert-danger fade in');
                }
                $this->session->set_flashdata('item', $message);
                redirect('permission');
            } 
        }
    }
    
}
