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
	function update_account($data, $where){
		$this->db->where('iduser',$where);
		$this->db->update('account',$data);
	}
	function update_password($data, $where){
		$this->db->where('iduser',$where);
		$this->db->update('account',$data);
	}
	function get_all_book($number,$offset){//pagination
	
		return $query = $this->db->get('buku',$number,$offset)->result();
		//$query = $this->db->get("buku");
		//$result = $query->result_array();
		//return $result;
	}
		function jumlah_buku(){//pagination
		return $this->db->get('buku')->num_rows();
	}
}