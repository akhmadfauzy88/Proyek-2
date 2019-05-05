<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function Dashboard()
	{

		$this->load->model('GetAdminModel');
		$data['jml_penjadwalan'] = $this->GetAdminModel->get_penjadwalan();
		$data['jml_penjadwalan_kelas'] = $this->GetAdminModel->get_penjadwalan_kelas('kelas');
		$data['jml_penjadwalan_praktikum'] = $this->GetAdminModel->get_penjadwalan_kelas('praktikum');

		$data['transaksi_kelas'] = $this->GetAdminModel->req_kelas();
		$data['transaksi_praktikum'] = $this->GetAdminModel->req_praktikum();

    $this->load->view('Admin/Template/Header');
		$this->load->view('Admin/Dashboard/index', $data);
    $this->load->view('Admin/Template/Footer');
	}

	public function pesan(){
		$this->load->model('GetAdminModel');
		$data['pesan'] = $this->GetAdminModel->get_pesan();;

    $this->load->view('Admin/Template/Header');
		$this->load->view('Admin/Pesan/index', $data);
		//$this->load->view('Admin/Pesan/index');
    $this->load->view('Admin/Template/Footer');
	}

	public function terima_request(){
		$terima = $this->input->post("terima");
		$tolak = $this->input->post("tolak");
		$id = $this->input->post("id");
		$status = $this->input->post("status");

		$this->load->model('GetAdminModel');

		if (isset($terima)) {
			if ($status == 'kelas') {
				$this->GetAdminModel->respon_transaksi_kelas($id, 'approved');
				redirect(base_url());
			}elseif ($status == 'praktikum') {
				$this->GetAdminModel->respon_transaksi_kelas($id, 'approved');
				redirect(base_url());
			}
		}elseif (isset($tolak)) {
			if ($status == 'kelas') {
				$this->GetAdminModel->respon_transaksi_kelas($id, 'declined');
				redirect(base_url());
			}elseif ($status == 'praktikum') {
				$this->GetAdminModel->respon_transaksi_kelas($id, 'declined');
				redirect(base_url());
			}
		}else{
			echo "data tidak ada";
		}
	}
}
