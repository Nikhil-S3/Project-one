<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_reports extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'student_attendance';
		return $table;
	}
	
	function get_class_reports($data = array()){
		if(count($data)>0){
			$reports = array();
			$class_id = $data['class_id'];
			$section_id = $data['section_id'];
			$sql = "SELECT COUNT(id) as total_subjects FROM subjects WHERE class_id=$class_id";
			$query = $this->db->query($sql);
			$reports['subjects'] = $query->row();

			$sql2 = "SELECT COUNT(id) as total_students FROM users WHERE class_id=$class_id AND section_id=$section_id";
			$query2 = $this->db->query($sql2);
			$reports['students'] = $query2->row();

			$sql3 = "SELECT sub.subject_name,t.preferred_name FROM subjects sub LEFT JOIN users t ON t.id=sub.teacher_id WHERE sub.class_id=$class_id";
			// echo $sql3;exit;
			$query3 = $this->db->query($sql3);
			$reports['subjects_teachers'] = $query3->result();

			$sql4 = "SELECT cl.teacher_id, t.preferred_name, t.phone, t.email, t.address FROM class cl LEFT JOIN users t ON t.id=cl.teacher_id WHERE cl.id=$class_id";
			// echo $sql4;exit;
			$query4 = $this->db->query($sql4);
			$reports['class_teacher'] = $query4->row();
			return $reports;
		}
	}
	function get_student_reports($data = array()){
		if(count($data)>0){
			$reports = array();
			$class_id = $data['class_id'];
			$section_id = $data['section_id'];
			$report_for_dynamic = $data['report_for_dynamic'];
			$report_for = $data['report_for'];
			switch($report_for){
				case 'blood_group':
					$sql = "SELECT id, preferred_name, phone, email, roll_no, register_no, class_id, section_id, blood_group FROM users WHERE blood_group='$report_for_dynamic' AND class_id=$class_id AND section_id=$section_id AND role_id='4'";
					break;
				case 'country':
					$sql = "SELECT id, preferred_name, phone, email, roll_no, register_no, class_id, section_id, country FROM users WHERE country='$report_for_dynamic' AND class_id=$class_id AND section_id=$section_id AND role_id='4'";
					break;
				case 'gender':
					$sql = "SELECT id, preferred_name, phone, email, roll_no, register_no, class_id, section_id, gender FROM users WHERE gender='$report_for_dynamic' AND class_id=$class_id AND section_id=$section_id AND role_id='4'";
					break;
				case 'birthday':
					$converted_date = str_replace('/', '-', $report_for_dynamic);
					$new_date_format = date('Y-m-d',strtotime($converted_date));
					$sql = "SELECT id, preferred_name, phone, email, roll_no, register_no, class_id, section_id, date_of_birth FROM users WHERE date_of_birth='$new_date_format' AND class_id=$class_id AND section_id=$section_id AND role_id='4'";
					break;
			}
			// echo $sql;exit;
			$query = $this->db->query($sql);
			return $query->result();
		}	
	}

	function get_examschedule_reports($data = array()){
		if(count($data)>0){
			$reports = array();
			$exam_id = $data['exam_id'];
			$class_id = $data['class_id'];
			$section_id = $data['section_id'];
			$sql = "SELECT es.id, es.class_id, es.section_id, es.room_no, TIME_FORMAT( `time_from`, '%h:%i %p' ) as time_from, TIME_FORMAT( `time_to`, '%h:%i %p' ) as time_to, es.e_schedule_date, sub.subject_name FROM exam_schedule es LEFT JOIN subjects sub ON sub.id=es.subject_id WHERE es.exam_id='$exam_id' AND es.class_id=$class_id AND es.section_id=$section_id AND es.is_deleted='0'";
			// echo $sql;exit;
			$query = $this->db->query($sql);
			return $query->result();
		}	
	}

	function get_idcard_reports($data = array()){
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$reports = array();
		$conditions = "";
		$id_card_for = $data['id_card_for'];
		if($id_card_for=='student'){
			$class_id = !empty($data['class_id']) ? $data['class_id'] : '';
			$section_id = !empty($data['section_id']) ? $data['section_id'] : '';
			$student_id = !empty($data['student_id']) ? $data['student_id'] : '';
			if(!empty($data['section_id'])){
				$conditions .= " AND s.section_id=$section_id";
			}
			if(!empty($data['student_id'])){
				$conditions .= " AND s.id=$student_id";
			}
			$sql = "SELECT s.id, s.preferred_name, s.class_id, s.section_id,
			s.email, s.phone, s.roll_no, s.register_no, s.blood_group,
			s.photo, cl.class, sec.section 
			FROM users s 
			LEFT JOIN class cl ON cl.id=s.class_id 
			LEFT JOIN sections sec ON sec.id=s.section_id 
			WHERE s.class_id=$class_id AND s.is_deleted='0' 
			AND s.role_id='4' $conditions ";
		}else{
			$teacher_id = $data['teacher_id'];
			if(!empty($data['teacher_id'])){
				$conditions .= " AND s.id=$teacher_id";
			}
			$sql = "SELECT s.id, s.preferred_name, s.designation, s.email, 
			s.phone, s.joining_date, s.photo 
			FROM users s 
			WHERE s.is_deleted='0' AND s.role_id='2' $conditions ";
		}
		// echo $sql;exit;	
		
		$query = $this->db->query($sql);
		return $query->result();
	}

	function get_user($role_id){
		$where_cond = array('role_id =' => $role_id, 'is_deleted ='=>'0' );
		$this->db->select('id, preferred_name')
		->where($where_cond);
		$query = $this->db->get('users');
		// echo $this->db->last_query();exit;
		return $query->result();
	}

	function get_salary_reports($data = array()){
		if(count($data)>0){
			$reports = array();
			$role_id = $data['salary_for'];
			$user_id = $data['salary_for_dynamic_id'];
			$payment_month = $data['payment_month'];
			$from_date = $data['from_date'];
			$to_date = $data['to_date'];
			$sql = "SELECT ph.id, ph.payment_month_year, ph.payment_amount, u.preferred_name, (CASE WHEN(u.role_id='2') THEN 'teacher' WHEN(u.role_id='5') THEN 'Receptionist' WHEN(u.role_id='6') THEN 'Librarian' WHEN(role_id='7') THEN 'Accountant' END) AS role FROM payment_history ph LEFT JOIN users u ON u.id=ph.user_id WHERE ph.user_id='$user_id' AND ph.is_deleted='0'";
			// echo $sql;exit;
			$query = $this->db->query($sql);
			return $query->result();
		}	
	}

	function get_progresscard_reports($data = array()){
		if(count($data)>0){
			$reports = array();
			$class_id = $data['class_id'];
			$section_id = $data['section_id'];
			$student_id = $data['student_id'];
			$sql = "SELECT ph.id, ph.payment_month_year, ph.payment_amount, u.preferred_name, (CASE WHEN(u.role_id='2') THEN 'teacher' WHEN(u.role_id='5') THEN 'Receptionist' WHEN(u.role_id='6') THEN 'Librarian' WHEN(role_id='7') THEN 'Accountant' END) AS role FROM payment_history ph LEFT JOIN users u ON u.id=ph.user_id WHERE ph.user_id='$user_id' AND ph.is_deleted='0'";
			// echo $sql;exit;
			$query = $this->db->query($sql);
			return $query->result();
		}
	}
}

?>