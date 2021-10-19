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
        // $data['users'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Penyakit';

        $this->form_validation->set_rules('nama', 'Nama opt', 'required');
        $this->form_validation->set_rules('jenis', 'jenis', 'required');
        $this->form_validation->set_rules('nkimia', 'nkimia', 'required');
        $this->form_validation->set_rules('kimia', 'kimia', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view("admin/penyakit/new_form");
        } else {
            $id = $this->input->post('id', true);
            $nama =  $this->input->post("nama", TRUE);
            $jenis = $this->input->post("jenis", true);
            $nkimia = $this->input->post("nkimia", true);
            $kimia =  $this->input->post("kimia", TRUE);
            // $foto =  $this->input->post("foto", TRUE);
            $idpenyakit = $this->db->get('penyakit')->num_rows();
            $id = $idpenyakit + 1;
            $foto = 'P' . $id . '.png';
            $config['upload_path']          = './assets/img/opt';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $foto;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $data = array('upload_data' => $this->upload->data());
                $file_surat = $data['upload_data']['file_name'];

                $save = [
                    'id' => '',
                    'idpenyakit' => 'P' . $id,
                    'namapenyakit' => $nama,
                    'jenis' => $jenis,
                    'nonkimiawi' => $nkimia,
                    'kimiawi' => $kimia,
                    'foto' => 'P' . $id . '.png'
                ];

                $this->db->insert('penyakit', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("admin/penyakits"));
            }
        }
        // if ($validation->run()) {
        //     $penyakit->save();
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        //     redirect(site_url('admin/penyakits'));
        // }

        // $this->load->view("admin/penyakit/new_form");
    }

    public function edit($id)
    {

        // $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit penyakit';
        $data['penyakit'] = $this->db->get_where('penyakit', ['id' => $id])->row_array();
        $data['jenis'] = [
            'Hama' => 'Hama',
            'Penyakit' => 'Penyakit'
        ];

        // $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $nama = $this->input->post('nama');
        $jenis = $this->input->post('jenis');
        $nkimia = $this->input->post('nkimia');
        $kimia = $this->input->post('kimia');
        // if ($this->form_validation->run() == false) {
        $this->load->view('admin/penyakit/edit_form', $data);
        // } else {
        $this->db->set('nama', $nama);
        $this->db->set('jenis', $jenis);
        $this->db->set('nkimia', $nkimia);
        $this->db->set('kimia', $kimia);
        $idpenyakit = $this->db->get_where('penyakit', ['id' => $id])->row_array();
        $idp = $idpenyakit['idpenyakit'];
        $config['upload_path'] = './assets/img/opt';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name']            = 'P' . $idp;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_surat')) {

            $data = array('upload_data' => $this->upload->data());
            $file_surat = $data['upload_data']['file_name'];

            $array = [
                'namapenyakit' => $nama,
                'jenis' => $jenis,
                'nonkimiawi' => $nkimia,
                'kimiawi' => $kimia,
                'foto' => $idp
            ];
            $this->db->where(['id' => $id]);
            $this->db->update('penyakit', $array);


            $this->session->set_flashdata('success', 'Data Penyakit No.' . $id . ' Telah Diupdate!');

            redirect(base_url('admin/penyakits'));
        }
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
