<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_salary_template extends CI_Model {

	function __constrct(){
		parent::__constrct();
	}
	function get_table(){
		$table = 'salary_template';
		return $table;
	}
	function get_all_salary_templates($selected_fields=array()){
		$table = $this->get_table();
		if(count($selected_fields)>0){
			$select_fields_str = implode(',',$selected_fields);
			$this->db->select($select_fields_str);
		}
		$where_cond = array('is_deleted =' => 0);
		$this->db->where($where_cond);
		$query = $this->db->get($table);
		/*$sql = "SELECT st.id,st.grade,st.basic_salary,st.overtime_rate FROM salary_template st WHERE st.is_deleted='0'";
		$query = $this->db->query($sql);*/
		return $query->result();
	}
	function get_salary_template($id = ''){
		$sql = "SELECT st.id,st.grade,st.basic_salary,st.overtime_rate,st.gross_salary,st.total_deductions,st.net_salary 
		FROM salary_template st
		LEFT JOIN salary_allowances sa ON sa.s_template_id=st.id
		LEFT JOIN salary_deductions sd ON sd.s_template_id=st.id
		WHERE st.id=$id AND st.is_deleted='0'";
		$query = $this->db->query($sql);
		return $query->row();
	}
	function get_salary_template_allowances($id = ''){
		$sql = "SELECT id as allowance_id, allowance_label, allowance_amount FROM salary_allowances
		WHERE s_template_id=$id";
		$query = $this->db->query($sql);
		return $query->result();
	}	
	function get_salary_template_deductions($id = ''){
		$sql = "SELECT id as deduction_id, deduction_label, deduction_amount  FROM salary_deductions
		WHERE s_template_id=$id";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function save_salary_template($data = array()){
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$table = $this->get_table();
		$grade = $data['salary_grades'];
		$basic_salary = $data['basic_salary'];
		$overtime_rate = $data['overtime_rate'];
		$gross_salary = $data['gross_salary'];
		$total_deductions = $data['total_deductions'];
		$net_salary = $data['net_salary'];
		$created_at = date('Y-m-d H:i:s');
		$created_by = $_SESSION['logged_in']['user_id'];
		$sql = "INSERT INTO salary_template 
		SET grade='$grade',
		basic_salary=$basic_salary,
		overtime_rate=$overtime_rate,
		gross_salary=$gross_salary,
		total_deductions=$total_deductions,
		net_salary=$net_salary,
		created_at='$created_at',
		created_by='$created_by' ";
		$this->db->query($sql);
		$s_template_id = $this->db->insert_id();
		if($s_template_id>0){
			$allowances_arr = array();
			$deduction_arr = array();
			if(count($data['allowances_arr'])>0){
				$i=0;
				foreach ($data['allowances_arr'] as $key => $value) {
					$allowances_arr[$i]['s_template_id'] = $s_template_id;
					$allowances_arr[$i]['allowance_label'] = $value['label_name'];
					$allowances_arr[$i]['allowance_amount'] = $value['amount'];
					$allowances_arr[$i]['created_at'] = $created_at;
					$allowances_arr[$i]['created_by'] = $created_by;
					$i++;
					// $this->db->insert('salary_allowances', $allowances_arr);
				}
				// echo "<pre>";print_r($allowances_arr);echo "</pre>";exit;
				$this->db->insert_batch('salary_allowances', $allowances_arr);
			}
			if(count($data['deductions_arr'])>0){
				$i=0;
				foreach ($data['deductions_arr'] as $key => $value) {
					$deduction_arr[$i]['s_template_id'] = $s_template_id;
					$deduction_arr[$i]['deduction_label'] = $value['label_name'];
					$deduction_arr[$i]['deduction_amount'] = $value['amount'];
					$deduction_arr[$i]['created_at'] = $created_at;
					$deduction_arr[$i]['created_by'] = $created_by;
					// $this->db->insert('salary_deductions', $deduction_arr);
				}
				$this->db->insert_batch('salary_deductions', $deduction_arr);
			}
		}
		return true;
	}
	function update_salary_template($data = array()){
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		if($data['id']){

			$table = $this->get_table();
			$id = $data['id'];
			$grade = $data['salary_grades'];
			$basic_salary = $data['basic_salary'];
			$overtime_rate = $data['overtime_rate'];
			$gross_salary = $data['gross_salary'];
			$total_deductions = $data['total_deductions'];
			$net_salary = $data['net_salary'];
			$updated_at = date('Y-m-d H:i:s');
			$created_at = date('Y-m-d H:i:s');
			$updated_by = $_SESSION['logged_in']['user_id'];
			$sql = "UPDATE salary_template 
			SET grade='$grade',
			basic_salary=$basic_salary,
			overtime_rate=$overtime_rate,
			gross_salary=$gross_salary,
			total_deductions=$total_deductions,
			net_salary=$net_salary,
			updated_at='$updated_at',
			updated_by='$updated_by' WHERE id='$id' ";
			$this->db->query($sql);
			$s_template_id = $data['id'];
			if($s_template_id>0){
				$allowances_arr = array();
				$deduction_arr = array();
				if(count($data['allowances_arr'])>0){
					foreach ($data['allowances_arr'] as $key => $value) {
						$allowances_arr['s_template_id'] = $s_template_id;
						$allowances_arr['allowance_label'] = $value['label_name'];
						$allowances_arr['allowance_amount'] = $value['amount'];
						if($value['id']!=''){
							$allowances_arr['updated_at'] = $updated_at;
							$allowances_arr['updated_by'] = $updated_by;
							$where_arr = array(
								'id'=>$s_template_id,
								's_template_id'=>$value['id']
							);
							$this->db->where($where_arr);
							$this->db->update('salary_allowances', $allowances_arr);
						}else{
							$allowances_arr['created_at'] = $created_at;
							$allowances_arr['created_by'] = $updated_by;
							$this->db->insert('salary_allowances', $allowances_arr);
						}
					}
				}
				if(count($data['deductions_arr'])>0){
					foreach ($data['deductions_arr'] as $key => $value) {
						$deduction_arr['s_template_id'] = $s_template_id;
						$deduction_arr['deduction_label'] = $value['label_name'];
						$deduction_arr['deduction_amount'] = $value['amount'];
						if($value['id']!=''){
							$deduction_arr['updated_at'] = $updated_at;
							$deduction_arr['updated_by'] = $updated_by;
							$where_arr = array(
								'id'=>$s_template_id,
								's_template_id'=>$value['id']
							);
							$this->db->where($where_arr);
							$this->db->update('salary_deductions', $deduction_arr);
						}else{
							$deduction_arr['created_at'] = $created_at;
							$deduction_arr['created_by'] = $updated_by;
							$this->db->insert('salary_deductions', $deduction_arr);
						}
					}
				}
			}
		}
		return true;
	}
}

?>