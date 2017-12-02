<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	function __construct(){
		parent::__construct();	
		$this->load->helper('url');	
		$this->load->model('m_login');
		$this->load->model('m_data');
 
	}

	public function index(){
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);
		
		$this->load->view('homeview', $data);
	}

	public function detail(){
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('detailview', $data);
	}

	public function shop(){
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('shopview', $data);
	}

	public function contact(){
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('contactview', $data);
	}

	public function login(){
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('loginview', $data);
	}

	public function cart(){
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('cartview', $data);
	}

	public function checkout(){
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('checkoutview', $data);
	}

	public function account(){
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);
		
		
		$this->load->view('accountview', $data);
	}
	
	function aksi_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("account",$where)->num_rows();
		
		if($cek > 0){
 
			$data_session = array(
				'email' => $email,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
			redirect(base_url());
 
		}else{
		echo '<script language="javascript" type="text/javascript">
		alert("login gagal cek id dan password anda");
	</script>';
		}
		
			redirect(base_url('home/login'));
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	function regis(){
		$nama = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('pass');
		$jeniskelamin = $this->input->post('jk');
 
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'password' => md5($password),
			'jeniskelamin' =>$jeniskelamin,
						
			);
		$this->m_data->input_data($data,'account');
		redirect(base_url('home/login'));
	}
}


?>