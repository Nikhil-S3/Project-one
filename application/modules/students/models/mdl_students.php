<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_students extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'users';
		return $table;
	}
	function get_all_students(){
		// $table = $this->get_table();
		$this->db->select("s.id, s.preferred_name, s.email, s.roll_no, c.class, se.section");
		$this->db->from("users s");
		$this->db->join("class c","c.id=s.class_id", "left");
		$this->db->join("sections se","se.id=s.section_id", "left");
		$where_cond = array('s.role_id = '=> 4, 's.is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get();
		// echo $this->db->last_query();exit;
		return $query->result();
	}
	function insert_student($data){
		$table = $this->get_table();
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_student($id){
		$table = $this->get_table();
		$this->db->select("id, preferred_name, parent_id, date_of_birth, gender, blood_group, religion, email, phone, address, state, country, class_id, section_id, group, optional_subject_id, register_no, roll_no, photo, extra_curricular_activities, remarks, username");
		$where_cond = array('id =' => $id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->row();
	}
	function update_student($data){
		$table = $this->get_table();
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
		return true;
	}
	function delete_student($id){
		$table = $this->get_table();
		// $is_deleted = 1;
		$this->db->set('is_deleted',1);
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}
	function get_student_classwise($class_id){
		$table = $this->get_table();
		$this->db->select("id, preferred_name, email, roll_no");
		$where_cond = array('class_id =' => $class_id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->result();
	}
	function get_students_class_sectionwise($filter_arr = array()){
		// echo "<pre>";print_r($filter_arr);echo "</pre>";exit;
		// $table = $this->get_table();
		$class_id = !empty($filter_arr['class_id'])?$filter_arr['class_id']:'';
		$section_id = !empty($filter_arr['section_id'])?$filter_arr['section_id']:'';
		$this->db->select("s.id, s.preferred_name, s.email, s.roll_no, sec.section");
		$this->db->from("users s");
		$this->db->join('sections sec', 'sec.id=s.section_id', 'left');
		$where_cond = array('s.class_id =' => $class_id,'s.section_id =' => $section_id,'s.role_id =' => 4, 's.is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get();
		// echo $this->db->last_query();exit;
		return $query->result();
	}

}

?>