<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_eattendance extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'exam_attendance';
		return $table;
	}
	
	function save_attendance($data){
		$table = $this->get_table();
		$student_id = $data['student_id'];
		$exam_id = $data['exam_id'];
		$class_id = $data['class_id'];
		$section_id = $data['section_id'];
		$subject_id = $data['subject_id'];
		$present_status = $data['present_status'];
		$sql = "SELECT * FROM exam_attendance
		WHERE exam_id=$exam_id AND class_id=$class_id AND section_id=$section_id AND
		subject_id=$subject_id AND student_id=$student_id";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		$attendance_info = $query->row();
		// echo "<pre>";print_r($attendance_info);echo "</pre>";exit;
		if(count($attendance_info)>0){
			$where_cond_arr = array(
				'id'=>$attendance_info->id,
				'exam_id'=>$exam_id,
				'class_id'=>$class_id,
				'section_id'=>$section_id,
				'subject_id'=>$subject_id,
				'student_id'=>$student_id,
			);
			$update_data = array(
				'present_status' => $present_status,
				'updated_at' => date('Y-m-d H:i:s')
			);
			$this->db->set($update_data);
			$this->db->where($where_cond_arr);
			$this->db->update($table);
			return true;
		}else{
			$this->db->insert($table, $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
	}
	function get_attendance_exam_class_subjectwise($data = array()){
		$table = $this->get_table();
		$exam_id = $data['exam_id'];
		$class_id = $data['class_id'];
		$subject_id = $data['subject_id'];
		$sql = "SELECT ea.id, ea.section_id,
		(CASE WHEN (ea.present_status='1') THEN 'Present'
		WHEN (ea.present_status='0') THEN 'Absent' END) AS present_status,
		s.id as student_id, s.preferred_name, s.email, s.roll_no 
		FROM exam_attendance ea
		LEFT JOIN users s ON s.id=ea.student_id
		WHERE ea.exam_id = $exam_id AND ea.class_id = $class_id AND
		ea.subject_id = $subject_id AND ea.is_deleted = '0'
		GROUP BY ea.student_id";
		// echo $sql;exit;
		/*$this->db->select("ea.id as attendance_id, ea.section_id, ea.present_status, s.id as student_id, s.preferred_name, s.email, s.roll_no");
		$this->db->join('users s', 's.id=ea.student_id', 'left');
		$this->db->from('exam_attendance ea');
		$where_cond = array('ea.exam_id =' => $data['exam_id'], 'ea.class_id =' => $data['class_id'], 'ea.subject_id =' => $data['subject_id'], 'ea.is_deleted =' => 0);
		$this->db->where($where_cond);
		$this->db->group_by('ea.student_id'); 
		$query = $this->db->get($table);*/
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_attendance_students_sectionwise($section_id){
		$table = $this->get_table();
		$sql = "SELECT a.id as attendance_id, a.section_id, s.id as student_id, s.preferred_name, s.email, s.roll_no, (CASE WHEN (a.present_status='1') THEN 'Present'
		WHEN (a.present_status='0') THEN 'Absent' END) AS present_status
		FROM exam_attendance a
		LEFT JOIN users s ON s.id=a.student_id
		WHERE a.section_id=$section_id AND a.is_deleted='0'
		GROUP BY a.student_id
		";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		/*$this->db->select("a.id as attendance_id, a.section_id, s.id as student_id, s.preferred_name, s.email, s.roll_no");
		$this->db->join('users s', 's.id=a.student_id', 'left');
		$this->db->from('exam_attendance a');
		$where_cond = array('a.section_id =' => $section_id, 'a.is_deleted =' => 0);
		$this->db->where($where_cond);
		$this->db->group_by('a.student_id');
		$query = $this->db->get($table);*/
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