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
		$data['ss'] = $this->m_data->slideshow();

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
		//atur css paggination
		$config['query_string_segment'] = 'start';
 		$config['full_tag_open'] = '<div><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
 		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
 		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
 		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->load->database();
		$jumlah_data = $this->m_data->jumlah_buku();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'home/shop';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 12;//jumlah item yang di tampilkan
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['buku'] = $this->m_data->get_all_book($config['per_page'],$from);
	
		
		
		//$data['get_all_book'] = $this->m_data->get_all_book();
		
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('shopview', $data);
	}

	public function contact(){
		$a=$this->session->userdata('email');
		$data['account'] = $this->m_data->get_account($a);

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
		$a=$this->session->userdata('email');
		$data['temp'] = $this->m_data->get_temp($a);
		
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('cartview', $data);
	}
	function input_cart($idbuku){
		$email=$this->session->userdata('email');
		$cek = $this->m_data->cek_temp($email,$idbuku)->num_rows();
		if($cek>0){
		$datatemp = $this->m_data->edit_data("k_temp", array('email' => $email,'idbuku' => $idbuku));
		foreach ($datatemp as $dat) { 
				$harga=$dat['harga'];
				$jum=$dat['jumlah'];
			}
			$jum++;
			$tot=$jum*$harga;
		$data = array(
			'jumlah' => $jum,
			'totharga' => $tot
		);
	 
		$where = array(
		'email' => $email,'idbuku' => $idbuku
		);
	 
		$this->m_data->update_data($where,$data,'k_temp');
		$hasil=$this->m_data->get_temp($email);
			$jumlah=0;
				foreach ($hasil as $ju) {
							$jumlah+=$ju['jumlah'];
					}
		echo $jumlah;
			
			}else{
		$databuku = $this->m_data->tampil_buku($idbuku);
			foreach ($databuku as $row) { 
				$harga=$row['harga'];
			}
		$jumlah=1;
		$data = array(
			'email' => $email,
			'idbuku' => $idbuku,
			'jumlah' => $jumlah,
			'harga' => $harga,
			'totharga' => $harga
			);
		$this->m_data->input_data($data,'k_temp');
			$hasil=$this->m_data->get_temp($email);
			$jumlah=0;
				foreach ($hasil as $ju) {
							$jumlah+=$ju['jumlah'];
					}
		echo $jumlah;
		}
	}
	function reloadcart($idbuku){
			
		$email=$this->session->userdata('email');
			$hasil=$this->m_data->get_temp($email);
			$jumlah=0;
				foreach ($hasil as $ju) {
							$jumlah+=$ju['jumlah'];
					}
		echo $jumlah;
	
	}
	function tambah_cart($idbuku){
		$email=$this->session->userdata('email');
		$datatemp = $this->m_data->edit_data("k_temp", array('email' => $email,'idbuku' => $idbuku));
		foreach ($datatemp as $dat) { 
				$harga=$dat['harga'];
				$jum=$dat['jumlah'];
			}
			$jum++;
			$tot=$jum*$harga;
		$data = array(
			'jumlah' => $jum,
			'totharga' => $tot
		);
	 
		$where = array(
		'email' => $email,'idbuku' => $idbuku
		);
	 
		$this->m_data->update_data($where,$data,'k_temp');
		
		
				$a=$this->session->userdata('email');
		$data['temp'] = $this->m_data->get_temp($a);
		
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('ajax_keranjang',$data);
	
			
	}
	
	function kurang_cart($idbuku){
		$email=$this->session->userdata('email');
		$datatemp = $this->m_data->edit_data("k_temp", array('email' => $email,'idbuku' => $idbuku));
		foreach ($datatemp as $dat) { 
				$harga=$dat['harga'];
				$jum=$dat['jumlah'];
			}
			$jum--;
			if($jum<1){
				$jum=1;
				}
			$tot=$jum*$harga;
		$data = array(
			'jumlah' => $jum,
			'totharga' => $tot
		);
	 
		$where = array(
		'email' => $email,'idbuku' => $idbuku
		);
	 
		$this->m_data->update_data($where,$data,'k_temp');
		
		
		
		$a=$this->session->userdata('email');
		$data['temp'] = $this->m_data->get_temp($a);
		
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('ajax_keranjang',$data);
	
	}
		

	function hapus_cart($id){
		$email=$this->session->userdata('email');
		$where = array('idbuku' => $id,'email'=> $email);
		$this->m_data->hapus_data($where,'k_temp');
		redirect('home/cart');
	}



	public function checkout(){
		$a=$this->session->userdata('email');
		$data['temp'] = $this->m_data->get_temp($a);
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('checkoutview', $data);
	}
	function refreshcart($idbuku){
			
		$a=$this->session->userdata('email');
		$data['temp'] = $this->m_data->get_temp($a);
		$data['js'] = $this->load->view('js', NULL, TRUE);
		$data['css'] = $this->load->view('css', NULL, TRUE);
		$data['header'] = $this->load->view('header', NULL, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		$data['left'] = $this->load->view('leftsidebar', NULL, TRUE);

		$this->load->view('ajax_checkout', $data);
	
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
	function update_region($region){

		$id=$this->session->userdata('email');
		$data = array(
				'provinsi' => $region,
			);

		$this->m_data->update_region($data, $id);
		
		
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

	function insert_contact(){
		$name = $this->input->post('name');
		$subject = $this->input->post('subject');
		$email = $this->input->post('email');
		$message = $this->input->post('message');

		$data = array(
				'nama' => $name,
				'email' => $email,
				'subject' => $subject,
				'message' => $message
			);

		$this->m_data->input_data($data,"contact");

		echo '<script language="javascript" type="text/javascript">alert("Pesan Anda Telah Terkirim");
		window.location = "'.base_url().'Home/contact"; </script>';
	}
}


?>