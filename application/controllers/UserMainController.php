<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserMainController extends CI_Controller {
	public function index(){

		$this->load->model('GetDataModel');
		$status['transaksi'] = $this->GetDataModel->get_penjadwalan();
		//$status['praktikum'] = $this->GetDataModel->get_pinjam_praktikum();

    $data['judul'] = "Landing Page";
    $data['css'] = base_url()."Assets/Users/Css/main.css";

    $this->load->view('User-page/Template/Header', $data);
		$this->load->view('User-page/Dashboard/index', $status);
    $this->load->view('User-page/Template/Footer');
	}

	public function status(){

		$id = $this->session->userdata('id');

		$this->load->model('GetDataModel');
		$status['kelas'] = $this->GetDataModel->get_status_kelas($id);
		//$status['praktikum'] = $this->GetDataModel->get_status_praktikum($id);

    $data['judul'] = "Status Peminjaman";
    $data['css'] = base_url()."Assets/Users/Css/main.css";

    $this->load->view('User-page/Template/Header', $data);
		$this->load->view('User-page/Dashboard/status', $status);
    $this->load->view('User-page/Template/Footer');
	}

	public function history(){

		$id = $this->session->userdata('id');

		$this->load->model('GetDataModel');
		$history['kelas'] = $this->GetDataModel->get_history_kelas($id);
		$history['praktikum'] = $this->GetDataModel->get_history_praktikum($id);

    $data['judul'] = "History Peminjaman";
    $data['css'] = base_url()."Assets/Users/Css/main.css";

    $this->load->view('User-page/Template/Header', $data);
		$this->load->view('User-page/Dashboard/history', $history);
    $this->load->view('User-page/Template/Footer');
	}

  public function contact(){

		$this->load->model('GetDataModel');
		$data_kelas['kelas'] = $this->GetDataModel->get_data_kelas();

    $data['judul'] = "Contact US";
    $data['css'] = base_url()."Assets/Users/Css/main.css";

    $this->load->view('User-page/Template/Header', $data);
		$this->load->view('User-page/Dashboard/contact', $data_kelas);
    $this->load->view('User-page/Template/Footer');
	}
}
