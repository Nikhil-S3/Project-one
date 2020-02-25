<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_marks extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'marks';
		return $table;
	}
	
	function save_marks($data){
		$table = $this->get_table();
		$attendance_arr = [];
		$attendance_arr['exam_id'] = $exam_id = $data['exam_id'];
		$attendance_arr['class_id'] = $class_id = $data['class_id'];
		$attendance_arr['section_id'] = $section_id =$data['section_id'];
		$attendance_arr['subject_id'] = $subject_id = $data['subject_id'];
		$attendance_arr['created_at'] = date('Y-m-d H:i:s');
		$attendance_arr['created_by'] = $_SESSION['logged_in']['user_id'];
		if(!empty($data['marks']) && count($data['marks'])>0){
		
			foreach ($data['marks'] as $key => $val) {

				$student_id = $key;
				$sql = "SELECT id FROM marks
				WHERE exam_id=$exam_id AND class_id=$class_id AND section_id=$section_id AND
				subject_id=$subject_id AND student_id=$student_id";
				// echo $sql;exit;
				$query = $this->db->query($sql);
				$marks_info = $query->result();
				// echo "<pre>";print_r($marks_info);echo "</pre>";exit;
				if(count($marks_info)>0){
					foreach ($marks_info as $key => $value) {
						$where_cond_arr = array(
							'id'=>$value->id,
							'exam_id'=>$exam_id,
							'class_id'=>$class_id,
							'section_id'=>$section_id,
							'subject_id'=>$subject_id,
							'student_id'=>$student_id,
						);
						$update_data = array(
							'marks' => $val,
							'updated_at' => date('Y-m-d H:i:s'),
							'updated_by' => $_SESSION['logged_in']['user_id']
						);
						$this->db->set($update_data);
						$this->db->where($where_cond_arr);
						$this->db->update($table);
					}
				}else{
					$attendance_arr['student_id'] = $key;;
					$attendance_arr['marks'] = $val;
					$this->db->insert($table, $attendance_arr);
				}
			}
			// echo "<pre>";print_r($attendance_arr);echo "</pre>";exit;
		}
		return true;
		// return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_markassigned_students_classwise($class_id = ''){
		$table = $this->get_table();
		$this->db->select("m.id, m.section_id, s.id as student_id, s.preferred_name, s.email, s.roll_no");
		$this->db->join('users s', 's.id=m.student_id', 'left');
		$this->db->from('marks m');
		$where_cond = array('m.class_id =' => $class_id, 'm.is_deleted =' => 0);
		$this->db->where($where_cond);
		$this->db->group_by('m.student_id'); 
		$query = $this->db->get($table);
		// echo $this->db->last_query();exit;
		return $query->result();
	}
	function get_markassigned_students_sectionwise($section_id = ''){
		if(!empty($section_id)){
			$sql = "SELECT m.id, m.section_id, s.id as student_id, s.preferred_name, s.email, s.roll_no FROM `marks` m LEFT JOIN users s ON s.id=m.student_id WHERE m.section_id=$section_id GROUP BY m.student_id";
			// echo $sql;exit;
			$query = $this->db->query($sql);
			return $query->result();
		}
	}
	function get_student_exams($student_id = ''){
		if(!empty($student_id)){
			$sql = "SELECT m.exam_id, e.exam_name FROM `marks` m LEFT JOIN exams e ON e.id=m.exam_id WHERE m.student_id=$student_id GROUP BY m.exam_id";
			// echo $sql;exit;
			$query = $this->db->query($sql);
			return $query->result();
		}
	}
	function get_student_marks($where_params = array()){
		// echo "<pre>";print_r($where_params);echo "</pre>";exit;
		$student_id = $where_params['student_id'];
		$conditions = '';
		if(!empty($where_params['section_id'])){
			$section_id = $where_params['section_id'];
			$conditions .= "AND m.section_id=$section_id";
		}
		if(!empty($where_params['exam_id'])){
			$exam_id = $where_params['exam_id'];
			$conditions .= " AND m.exam_id=$exam_id";
		}
		$sql = "SELECT m.id, m.marks, s.subject_name, e.exam_name FROM `marks` m LEFT JOIN subjects s ON s.id=m.subject_id LEFT JOIN exams e ON e.id=m.exam_id WHERE m.student_id=$student_id $conditions";
		// echo $sql;exit;
		$query = $this->db->query($sql);
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
	function get_student_subject_grades($marks=''){
		$sql = "SELECT id, grade_name, grade_point FROM `grades` WHERE mark_from<=$marks AND mark_upto>=$marks";
		$query = $this->db->query($sql);
		return $query->row();
	}

	function get_students_marks($where=array()){
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
		$sql = "SELECT id, student_id, marks
		FROM marks 
		WHERE is_deleted = 0 $condition";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_students_attendancewise($data = array()){
		$condition = "";
		if(!empty($data['exam_id'])){
			$condition .= " exam_id = ".$data['exam_id'];
		}
		if(!empty($data['class_id'])){
			$condition .= " AND class_id = ".$data['class_id'];
		}
		if(!empty($data['section_id'])){
			$condition .= " AND section_id = ".$data['section_id'];
		}
		if(!empty($data['subject_id'])){
			$condition .= " AND subject_id = ".$data['subject_id'];
		}
		$condition .= " AND present_status='1' AND is_deleted = '0'";
		$sql = "SELECT student_id FROM exam_attendance WHERE $condition";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		// echo "<pre>";print_r($query->result());echo "</pre>";exit;
		if(count($query->result())>0){
			$student_ids_arr = array();
			foreach ($query->result() as $key => $value) {
				$student_ids_arr[] = $value->student_id;
			}
			// echo "<pre>";print_r($student_ids_arr);echo "</pre>";
			$student_ids_str = implode(',', $student_ids_arr);
			// echo $student_ids_str;exit;
			if($student_ids_str != ''){
				$sql = "SELECT s.id, s.preferred_name, s.email, s.roll_no, sec.section
				FROM users s
				LEFT JOIN sections sec ON sec.id=s.section_id
				WHERE s.is_deleted = '0' AND s.id IN ($student_ids_str)";
				// echo $sql;exit;
				$query = $this->db->query($sql);
				// echo "<pre>";print_r($query->result());echo "</pre>";exit;
				return $query->result();
			}
		}
		return array();
	}
	
}

?>