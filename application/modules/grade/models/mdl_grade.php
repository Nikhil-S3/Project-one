<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_grade extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'grades';
		return $table;
	}
	
	function get_all_grades(){
		$table = $this->get_table();
		$this->db->where('is_deleted = ','0');
		$query = $this->db->get($table);
		return $query->result();
	}
	function insert_grade($data){
		$table = $this->get_table();
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_grade($id){
		$table = $this->get_table();
		$where_cond = array('id =' => $id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->row();
	}
	function update_grade($data){
		$table = $this->get_table();
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
		return true;
	}
	function delete_grade($id){
		$table = $this->get_table();
		// $is_deleted = 1;
		$this->db->set('is_deleted',1);
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}
}

?>