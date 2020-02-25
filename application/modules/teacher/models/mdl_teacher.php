<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_teacher extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	function get_table(){
		$table = 'users';
		return $table;
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