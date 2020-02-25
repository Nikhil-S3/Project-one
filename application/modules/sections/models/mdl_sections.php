<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_sections extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'sections';
		return $table;
	}
	function get_all_sections(){
		// $table = $this->get_table();
		$this->db->select('s.*, t.preferred_name as teacher_name, cl.class as class_name');
		$this->db->from('sections as s');
		$this->db->join('users as t', 't.id = s.teacher_id');
		$this->db->join('class as cl', 'cl.id = s.class_id');
		$where_cond = array('s.is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get();
		return $query->result();
	}
	function insert_section($data){
		$table = $this->get_table();
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_section($id){
		$table = $this->get_table();
		$where_cond = array('id =' => $id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->row();
	}
	function update_section($data){
		$table = $this->get_table();
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
		return true;
	}
	function delete_section($id){
		$table = $this->get_table();
		// $is_deleted = 1;
		$this->db->set('is_deleted',1);
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}
	function get_class_sections($id){
		// echo $id; exit;
		$table = $this->get_table();
		$where_cond = array('class_id =' => $id, 'is_deleted =' => 0);
		$this->db->select('id,section,category');
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->result();
	}
}

?>