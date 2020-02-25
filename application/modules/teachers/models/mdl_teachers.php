<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_teachers extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	function get_table(){
		$table = 'users';
		return $table;
	}
	function get_all_teachers($selected_fields = array()){
		$table = $this->get_table();
		if(count($selected_fields)>0){
			/*foreach ($selected_fields as $key => $value) {
					
			}*/
			$select_fields_str = implode(',',$selected_fields);
			// echo $select_fields_str;exit;
			$this->db->select($select_fields_str);
		}
		$where_cond = array('is_deleted =' => 0, 'role_id =' => 2);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->result();
	}
	function insert_teacher($data){
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
	function update_teacher($data){
		$table = $this->get_table();
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
		return true;
	}
	function delete_teacher($id){
		$table = $this->get_table();
		// $is_deleted = 1;
		$this->db->set('is_deleted',1);
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}
	function get_teacher_data($teacher_id){
		// $table = $this->get_table();
		$sql = "SELECT s.id as teacher_id,s.preferred_name,s.date_of_birth,s.email,s.photo,s.phone,s.religion,s.address,s.joining_date,s.gender,s.username
		FROM users s
		WHERE s.id=$teacher_id AND s.is_deleted = '0'";
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->row();
	}

}

?>