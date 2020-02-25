<?php

Class Mdl_user extends CI_Model {

	// Read data using username and password
	public function login($data) {
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	// Read data from database to show data in admin page
	public function read_user_information($username) {

		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
		return $query->result();
		} else {
		return false;
		}
	}
	public function read_role_permissions($role_id) {
		$condition = "role_id =" . "'" . $role_id . "'";
		$this->db->select('module_id, p_add, p_edit, p_delete, p_view');
		$this->db->from('role_permissions');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_user_profile_data($id){
		$sql = "SELECT id, preferred_name, email, phone, address
		FROM users WHERE id='$id'";
		$query = $this->db->query($sql);
		return $query->row();
	}

}