<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_systemadmin extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'users';
		return $table;
	}
	function get_all_users(){
		// $table = $this->get_table();
		/*$this->db->select("s.id, s.preferred_name, s.email, (CASE WHEN (s.is_deleted='1') THEN 'Active' CASE (WHEN s.is_deleted='2') THEN 'Inactive' END) as status");
		$this->db->from("users s");
		$where_cond = array('s.role_id = '=> 1);
		$this->db->where($where_cond);*/
		$sql = "SELECT id, preferred_name, email, (CASE WHEN (is_deleted='1') THEN 'Inactive' WHEN (is_deleted='0') THEN 'Active' END) as status FROM users WHERE role_id='1'";
		$query = $this->db->query($sql);
		// echo $this->db->last_query();exit;
		return $query->result();
	}
	function insert_systemadmin($data){
		$table = $this->get_table();
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_user($id){
		$table = $this->get_table();
		$this->db->select("id, preferred_name, date_of_birth, gender, religion, email, phone, address, photo, joining_date, username");
		$where_cond = array('id =' => $id);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->row();
	}
	function update_system_admin($data){
		$table = $this->get_table();
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
		return true;
	}
	function update_user_password($data){
		$table = $this->get_table();
		$user_id = $data['user_id'];
		$new_password = $data['new_password'];
		$sql = "UPDATE users SET password='$new_password' WHERE id='$user_id'";
		$query = $this->db->query($sql);
		return true;
	}
	function delete_system_admin($id){
		$table = $this->get_table();
		// $is_deleted = 1;
		$this->db->set('is_deleted',1);
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}

}

?>