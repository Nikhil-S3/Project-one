<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_users extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'users';
		return $table;
	}
	function get_all_users(){
		$sql = "SELECT id, preferred_name, email,
		(CASE WHEN (role_id='5') THEN 'Receptionist'
		WHEN (role_id='6') THEN 'Librarian'
		WHEN (role_id='7') THEN 'Accountant' END) AS user_role
		FROM users
		WHERE ( role_id = '5' OR role_id = '6' 
		OR role_id = '7' ) AND is_deleted = '0'
		";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result();
	}
	function insert_user($data){
		$table = $this->get_table();
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_user($id){
		$table = $this->get_table();
		$where_cond = array('id =' => $id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->row();
	}
	function update_user($data){
		$table = $this->get_table();
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
		return true;
	}
	function delete_user($id){
		$table = $this->get_table();
		// $is_deleted = 1;
		$this->db->set('is_deleted',1);
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}

}

?>