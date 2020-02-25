<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_tattendance extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'teacher_attendance';
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
				$attendance_arr['teacher_id'] = $key;
				$attendance_arr['attendance'] = $val;
				$this->db->insert($table, $attendance_arr);
			}
			// echo "<pre>";print_r($attendance_arr);echo "</pre>";exit;
		}
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	function get_attendance_teacher_data($teacher_id){
		// $table = $this->get_table();
		$sql = "SELECT t.id as teacher_id,t.preferred_name as teacher_name,t.gender,t.date_of_birth,t.photo,t.phone,t.designation
		FROM users t
		WHERE t.id=$teacher_id AND t.is_deleted = 0";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->row();
	}

	function get_teacher_attendance($where_params = array()){
		$teacher_id = $where_params['teacher_id'];
		$sql = "SELECT a.id, a.attendance, MONTH(a.attendance_date) as month, DAY(a.attendance_date) as day, a.attendance_date FROM `teacher_attendance` a WHERE a.teacher_id=$teacher_id ORDER BY a.attendance_date ASC";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function get_teacher_attendance_stats_data($where_params = array()){
		$teacher_id = $where_params['teacher_id'];
		$conditions = '';
		$sql = "SELECT a.id, SUM(CASE WHEN a.attendance='P' THEN 1 ELSE 0 END) present, SUM(CASE WHEN a.attendance='L' THEN 1 ELSE 0 END) leave_count,SUM(CASE WHEN a.attendance='A' THEN 1 ELSE 0 END) absent, SUM(CASE WHEN a.attendance='LE' THEN 1 ELSE 0 END) LE_count FROM `teacher_attendance` a WHERE a.teacher_id=$teacher_id GROUP BY a.teacher_id";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->row();
	}
}

?>