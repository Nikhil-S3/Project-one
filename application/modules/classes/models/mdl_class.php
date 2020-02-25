<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_class extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	function get_table(){
		$table = 'class';
		return $table;
	}
	function get_all_classes(){
		// $table = $this->get_table();
		$this->db->select('cl.*,t.preferred_name as teacher_name');
		$this->db->from('class as cl');
		$this->db->join('users as t', 't.id = cl.teacher_id', 'left');
		$where_cond = array('cl.is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get();
		return $query->result();
	}
	function insert_class($data){
		$table = $this->get_table();
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_class($id){
		$table = $this->get_table();
		$where_cond = array('id =' => $id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->row();
	}
	function update_class($data){
		$table = $this->get_table();
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
		return true;
	}
	function delete_class($id){
		$table = $this->get_table();
		// $is_deleted = 1;
		$this->db->set('is_deleted',1);
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}

}

?>