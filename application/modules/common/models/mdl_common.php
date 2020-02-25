<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_common extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	function get_table(){
		$table = 'users';
		return $table;
	}
	
	function check_username_exists($filter_arr){
		$table = $this->get_table();
		switch($filter_arr['user_type']){
			case 'student':
				$role_id = 4;
				break;
			case 'teacher':
				$role_id = 2;
				break;
			case 'parent':
				$role_id = 3;
				break;
			default:
				break;
		}
		$where_cond = array('username = '=> $filter_arr['user_name'], 'role_id = '=> $role_id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	function check_email_exists($filter_arr){
		$table = $this->get_table();
		$where_cond = array('email'=> $filter_arr['user_email'], 'is_deleted' => 0);
		switch($filter_arr['user_type']){
			case 'system_admin':
				$where_cond['role_id'] = 1;
				break;
			case 'student':
				$where_cond['role_id'] = 4;
				break;
			case 'teacher':
				$where_cond['role_id'] = 2;
				break;
			case 'parent':
				$where_cond['role_id'] = 3;
				break;
			default:
				break;
		}
		// echo "<pre>";print_r($where_cond);echo "</pre>";exit;
		// $where_cond = array('email = '=> $filter_arr['user_email'], 'role_id = '=> $role_id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	function get_users_rolewise($data){
		$role_id = $data['role_id'];
		$sql = "SELECT id, preferred_name, username FROM users WHERE role_id='$role_id' AND is_deleted='0'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
}

?>