<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('Gejala_model', 'gejala_model');
	}
	public function index()
	{
		$data["gejala"] = $this->gejala_model->getAll();
		$this->load->view('home/template/header', $data);
		$this->load->view('home/index.php', $data);
		$this->load->view('home/template/footer', $data);
	}
	// public function index()
	// {
	// 	$this->load->view('admin/login_page');
	// }
}
