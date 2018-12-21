<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('Model_customer');
	}

	public function index() {
		$this->load->view('admin/index');
	}
	public function login() {
		$this->load->view('login');
	}
	public function loginAction() {
		redirect(base_url("index.php/admin/index"));
	}
	public function customer() {
		$data['query'] = $this->Model_customer->tampil();
		$this->load->view('admin/customer', $data);
	}
	public function customerTambah(){
		$this->load->view('admin/customerForm');	
	}

	public function save(){
		$data = array('Nama' => $this->input->post('Nama'), 'Email' => $this->input->post('Email'), 'No_telp' => $this->input->post('No_telp'), 'Instagram' => $this->input->post('Instagram'), 'Tanggal_lahir' => $this->input->post('Tanggal_lahir'), 'Pekerjaan' => $this->input->post('Pekerjaan'),'Universitas' => $this->input->post('Universitas'));


		$proses = $this->Model_customer->save($data);
		if (!$proses){
			redirect(base_url("index.php/admin/customer"));
		} else {
			echo "Data Gagal disimpan";
			echo "<br>";
			echo "<a href='".base_url('index.php/admin/customer')."'>Kembali</a>";
		}
	}

	public function customerEdit(){
		$ID = $this->uri->segment(3);
		$data['query'] = $this->Model_customer->edit($ID);
		$this->load->view('admin/customerEdit', $data);	
	}

	public function update(){
		$ID = $this->input->post('ID');
		$data = array('Nama' => $this->input->post('Nama'), 'Email' => $this->input->post('Email'), 'No_telp' => $this->input->post('No_telp'), 'Instagram' => $this->input->post('Instagram'), 'Tanggal_lahir' => $this->input->post('Tanggal_lahir'), 'Pekerjaan' => $this->input->post('Pekerjaan'),'Universitas' => $this->input->post('Universitas'));

		$proses = $this->Model_customer->update($ID, $data);
		if (!$proses){
			redirect(base_url("index.php/admin/customer"));
		} else {
			echo "Data Gagal diubah";
			echo "<br>";
			echo "<a href='".base_url('index.php/admin/customer')."'>Kembali</a>";
		}
	}

	public function delete(){
		$id = $this->uri->segment(3);
		$proses = $this->Model_customer->delete($id);
		if (!$proses){
			redirect(base_url("index.php/admin/customer"));
		} else {
			echo "Data Gagal dihapus";
			echo "<br>";
			echo "<a href='".base_url('index.php/admin/customer')."'>Lihat data</a>";
		}
	}

	public function company() {
		$this->load->view('admin/company');
	}
	public function companyTambah(){
		$this->load->view('admin/companyForm');	
	}
	public function library() {
		$this->load->view('admin/library');
	}
	public function libraryTambah(){
		$this->load->view('admin/libraryForm');	
	}
	public function product() {
		$this->load->view('admin/product');
	}
	public function productTambah(){
		$this->load->view('admin/productForm');	
	}
	public function post(){
		$this->load->view('admin/posts');	
	}
}
