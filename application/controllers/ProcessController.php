<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProcessController extends CI_Controller {
	public function index(){

	}

	public function pinjam(){
    $opt = $this->input->post("pinjamruangan");
    //echo $opt;
		if ($opt == "rapat") {
			$data['judul'] = "Peminjaman Ruangan - Rapat";
	    $data['css'] = base_url()."Assets/Users/Css/main.css";

			$this->load->view('User-page/Template/Header', $data);
			$this->load->view('User-page/Dashboard/praktikum');
	    $this->load->view('User-page/Template/Footer');
		}else if($opt == "kelas"){
			$this->load->model('GetDataModel');
			$data_kelas['kelas'] = $this->GetDataModel->get_data_kelas();
			$data_kelas['dosen'] = $this->GetDataModel->get_data_dosen();

			$data['judul'] = "Peminjaman Ruangan - Kelas Pengganti";
	    $data['css'] = base_url()."Assets/Users/Css/main.css";

			$this->load->view('User-page/Template/Header', $data);
			$this->load->view('User-page/Dashboard/kelas', $data_kelas);
	    $this->load->view('User-page/Template/Footer');
		}
	}

	public function pembimbing(){
		$this->load->view('Regist/index');
	}

	public function input_pesan(){
		$nama = $this->input->post("nama");
		$email = $this->input->post("email");
		$subject = $this->input->post("subject");
		$pesan = $this->input->post("pesan");

		$this->load->model('InputDataModel');
		$this->InputDataModel->input_data_pesan($nama, $email, $subject, $pesan);
		$this->session->set_flashdata('log_pesan', 'TRUE');
		redirect(base_url("Contact"));
	}

	public function input_transaksi_kelas(){
		$nama = $this->input->post("nama");
		$ruang = $this->input->post("ruang");
		$jam_masuk = $this->input->post("jam_masuk");
		$pinjamruangan = $this->input->post("pinjamruangan");
		$matakuliah = $this->input->post("matakuliah");
		$kode_dosen = $this->input->post("kode_dosen");
		$tanggal = $this->input->post("tanggal");
		$kebutuhan = $this->input->post("kebutuhan");

		$this->load->model('InputDataModel');
		$this->InputDataModel->input_data_kelas_pengganti($nama, $ruang, $jam_masuk, $pinjamruangan, $matakuliah, $kode_dosen, $tanggal, $kebutuhan);
		$this->session->set_flashdata('log_kelas', 'TRUE');
		redirect(base_url("Status"));
	}

	public function cancel_transaksi_kelas(){
		$id = $this->input->post("id");

		$this->load->model('UpdateDataModel');
		$this->UpdateDataModel->update_data_kelas_pengganti($id);

		$this->session->set_flashdata('log_kelas_cancel', 'TRUE');
		redirect(base_url("Status"));
	}

}
