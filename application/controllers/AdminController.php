<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function Dashboard()
	{
    $this->load->view('Admin/Template/Header');
		$this->load->view('Admin/Dashboard/index');
    $this->load->view('Admin/Template/Footer');
	}
}
