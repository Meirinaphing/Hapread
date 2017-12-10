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
		
        // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        $crud->set_theme('datatables');
		$crud->set_table('buku');
		
        // custom field yang ingin ditampilkan
        $crud->columns('judul','gambar','stock','harga');
	
		
        // set validation rule
 		$crud->field_type('genre','multiselect',
			   array( "Action"=>"Action","Fantasy"=>"Fantasy","Horror"=>"Horror","Thriller"=>"Thriller","Romance"=>"Romance","Comedy"=>"Comedy","Sci-fi"=>"Sci-fi"));
 		$crud->field_type('category','multiselect',
			   array( "Management" => "Management","Accounting" => "Accounting","Business" => "Business","Fiction" => "Fiction","Economics"=>"Economics","Politics"=>"Politics","Education"=>"Education","Comics"=>"Comics","Magazine"=>"Magazine","Story book"=>"Story book","Astronomy"=>"Astronomy","Biology"=>"Biology","Chemistry"=>"Chemistry","Computer"=>"Computer","Hacking"=>"Hacking","Artificial Intelligence"=>"Artificial Intelligence","Machine Learning"=>"Machine Learning","Business Intelligence"=>"Business Intelligence","Interior Design"=>"Interior Design","Graphic Design"=>"Graphic Design","Fashion Design"=>"Fashion Design"));	
 		$crud->required_fields('judul','sinopsis','gambar','cover_back','harga','stock');   

        //upload
		$crud->set_field_upload('gambar','assets/buku');
		$crud->set_field_upload('cover_back','assets/buku');
		
		// simpan hasilnya kedalam variabel output
        $output = $crud->render();
        $this->load->view('v_admin', $output);
		
		
		
 		//$data['a'] =$this->session->userdata('status');
		//$this->load->view('v_admin',$data);
		
	}

	public function slideshow() {
        // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        $crud->set_theme('datatables')
		->set_table('slideshow')
		
        // custom field yang ingin ditampilkan
        ->columns('judul','sinopsis','gambar')
		
        // set validation rule
 		->required_fields('judul','sinopsis','gambar')   

        //upload
		->set_field_upload('gambar','assets/slideshow');
		
		// simpan hasilnya kedalam variabel output
        $output = $crud->render();
        $this->load->view('v_admin', $output);
    }

    public function contact() {
        // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        $crud->set_theme('datatables')
		->set_table('contact')
		
        // custom field yang ingin ditampilkan
        ->columns('nama','subject','message')
		
        // set validation rule
 		->required_fields('nama','email','subject','message'); 
		
		// Hilangkan delete, add, dan edit
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_add();

		// simpan hasilnya kedalam variabel output
        $output = $crud->render();
        $this->load->view('v_admin', $output);
    }
	
    public function account() {
        // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        $crud->set_theme('datatables');
		$crud->set_table('account');
		
        // custom field yang ingin ditampilkan
        $crud->columns('email','nama','jeniskelamin','banyakpesanan');
		$crud->field_type('jeniskelamin','dropdown',array('Pria' => 'Pria', 'Wanita' => 'Wanita'));
		$crud->field_type('password', 'password');
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
        
        // Hilangkan delete, add, dan edit
        $crud->unset_delete();
        $crud->unset_edit();
        $crud->unset_add();

		$crud->callback_before_insert(array($this,'encrypt_pw'));
		$crud->callback_before_update(array($this,'encrypt_pw'));
		// simpan hasilnya kedalam variabel output
        $output = $crud->render();
        $this->load->view('v_admin', $output);
    }
	
	 function encrypt_pw($post_array) {
			    if(!empty($post_array['password'])) {
					    $post_array['password'] = md5($_POST['password']);
			    }
			    return $post_array;
	    }
}
?>