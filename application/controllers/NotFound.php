<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NotFound extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);

		$this->load->view('404', $data);
	}
	function index(){
		
	}
}

?>
