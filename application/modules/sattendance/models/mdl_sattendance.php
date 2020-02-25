<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_sattendance extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'student_attendance';
		return $table;
	}
	
	function save_attendance($data){
		$table = $this->get_table();
		$attendance_arr = [];
		$attendance_arr['class_id'] = $data['class_id'];
		$attendance_arr['section_id'] = $data['section_id'];
		// $attendance_arr['subject_id'] = $data['subject_id'];
		$attendance_arr['attendance_date'] = $data['a_date'];
		$attendance_arr['created_at'] = date('Y-m-d H:i:s');
		$attendance_arr['created_by'] = $_SESSION['logged_in']['user_id'];
		if(!empty($data['attendance']) && count($data['attendance'])>0){
			foreach ($data['attendance'] as $key => $val) {
				$attendance_arr['student_id'] = $key;
				$attendance_arr['attendance'] = $val;
				$this->db->insert($table, $attendance_arr);
			}
			// echo "<pre>";print_r($attendance_arr);echo "</pre>";exit;
		}
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_attendance_classwise($class_id = ''){
		$table = $this->get_table();
		$this->db->select("sa.id as attendance_id, sa.section_id, s.id as student_id, s.preferred_name, s.email, s.roll_no");
		$this->db->join('users s', 's.id=sa.student_id', 'left');
		$this->db->from('student_attendance sa');
		$where_cond = array('sa.class_id =' => $class_id, 'sa.is_deleted =' => 0);
		$this->db->where($where_cond);
		$this->db->group_by('sa.student_id'); 
		$query = $this->db->get($table);
		// echo $this->db->last_query();exit;
		return $query->result();
	}
	function get_attendance_students_sectionwise($section_type){
		$table = $this->get_table();
		$this->db->select("sa.id as attendance_id, sa.section_id, s.id as student_id, s.preferred_name, s.email, s.roll_no");
		$this->db->join('users s', 's.id=sa.student_id', 'left');
		$this->db->from('student_attendance sa');
		$where_cond = array('sa.section_id =' => $section_type, 'sa.is_deleted =' => 0);
		$this->db->where($where_cond);
		$this->db->group_by('sa.student_id');
		$query = $this->db->get($table);
		// echo $this->db->last_query();exit;
		return $query->result();
	}

	function get_attendance_student_data($student_id){
		// $table = $this->get_table();
		$sql = "SELECT s.id as student_id,s.class_id,s.preferred_name as student_name,s.register_no,s.roll_no,s.photo,cl.class,sec.section
		FROM users s
		LEFT JOIN sections sec ON sec.id = s.section_id
		LEFT JOIN class cl ON cl.id = s.class_id
		WHERE s.id=$student_id AND s.is_deleted = 0";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->row();
	}

	function get_student_subjects($student_id){
		$sql = "SELECT a.subject_id, sub.subject_name FROM `student_attendance` a LEFT JOIN subjects sub ON sub.id=a.subject_id WHERE a.student_id=$student_id GROUP BY a.subject_id";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result();
	}
	/*function get_student_monthly_attendance($where_params = array()){
		$student_id = $where_params['student_id'];
		$subject_id = $where_params['subject_id'];
		$sql = "SELECT a.id, a.subject_id, a.attendance, MONTH(a.attendance_date) as month, DAY(a.attendance_date) as day, a.attendance_date, sub.subject_name FROM `student_attendance` a LEFT JOIN subjects sub ON sub.id=a.subject_id WHERE a.student_id=$student_id AND a.subject_id=$subject_id ORDER BY a.attendance_date ASC";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result();
	}*/
	function get_student_monthly_attendance($where_params = array()){
		$student_id = $where_params['student_id'];
		$conditions = '';
		if(!empty($where_params['section_id'])){
			$section_id = $where_params['section_id'];
			$conditions .= "AND a.section_id=$section_id";
		}
		$sql = "SELECT a.id, a.attendance, MONTH(a.attendance_date) as month, DAY(a.attendance_date) as day, a.attendance_date FROM `student_attendance` a WHERE a.student_id=$student_id $conditions ORDER BY a.attendance_date ASC";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function get_student_attendance_stats_data($where_params = array()){
		$student_id = $where_params['student_id'];
		$conditions = '';
		if(!empty($where_params['section_id'])){
			$section_id = $where_params['section_id'];
			$conditions .= "AND a.section_id=$section_id";
		}
		$sql = "SELECT a.id, SUM(CASE WHEN a.attendance='P' THEN 1 ELSE 0 END) present, SUM(CASE WHEN a.attendance='L' THEN 1 ELSE 0 END) leave_count,SUM(CASE WHEN a.attendance='A' THEN 1 ELSE 0 END) absent, SUM(CASE WHEN a.attendance='LE' THEN 1 ELSE 0 END) LE_count FROM `student_attendance` a WHERE a.student_id=$student_id $conditions GROUP BY a.student_id";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->row();
	}
}

?>