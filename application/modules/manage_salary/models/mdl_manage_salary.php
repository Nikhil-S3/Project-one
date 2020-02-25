<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_manage_salary extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'manage_salary';
		return $table;
	}
	
	function get_teachers_all_salary_templates(){
		// $table = $this->get_table();
		$sql = "SELECT ms.id, t.id as teacher_id,t.preferred_name,t.email, t.joining_date, t.photo
		FROM manage_salary ms
		LEFT JOIN users t ON t.id = ms.teacher_id
		WHERE ms.is_deleted = 0";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result();
	}
	function assign_salarytemplate_to_teachers($data){
		$table = $this->get_table();
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_teacher_salary_details($manage_salary_id){
		$sql = "SELECT ms.id,ms.s_template_id, ms.teacher_id, st.grade, st.overtime_rate, st.gross_salary, st.total_deductions, st.net_salary,t.preferred_name, t.gender, t.date_of_birth, t.phone, t.photo
		FROM manage_salary ms
		LEFT JOIN users t ON t.id = ms.teacher_id
		LEFT JOIN salary_template st ON st.id = ms.s_template_id
		WHERE ms.id=$manage_salary_id AND ms.is_deleted = 0";
		$query = $this->db->query($sql);
		return $query->row();
	}
	function update_teachers_salarytemplate($data){
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$table = $this->get_table();
		if($data['id']!=''){
			$this->db->where('id =', $data['id']);
			$this->db->update($table, $data);
			return true;
		}
	}
	function check_teacher_exists($teacher_id){
		$table = $this->get_table();
		$where_cond = array('teacher_id = '=> $teacher_id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
}

?>