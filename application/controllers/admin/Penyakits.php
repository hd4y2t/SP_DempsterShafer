<?php

defined('BASEPATH') or exit('No direct script access allowed');

class penyakits extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Penyakit_model', 'penyakit_model');
        $this->load->model('User_model', 'user_model');
        if ($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["penyakits"] = $this->penyakit_model->getAll();
        $this->load->view("admin/penyakit/list", $data);
    }

    public function add()
    {
        $penyakit = $this->penyakit_model;
        $validation = $this->form_validation;
        $validation->set_rules($penyakit->rules());

        if ($validation->run()) {
            $penyakit->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/penyakits'));
        }

        $this->load->view("admin/penyakit/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/penyakits');

        $penyakit = $this->penyakit_model;
        $validation = $this->form_validation;
        $validation->set_rules($penyakit->rules());

        if ($validation->run()) {
            $penyakit->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/penyakits'));
        }
        $data["penyakit"] = $penyakit->getById($id);
        if (!$data["penyakit"]) show_404();

        $this->load->view("admin/penyakit/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) {
            show_404();
        } else {
            $this->penyakit_model->delete($id);

            redirect(site_url('admin/penyakits'));
        }
    }
}
