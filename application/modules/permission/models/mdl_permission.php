<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_permission extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	function get_table(){
		$table = 'role_permissions';
		return $table;
	}

	function get_all_roles(){
		$this->db->select('role_id, role_name');
		$this->db->order_by("role_id", "desc");
		$query = $this->db->get('roles');
		return $query->result();
	}

	function get_module_permissions_rolewise($role_id=''){
		if($role_id!=''){
			$this->db->select('rp.id, rp.role_id, rp.module_id, rp.p_add, rp.p_edit, rp.p_delete, rp.p_view, m.module_name');
			$this->db->from('role_permissions rp');
			$this->db->join('modules m', 'rp.module_id=m.module_id', 'left');
			$this->db->where('rp.role_id =',$role_id);
			$query = $this->db->get();
			// echo $this->db->last_query();exit;
			return $query->result();
		}
	}
	function save_role_permissions($data = array()){
		if(count($data)>0){
			$table = $this->get_table();
			$role_perm_arr = [];
			$updated_by = $_SESSION['logged_in']['user_id'];
			$updated_at = date('Y-m-d H:i:s');
			$role_id = $data['role_id'];
			foreach ($data as $key => $val) {
				$temp_perm1 = $temp_perm2 = $permission_col_name = '';
				if($key != 'save_permissions' && $key != 'role_id'){
                    $temp_perm = explode('_',$key);
                    // print_r($temp_perm);
                    $permission_col_name = 'p_'.$temp_perm[0];
                    // echo $permission_col_name;exit;
                    $row_id = $temp_perm[1];

					$sql = "UPDATE role_permissions SET $permission_col_name='$val', updated_by='$updated_by', updated_at='$updated_at' WHERE id=$row_id AND role_id=$role_id";
					$this->db->query($sql);

					// $where_arr = array('id = '=>$val, 'role_id = '=>$data['role_id'] );
					// $this->db->where($where_arr);
					// $this->db->update($table, $role_perm_arr);
					// echo $this->db->last_query();exit;
                }
			}
			// echo "<pre>";print_r($attendance_arr);echo "</pre>";exit;
			return true;
		}
	}
	

}

?>