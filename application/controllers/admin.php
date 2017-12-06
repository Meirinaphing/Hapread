<?php
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		$this->load->helper('url');	
		$this->load->model('m_login');
		$this->load->model('m_data');
	
	
		if($this->session->userdata('status') != "admin"){
			redirect(base_url("login"));
		
		}
		
	}
 
	function index(){
		
		
 		$data['a'] =$this->session->userdata('status');
		$this->load->view('v_admin',$data);
		
	}
    public function account() {
        // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        $crud->set_theme('datatables');
		$crud->set_table('account');
		
        // custom field yang ingin ditampilkan
        $crud->columns('email','nama','jeniskelamin','banyakpesanan');
		$crud->field_type('jeniskelamin','dropdown',
array('Pria' => 'Pria', 'Wanita' => 'Wanita'));
		$crud->field_type('password', 'password');
		$crud->callback_before_insert(array($this,'encrypt_pw'));
		$crud->field_type('nohp', 'integer');
		
        // set validation rule
        $crud->set_rules('email','email','valid_email');
        $crud->set_rules('email','email','required');
        $crud->set_rules('password','password','required');
        $crud->set_rules('jeniskelamin','jeniskelamin','required');
        $crud->set_rules('alamat','alamat','required');
        $crud->set_rules('nama','nama','required');
        $crud->set_rules('kota','kota','required');
        $crud->set_rules('nohp','nohp','required');
        $crud->set_rules('provinsi','provinsi','required');
        $crud->set_rules('kodepos','kodepos','required');
        
        
		// simpan hasilnya kedalam variabel output
        $output = $crud->render();
        $this->load->view('coba', $output);
    }
	
	 function encrypt_pw($post_array) {
			    if(!empty($post_array['password'])) {
					    $post_array['password'] = md5($_POST['password']);
			    }
			    return $post_array;
	    }
}
?>