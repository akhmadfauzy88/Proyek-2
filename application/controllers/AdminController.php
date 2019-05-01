<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function Dashboard()
	{

		$this->load->model('GetAdminModel');
		$data['jml_penjadwalan'] = $this->GetAdminModel->get_penjadwalan();
		$data['jml_penjadwalan_kelas'] = $this->GetAdminModel->get_penjadwalan_kelas();

    $this->load->view('Admin/Template/Header');
		$this->load->view('Admin/Dashboard/index', $data);
    $this->load->view('Admin/Template/Footer');
	}
}
