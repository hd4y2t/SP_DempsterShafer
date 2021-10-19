<?php

defined('BASEPATH') or exit('No direct script access allowed');

class gejalas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model("gejala_model");
        // $this->load->model("user_model");
        $this->load->model('Gejala_model', 'gejala_model');
        $this->load->model('User_model', 'user_model');
        if ($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["gejalas"] = $this->gejala_model->getAll();
        $this->load->view("admin/gejala/list", $data);
    }

    public function add()
    {
        $gejala = $this->gejala_model;
        $validation = $this->form_validation;
        $validation->set_rules($gejala->rules());

        if ($validation->run()) {
            $gejala->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/gejalas'));
        }

        $this->load->view("admin/gejala/new_form");
    }

    public function edit($id)
    {
        if (!isset($id)) redirect('admin/gejalas');

        $gejala = $this->gejala_model;
        $validation = $this->form_validation;
        $validation->set_rules($gejala->rules());

        if ($validation->run()) {
            $gejala->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/gejalas'));
        }
        $data["gejala"] = $gejala->getById($id);
        if (!$data["gejala"]) show_404();

        $this->load->view("admin/gejala/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) {
            show_404();
        } else {

            $this->gejala_model->delete($id);

            redirect(site_url('admin/gejalas'));
        }
    }
}
