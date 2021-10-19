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
        $data['title'] = 'Tambah Rule';

        $this->form_validation->set_rules('penyakit', 'Penyakit', 'required');
        $this->form_validation->set_rules('gejala', 'Gejala', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view("admin/rule/new_form", $data);
        } else {
            $penyakit =  $this->input->post("penyakit", TRUE);
            $gejala = $this->input->post("gejala", true);
            $nilai = $this->input->post("nilai", true);
            $idpenyakit = $this->db->get('rules')->num_rows();
            $id = $idpenyakit + 1;
            $save = [
                'idrule' => 'R' . $id,
                'penyakit_id' => $penyakit,
                'gejala_id' => $gejala,
                'nilai' => $nilai
            ];

            $this->db->insert('rules', $save);
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
            redirect(base_url("admin/rules"));
        }
    }
    // $rule = $this->rule_model;
    // $validation = $this->form_validation;
    // $validation->set_rules($rule->rules());

    // if ($validation->run()) {
    //     $rule->save();
    //     $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     redirect(site_url('admin/rules'));
    // }

    // $this->load->view("admin/rule/new_form", $data);


    public function edit($id)
    {
        $data['title'] = 'Edit Rules';
        $data['rules'] = $this->db->get_where('rules', ['id' => $id])->row_array();
        $rules = $this->db->get_where('rules', ['id' => $id])->row_array();
        $data['gejala'] = $this->gejala_model->getAll();
        $data['penyakit'] = $this->penyakit_model->getAll();

        $this->form_validation->set_rules('penyakit', 'penyakit', 'required');
        $this->form_validation->set_rules('gejala', 'gejala', 'required');
        $this->form_validation->set_rules('nilai', 'nilai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/rule/edit_form', $data);
        } else {
            $penyakit = $this->input->post('penyakit');
            $gejala = $this->input->post('gejala');
            $nilai = $this->input->post('nilai');

            $this->db->set('penyakit_id', $penyakit);
            $this->db->set('gejala_id', $gejala);
            $this->db->set('nilai', $nilai);

            $array = [
                'penyakit_id' => $penyakit,
                'gejala_id' => $gejala,
                'nilai' => $nilai
            ];
            $this->db->where(['id' => $id]);
            $this->db->update('rules', $array);
            $this->session->set_flashdata('success', 'Data Rule No.' . $rules['idrule'] . ' Telah Diupdate!');

            redirect(base_url('admin/rules'));
        }
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
