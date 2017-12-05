<?php 
 
class M_data extends CI_Model{
	function tampil_account($where,$table){
		return $this->db->get_where($table,$where);
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function get_account($email){
		$query = $this->db->get_where("account", array('email' => $email));
		$result = $query->result_array();
		return $result;
	}
}