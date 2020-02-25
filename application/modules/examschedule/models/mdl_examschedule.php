<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_examschedule extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'exam_schedule';
		return $table;
	}
	
	function get_all_examschedules(){
		$table = $this->get_table();
		$sql = "SELECT es.id, es.exam_schedule_title, es.room_no, es.e_schedule_date, TIME_FORMAT( `time_from`, '%h:%i %p' ) as time_from, TIME_FORMAT( `time_to`, '%h:%i %p' ) as time_to, e.exam_name, c.class, s.section, sub.subject_name
		FROM exam_schedule es
		LEFT JOIN exams e ON e.id=es.exam_id
		LEFT JOIN class c ON c.id=es.class_id
		LEFT JOIN sections s ON s.id=es.section_id
		LEFT JOIN subjects sub ON sub.id=es.subject_id
		WHERE es.is_deleted = '0'
		ORDER BY es.id DESC";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function insert_exam_schedule(){
		// $table = $this->get_table();
		$exam_schedule_title = !empty($_POST['exam_schedule_title'])?$_POST['exam_schedule_title']:'';
		$exam_id = !empty($_POST['exam_id'])?$_POST['exam_id']:'';
        $class_id = !empty($_POST['class_id'])?$_POST['class_id']:'';
        $section_id = !empty($_POST['section_id'])?$_POST['section_id']:'';
        $subject_id = !empty($_POST['subject_id'])?$_POST['subject_id']:'';
        $e_schedule_date = '';
        if(!empty($this->input->post('e_schedule_date'))){
            $exam_schedule_date = $this->input->post('e_schedule_date');
            $converted_date = str_replace('/', '-', $exam_schedule_date);
            $e_schedule_date = date('Y-m-d', strtotime($converted_date));
        }
        $time_from = !empty($_POST['time_from'])?$_POST['time_from']:'';
        $time_to = !empty($_POST['time_to'])?$_POST['time_to']:'';
        $room_no = !empty($_POST['room_no'])?$_POST['room_no']:'';
        $created_at = date('Y-m-d H:i:s');
        $created_by = $_SESSION['logged_in']['user_id'];

		$sql = "INSERT INTO `exam_schedule`
		SET
        `exam_schedule_title` = $exam_schedule_title,
        `exam_id` = $exam_id,
        `class_id` = $class_id,
        `section_id` = $section_id,
        `subject_id` = $subject_id,
        `e_schedule_date` = '$e_schedule_date',
        `time_from` = TIME( STR_TO_DATE( '$time_from', '%h:%i %p' ) ),
        `time_to` = TIME( STR_TO_DATE( '$time_to', '%h:%i %p' ) ),
        `room_no` = $room_no, 
        `created_at` = '$created_at', 
        `created_by` = '$created_by' ";
        // echo $sql;exit;
		$result = $this->db->query( $sql );
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_examschedule($id){
		$table = $this->get_table();
		$where_cond = array('id =' => $id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->row();
	}
	function update_exam_schedule(){
		$examschedule_id = !empty($_POST['examschedule_id'])?$_POST['examschedule_id']:'';
		$exam_id = !empty($_POST['exam_id'])?$_POST['exam_id']:'';
        $class_id = !empty($_POST['class_id'])?$_POST['class_id']:'';
        $section_id = !empty($_POST['section_id'])?$_POST['section_id']:'';
        $subject_id = !empty($_POST['subject_id'])?$_POST['subject_id']:'';
        $e_schedule_date = '';
        if(!empty($this->input->post('e_schedule_date'))){
            $exam_schedule_date = $this->input->post('e_schedule_date');
            $converted_date = str_replace('/', '-', $exam_schedule_date);
            $e_schedule_date = date('Y-m-d', strtotime($converted_date));
        }
        $time_from = !empty($_POST['time_from'])?$_POST['time_from']:'';
        $time_to = !empty($_POST['time_to'])?$_POST['time_to']:'';
        $room_no = !empty($_POST['room_no'])?$_POST['room_no']:'';
        $updated_at = date('Y-m-d H:i:s');
        $updated_by = $_SESSION['logged_in']['user_id'];

		$sql = "UPDATE `exam_schedule`
		SET
        `exam_id` = $exam_id,
        `class_id` = $class_id,
        `section_id` = $section_id,
        `subject_id` = $subject_id,
        `e_schedule_date` = '$e_schedule_date',
        `time_from` = TIME( STR_TO_DATE( '$time_from', '%h:%i %p' ) ),
        `time_to` = TIME( STR_TO_DATE( '$time_to', '%h:%i %p' ) ),
        `room_no` = $room_no, 
        `updated_at` = '$updated_at',
        `updated_by` = '$updated_by' WHERE id = $examschedule_id ";
        // echo $sql;exit;
		$result = $this->db->query( $sql );
		return true;
	}
	function delete_examschedule($id){
		$table = $this->get_table();
		// $is_deleted = 1;
		$this->db->set('is_deleted',1);
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}
	function get_examschedule_data($examschedule_id=''){
		$sql = "SELECT es.exam_id, es.class_id, es.section_id, es.subject_id, es.attendance_taken, cl.class, s.section, e.exam_name, sub.subject_name FROM exam_schedule es
		LEFT JOIN class cl ON cl.id=es.class_id
		LEFT JOIN sections s ON s.id=es.section_id
		LEFT JOIN exams e ON e.id=es.exam_id
		LEFT JOIN subjects sub ON sub.id=es.subject_id
		WHERE es.id=$examschedule_id AND es.is_deleted='0'";
		$query = $this->db->query($sql);
		return $query->row();
	}
}

?>