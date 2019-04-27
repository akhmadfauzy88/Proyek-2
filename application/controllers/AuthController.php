<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
	public function index(){
		$this->load->view('Auth/Login-Page/index');
	}

	public function login(){
		$user = $this->input->post('username');
		$pass = $this->input->post('pass');

		$this->load->model('LoginModel');
		$mhs = $this->LoginModel->get_auth_mhs($user, $pass);
		$tch = $this->LoginModel->get_auth_tch($user, $pass);
		$lak = $this->LoginModel->get_auth_lak($user, $pass);

		if (isset($mhs)) {
			$data = array(
				'id' => $mhs['id'],
				'nama' => $mhs['nama_depan'],
				'nama_b' => $mhs['nama_belakang'],
				'kelas' => $mhs['kelas'],
				'nim' => $mhs['nim'],
				'email' => $mhs['email'],
				'logged_in' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url("Dashboard"));
		}elseif (isset($tch)) {
			$data = array(
				'id' => $tch['id'],
				'nama' => $tch['nama_depan'],
				'nama_b' => $tch['nama_belakang'],
				'email' => $tch['email'],
				'nip' => $tch['nip'],
				'logged_in' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url("Dashboard"));
		}elseif (isset($lak)) {
			$data = array(
				'id' => $lak['id'],
				'nama' => $lak['nama_depan'],
				'nama_b' => $lak['nama_belakang'],
				'email' => $lak['email'],
				'id_peg' => $lak['id_peg'],
				'logged_in' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url("Admin/Dashboard"));
		}else {
			$this->session->set_flashdata('error', 'TRUE');
			redirect(base_url());
		}

		// if (isset($data)) {
		// 	if ($data['status_id']==1) {
		// 		echo "SuperAdmin";
		// 	}elseif ($data['status_id']==2) {
		//
		// 	}else{
		// 		redirect(base_url("Dashboard"));
		// 	}
		// }else {
		// 	echo "salah";
		// }


	}

	public function logout(){
		$array_items = array('nama_depan', 'nim', 'logged_in');
		$logout = $this->input->post('logout');
		if (isset($logout)) {
			$this->session->unset_userdata($array_items);
			$this->session->set_flashdata('log_', 'TRUE');
			redirect(base_url());
		}else {
			redirect(base_url("Dashboard"));
		}
	}
}
