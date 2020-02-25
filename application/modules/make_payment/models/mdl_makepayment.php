<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_makepayment extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'payment_history';
		return $table;
	}

	function get_users_rolewise($role_id = ''){
		if($role_id!=''){
			$sql = "SELECT id, preferred_name, email, joining_date			
			FROM users
			WHERE role_id = $role_id AND is_deleted = '0'";
			// echo $sql;exit;
			$query = $this->db->query($sql);
			return $query->result();
		}
	}

	function get_user_payment_history(){
		$table = $this->get_table();
		$query = $this->db->get($table);
		return $query->result();
	}
	
	function get_user_data($user_id){
		// $table = $this->get_table();
		$sql = "SELECT t.id as user_id,t.preferred_name as user_name,t.gender,t.date_of_birth,t.photo,t.phone,t.designation,t.joining_date, (CASE WHEN (t.role_id='5') THEN 'Receptionist' WHEN (t.role_id='6') THEN 'Librarian' WHEN (t.role_id='7') THEN 'Accountant' END) AS user_role
		FROM users t
		WHERE t.id=$user_id AND t.is_deleted = 0";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->row();
	}

	function add_payment($data){
		$table = $this->get_table();
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function get_user_salary_data($user_id){
		$sql = "SELECT ms.teacher_id, ms.s_template_id, st.gross_salary, st.total_deductions,
		st.net_salary FROM manage_salary ms
		LEFT JOIN salary_template st ON st.id=ms.s_template_id
		WHERE ms.teacher_id=$user_id AND ms.is_deleted='0' AND st.is_deleted='0'";
		$query = $this->db->query($sql);
		return $query->row();
	}

	function verify_monthly_payment_for_user($filter_arr){
		$user_id = $filter_arr['user_id'];
		$payment_month = $filter_arr['payment_month'];
		$sql = "SELECT id from payment_history WHERE user_id=$user_id AND payment_month_year='$payment_month' AND is_deleted='0'";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	
}

?>