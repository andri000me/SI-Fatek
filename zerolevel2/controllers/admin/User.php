<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct() {
		
		parent::__construct();
		$this->load->model(array('Tabel_user'));

		if (!isset($this->session->userdata['logged_in_portal']['admin'])) {
			redirect(site_url('login'));
		}
		
	}

	public function index() {
		
		$data['pageTitle'] 	= "Kelola User";
		$data['body_page'] 	= "body/admin/user";
		$data['menu_page'] 	= "menu/admin";
		$data['users'] 		= $this->Tabel_user->get();

		$this->load->view(SITE_THEME,$data);
	}

	public function tambah() {

		$this->form_validation->set_rules('nama', 'Nama User', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('grup', 'Grup', 'trim');
		$this->form_validation->set_rules('namaUnit', 'Nama Unit', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == TRUE) {

			$database['nama']		= $this->input->post('nama');
			$database['username']	= $this->input->post('username');
			$database['grup'] 		= $this->input->post('grup');
			$database['namaUnit'] 	= $this->input->post('namaUnit');
			$database['kodeUnit'] 	= $this->input->post('kodeUnit');
			$database['password'] 	= md5($this->input->post('password'));
			$this->Tabel_user->tambah($database);
			
			$this->session->set_flashdata('type', 'success');
			$this->session->set_flashdata('message', 'Berhasil di simpan!');

			

		} else {

			$this->session->set_flashdata('type', 'danger');
			$this->session->set_flashdata('message', validation_errors('Gagal di simpan! '));
		}

		redirect(site_url('admin/user'));
	
	}

	public function edit() {

		$this->form_validation->set_rules('nama', 'Nama User', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('grup', 'Grup', 'trim');
		$this->form_validation->set_rules('namaUnit', 'Nama Unit', 'required');
		
		if ($this->form_validation->run() == TRUE) {

			$database['userId']		= $this->input->post('userId');
			$database['nama']		= $this->input->post('nama');
			$database['username']	= $this->input->post('username');
			$database['grup'] 		= $this->input->post('grup');
			$database['namaUnit'] 	= $this->input->post('namaUnit');
			$database['kodeUnit'] 	= $this->input->post('kodeUnit');
			if ($this->input->post('password')) $database['password'] = md5($this->input->post('password'));
			$this->Tabel_user->update($database);
			
			$this->session->set_flashdata('type', 'success');
			$this->session->set_flashdata('message', 'Berhasil di simpan!');

		} else {

			$this->session->set_flashdata('type', 'danger');
			$this->session->set_flashdata('message', validation_errors('Gagal di simpan! '));
		}

		redirect(site_url('admin/user'));
	
	}	
	
	public function delete() {

		$id 		= $this->input->post('userId');
		$response 	= $this->Tabel_user->delete($id);

		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('message', 'Berhasil di hapus!');

	}

	public function detail($id) {

		$output = $this->Tabel_user->detail(array('userId'=> $id));
		echo json_encode($output);

	}	

}