<?php

defined('BASEPATH') or exit('No direct script access allowed');

class rekam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('Penyakit_model', 'penyakit_model');
        $this->load->model('User_model', 'user_model');
        $this->load->model('Rekam_model', 'rekam_model');
        if ($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["rekam"] = $this->rekam_model->joinTable();
        $this->load->view("admin/rekam/index", $data);
    }
    public function hasil()
    {
        $data["hasil"] = $this->rekam_model->joinHasil();
        $this->load->view("admin/rekam/hasil", $data);
    }
}
