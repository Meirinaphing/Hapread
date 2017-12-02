<?php
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "admin"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		
 			$data['a'] =$this->session->userdata('status');
		$this->load->view('v_admin',$data);
	}
}
?>