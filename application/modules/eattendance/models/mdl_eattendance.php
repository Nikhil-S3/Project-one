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
		$examschedule_id = $data['exam_schedule_id'];
		$present_status = $data['present_status'];

		// echo "<pre>";print_r($_POST);echo "</pre>";exit;

		// $attendance_taken = !empty($_POST['attendance_taken']) ? $_POST['attendance_taken'] : '';
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
			if($this->db->affected_rows()){
				$sql = "UPDATE exam_schedule SET attendance_taken='1'
				WHERE id=$examschedule_id";
				$this->db->query($sql);
				return true;
			}
			// return ($this->db->affected_rows() != 1) ? false : true;
		}
	}
	function get_attendance_exam_class_subjectwise($data = array()){
		// echo "<pre>";print_r($data);echo "</pre>";exit;
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

	function get_examattendance_students_attendancewise($where=array()){
		// $table = $this->get_table();
		$condition = "";
		if(!empty($where['exam_id'])){
			$condition .= " AND exam_id = ".$where['exam_id'];
		}
		if(!empty($where['class_id'])){
			$condition .= " AND class_id = ".$where['class_id'];
		}
		if(!empty($where['section_id'])){
			$condition .= " AND section_id = ".$where['section_id'];
		}
		if(!empty($where['subject_id'])){
			$condition .= " AND subject_id = ".$where['subject_id'];
		}
		$sql = "SELECT id, student_id, present_status
		FROM exam_attendance ea 
		WHERE is_deleted = 0 $condition";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result();
	}

}

?>