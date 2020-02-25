<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_uattendance extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'user_attendance';
		return $table;
	}
	
	function save_attendance($data){
		$table = $this->get_table();
		$attendance_arr = [];
		$attendance_arr['attendance_date'] = $data['a_date'];
		$attendance_arr['created_at'] = date('Y-m-d H:i:s');
		$attendance_arr['created_by'] = $_SESSION['logged_in']['user_id'];
		if(!empty($data['attendance']) && count($data['attendance'])>0){
			foreach ($data['attendance'] as $key => $val) {
				$attendance_arr['user_id'] = $key;
				$attendance_arr['attendance'] = $val;
				$this->db->insert($table, $attendance_arr);
			}
			// echo "<pre>";print_r($attendance_arr);echo "</pre>";exit;
		}
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	function get_user_data($user_id){
		// $table = $this->get_table();
		$sql = "SELECT t.id as user_id,t.preferred_name as user_name,t.gender,t.date_of_birth,t.photo,t.phone,t.designation, (CASE WHEN (t.role_id='5') THEN 'Receptionist' WHEN (t.role_id='6') THEN 'Librarian' WHEN (t.role_id='7') THEN 'Accountant' END) AS user_role
		FROM users t
		WHERE t.id=$user_id AND t.is_deleted = 0";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->row();
	}

	function get_user_attendance($where_params = array()){
		$user_id = $where_params['user_id'];
		$sql = "SELECT ua.id, ua.attendance, MONTH(ua.attendance_date) as month, DAY(ua.attendance_date) as day, ua.attendance_date FROM `user_attendance` ua WHERE ua.user_id=$user_id ORDER BY ua.attendance_date ASC";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function get_user_attendance_stats_data($where_params = array()){
		$user_id = $where_params['user_id'];
		$conditions = '';
		$sql = "SELECT a.id, SUM(CASE WHEN a.attendance='P' THEN 1 ELSE 0 END) present, SUM(CASE WHEN a.attendance='L' THEN 1 ELSE 0 END) leave_count,SUM(CASE WHEN a.attendance='A' THEN 1 ELSE 0 END) absent, SUM(CASE WHEN a.attendance='LE' THEN 1 ELSE 0 END) LE_count FROM `user_attendance` a WHERE a.user_id=$user_id GROUP BY a.user_id";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->row();
	}
}

?>