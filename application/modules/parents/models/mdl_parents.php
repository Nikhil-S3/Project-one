<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_parents extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'users';
		return $table;
	}
	function get_all_parents(){
		$table = $this->get_table();
		$where_cond = array('is_deleted =' => 0, 'role_id =' => 3);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->result();
	}
	function insert_parent($data){
		$table = $this->get_table();
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_student($id){
		$table = $this->get_table();
		$where_cond = array('id =' => $id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->row();
	}
	function update_parent($data){
		$table = $this->get_table();
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
		return true;
	}
	function delete_parent($id){
		$table = $this->get_table();
		// $is_deleted = 1;
		$this->db->set('is_deleted',1);
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}

}

?>