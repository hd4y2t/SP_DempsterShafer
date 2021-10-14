<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pengguna  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model', 'user_model');
        $this->load->model('Pengguna_model', 'pengguna_model');
        if ($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["pengguna"] = $this->pengguna_model->getAll();
        $this->load->view("admin/pengguna/index", $data);
    }
}
