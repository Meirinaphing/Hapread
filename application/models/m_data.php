<?php
 
class M_data extends CI_Model{

	function tampil_jual($email,$number,$offset){
		$this->db->like('email',$email);
		$this->db->order_by('idjual', 'DESC');
		return $query = $this->db->get('jual',$number,$offset)->result();
	}
	function tampil_account($where,$table){
		return $this->db->get_where($table,$where);
	}
	function tampil_buku($idbuku){
		$query=$this->db->get_where('buku',array('idbuku' => $idbuku));
		$result = $query->result_array();
		return $result;
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function get_account($email){
		$query = $this->db->get_where("account", array('email' => $email));
		$result = $query->result_array();
		return $result;
	}
	function update_stock($data, $where){
		$this->db->where('idbuku',$where);
		$this->db->update('buku',$data);
	}
	function update_account($data, $where){
		$this->db->where('iduser',$where);
		$this->db->update('account',$data);
	}
	function update_region($data, $where){
		$this->db->where('email',$where);
		$this->db->update('account',$data);
	}
	function get_all_book($number,$offset){//pagination
		$this->db->order_by('idbuku', 'DESC');
		return $query = $this->db->get('buku',$number,$offset)->result();
		//$query = $this->db->get("buku");
		//$result = $query->result_array();
		//return $result;
	}

	function jumlah_buku(){//pagination
		return $this->db->get('buku')->num_rows();
	}
	function jumlah_jual($where){//pagination
		$this->db->like('email',$where);
		return $this->db->get('jual')->num_rows();
	}
	function get_all_book_c($where,$number,$offset){//pagination
		$this->db->like('judul',$where);
		$this->db->or_like('category',$where);
		$this->db->or_like('genre',$where);
		$this->db->or_like('pengarang',$where);
		$this->db->or_like('idbuku',$where);
		$this->db->or_like('penerbit',$where);
	
		return $query = $this->db->get('buku',$number,$offset)->result();
		//$query = $this->db->get("buku");
		//$result = $query->result_array();
		//return $result;
	}
	function jumlah_buku_c($where){//pagination
		$this->db->order_by('idbuku', 'DESC');
		
		$this->db->like('judul',$where);
		$this->db->or_like('category',$where);
		$this->db->or_like('genre',$where);
		$this->db->or_like('pengarang',$where);
		$this->db->or_like('idbuku',$where);
		$this->db->or_like('penerbit',$where);
		return $this->db->get('buku')->num_rows();
	}
	function get_temp($email){
		$query = $this->db->get_where("k_temp", array('email' => $email));
		$result = $query->result_array();
		return $result;
	}
	
	function edit_data($table,$where){		
		$query = $this->db->get_where($table,$where);
		$result = $query->result_array();
		return $result;
	}
	function cek_temp($email,$idbuku){
		return $this->db->get_where("k_temp", array('email' => $email,'idbuku' => $idbuku));
	}
	function cek_jual(){
		return $this->db->get('jual');
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function slideshow($table){
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}
	
}