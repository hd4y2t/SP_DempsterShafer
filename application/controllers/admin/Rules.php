<?php

defined('BASEPATH') or exit('No direct script access allowed');

class rules extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model("rule_model");
        // $this->load->model("user_model");

        $this->load->model('Rule_model', 'rule_model');
        $this->load->model('User_model', 'user_model');
        $this->load->model('Gejala_model', 'gejala_model');
        $this->load->model('Penyakit_model', 'penyakit_model');
        if ($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["rules"] = $this->rule_model->joinTable();
        $this->load->view("admin/rule/list", $data);
    }

    public function add()
    {
        // $data["rules"] = $this->rule_model->getAll();
        $data['gejala'] = $this->gejala_model->getAll();
        $data['penyakit'] = $this->penyakit_model->getAll();
        $rule = $this->rule_model;
        $validation = $this->form_validation;
        $validation->set_rules($rule->rules());

        if ($validation->run()) {
            $rule->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/rules'));
        }

        $this->load->view("admin/rule/new_form", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/rules');

        $rule = $this->rule_model;
        $validation = $this->form_validation;
        $validation->set_rules($rule->rules());

        if ($validation->run()) {
            $rule->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/rules'));
        }
        $data["rule"] = $rule->getById($id);
        if (!$data["rule"]) show_404();

        $this->load->view("admin/rule/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) {
            show_404();
        } else {

            $this->rule_model->delete($id);

            redirect(site_url('admin/rules'));
        }
    }
}
