<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_subject extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'subjects';
		return $table;
	}
	function get_all_subjects(){
		// $table = $this->get_table();
		$sql = "SELECT s.id,s.class_id,s.teacher_id,s.pass_mark,s.final_mark,s.subject_name,s.subject_author,s.subject_code,t.preferred_name as teacher_name, cl.class as class_name, 
		(case when (s.subject_type = '1') 
		 THEN
		      'Mandatory' 
		 when (s.subject_type = '0')
		 THEN
		      'Optional' 
		 ELSE
		 		'NA'
		 END)
		 as subject_type
		FROM subjects s
		LEFT JOIN users t ON t.id = s.teacher_id
		LEFT JOIN class cl ON cl.id = s.class_id
		WHERE s.is_deleted = 0";

		/*$sql = "SELECT s.id,s.class_id,s.teacher_id,s.pass_mark,s.final_mark,s.subject_name,s.subject_author,s.subject_code,t.preferred_name as teacher_name, cl.class as class_name, 
		IF(s.subject_type=0, 'Optional', 'Mandatory') AS subject_type
		FROM subjects s
		LEFT JOIN users t ON t.id = s.teacher_id
		LEFT JOIN class cl ON cl.id = s.class_id
		WHERE s.is_deleted = 0";*/

		/*$this->db->select('s.id,s.class_id,s.teacher_id,s.pass_mark,s.final_mark,s.subject_name,s.subject_author,s.subject_code,CASE s.subject_type WHEN 0 THEN Optional WHEN 1 THEN Mandatory, t.preferred_name as teacher_name, cl.class as class_name');
		$this->db->from('subjects as s');
		$this->db->join('users as t', 't.id = s.teacher_id');
		$this->db->join('class as cl', 'cl.id = s.class_id');
		$where_cond = array('s.is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get();*/
		// echo $sql;exit;
		$query = $this->db->query($sql);
		return $query->result();
	}
	function insert_subject($data){
		$table = $this->get_table();
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function get_subject($id){
		$table = $this->get_table();
		$where_cond = array('id =' => $id, 'is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		return $query->row();
	}
	function update_subject($data){
		$table = $this->get_table();
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
		// echo $this->db->last_query();exit;
		return true;
	}
	function delete_subject($id){
		$table = $this->get_table();
		// $is_deleted = 1;
		$this->db->set('is_deleted',1);
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		return true;
	}
	/*function get_class_optional_subjects($id){
		$table = $this->get_table();
		$where_cond = array('class_id =' => $id, 'subject_type ='=>'0', 'is_deleted =' => '0');
		$this->db->select('id,subject_name');
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		// echo $this->db->last_query();exit;
		return $query->result();
	}*/
	function get_class_subjects($class_id,$is_optional_subjects=''){
		$table = $this->get_table();
		$where_conds_arr = array(
			'class_id =' => $class_id,
			'is_deleted =' => '0'
		);
		if($is_optional_subjects=='1'){
			$where_conds_arr['subject_type'] = '0';
		}else if($is_optional_subjects=='0') {
			$where_conds_arr['subject_type'] = '1';
		}
		
		// $where_cond = array('class_id =' => $class_id, 'subject_type ='=>$subject_type, 'is_deleted =' => '0');
		$this->db->select('id,subject_name');
		$this->db->where($where_conds_arr);
		$query = $this->db->get($table);
		// echo $this->db->last_query();exit;
		return $query->result();
	}

}

?>