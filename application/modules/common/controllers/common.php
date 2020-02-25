<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mdl_common');
	}
	public function index(){
		$this->load->view('list', $data);
	}
	public function menu(){
		$this->load->view('menu');
	}
	public function ajax_check_username_exists(){
        if(!empty($_POST['val'])){
            $filter_arr = array(
            	'user_name' => $_POST['val'], 
            	'user_type' => $_POST['user_type'], 
            );
            $result = $this->mdl_common->check_username_exists($filter_arr);
            // echo "<pre>";print_r($result);echo "</pre>";exit;
            if($result>0){
                $result_arr = array('status'=>1);
                echo json_encode($result_arr);
            }else{
                $result_arr = array('status'=>0);
                echo json_encode($result_arr);
            }
        }
    }
    public function ajax_check_email_exists(){
        if(!empty($_POST['val'])){
            $user_type = !empty($_POST['user_type'])?$_POST['user_type']:'';
            $filter_arr = array(
            	'user_email' => $_POST['val'], 
            	'user_type' => $user_type, 
            );
            $result = $this->mdl_common->check_email_exists($filter_arr);
            // echo "<pre>";print_r($result);echo "</pre>";exit;
            if($result>0){
                $result_arr = array('status'=>1);
                echo json_encode($result_arr);
            }else{
                $result_arr = array('status'=>0);
                echo json_encode($result_arr);
            }
        }
    }
    public function ajax_get_users_rolewise(){
        if(!empty($_POST['user_type'])){
            $filter_arr = array(
                'role_id' => $_POST['user_type'], 
            );
            $result = $this->mdl_common->get_users_rolewise($filter_arr);
            // echo "<pre>";print_r($result);echo "</pre>";exit;
            $html = "<option value=''>Select Username</option>";
            if(count($result)>0){
                // $result_arr = array('status'=>1);
                foreach ($result as $key => $value) {
                    $id = $value->id;
                    $username = $value->username;
                    $html .= "<option value='$id'>$username</option>";
                }
            }
            echo $html;
        }
    
    }
    public function my_simple_crypt($string, $action = 'e' ) {
        // you may change these values to your own
        $secret_key = 'Ghmy-F4rt-Ksrt-5896';
        $secret_iv = 'Dev2020-Services22-hyd2020';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

        if( $action == 'e' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'd' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }

        return $output;
    }
    public function access_denied(){
        $this->load->view('401_access_denied');
    }
    
}
