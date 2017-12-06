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
		$a=$this->session->userdata('email');
		$data['account'] = $this->m_data->get_account($a);

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
			if($email=="admin@admin.com"){
				$data_session = array(
					'email' => $email,
					'status' => "admin"
					);

				$this->session->set_userdata($data_session);
				redirect(base_url(admin));
				
			}else{

				$data_session = array(
					'email' => $email,
					'status' => "login"
					);

				$this->session->set_userdata($data_session);
				redirect(base_url());
			}
		}else{
			echo '<script language="javascript" type="text/javascript">alert("login gagal cek id dan password anda");
			window.location = "'.base_url().'Home/login"; </script>';
			$data_session = array(
				'status' => "gagal"
				);

			$this->session->set_userdata($data_session);
		}
		
			// redirect(base_url('home/login'));
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
		
		$data_session = array(
			'email' => $email,
			'status' => "login"
			);

		$this->session->set_userdata($data_session);

		echo '<script language="javascript" type="text/javascript">alert("Berhasil~");
		window.location = "'.base_url().'";</script>';
		
		// redirect(base_url('home/login'));
	}

	function edit_account(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$jeniskelamin = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$provinsi = $this->input->post('provinsi');
		$kodepos = $this->input->post('kodepos');
		$nohp = $this->input->post('nohp');

		$data = array(
				'nama' => $nama,
				'jeniskelamin' => $jeniskelamin,
				'alamat' => $alamat,
				'kota' => $kota,
				'provinsi' => $provinsi,
				'kodepos' => $kodepos,
				'nohp' => $nohp
			);

		$this->m_data->update_account($data, $id);

		redirect(base_url('home/account'));
	}

	function edit_password(){
		$oldpass = $this->input->post('oldpass');
		$newpass = $this->input->post('newpass');
		$pass = $this->input->post('pass');
		$id = $this->input->post('id');

		if(md5($oldpass) == $pass){
			$data = array('password'=>md5($newpass));
			$this->m_data->update_password($data,$id);

			echo '<script language="javascript" type="text/javascript">alert("Berhasil mengubah Password");
			window.location = "'.base_url().'Home/account"; </script>';
		}else{
			echo '<script language="javascript" type="text/javascript">alert("Gagal mengupdate password \nPassword lama Anda tidak cocok");
			window.location = "'.base_url().'Home/account"; </script>';
		}

	}
}


?>