<?php defined('BASEPATH') or exit('No direct script access allowed');


class penyakit_model extends CI_Model
{
    private $_table = "penyakit";

    public $idpenyakit;
    public $namapenyakit;
    public $jenis;
    public $nonkimiawi;
    public $kimiawi;

    public function rules()
    {
        return [
            [
                'field' => 'namapenyakit',
                'label' => 'Name',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
        // $data = json_decode($this->curl->simple_get('http://localhost/spsemangka_restapi/api/penyakit/'), true);

        // return $data['data'];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row_array();
        // $data = json_decode($this->curl->simple_get('http://localhost/spsemangka_restapi/api/penyakit/', array('idpenyakit' => $id), array(CURLOPT_BUFFERSIZE => 10)), true);
        // return $data['data'];
    }


    public function save()
    {
        $semuadata = $this->getAll();
        $datakhir = $semuadata[count($semuadata) - 1];
        $idakhir = $datakhir['idpenyakit'];
        $id = (int) substr($idakhir, 1);

        $idbaru = 'P' .  (string) ($id + 1);

        $data = [
            "idpenyakit" => $idbaru,
            "namapenyakit" => $this->input->post('namapenyakit', true),
            "jenis" => $this->input->post('jenis', true),
            "nonkimiawi" => $this->input->post('nonkimiawi', true),
            "kimiawi" => $this->input->post('kimiawi', true),
        ];

        $this->db->insert('mahasiswa', $data);
        // $data = json_decode($this->curl->simple_post('http://localhost/spsemangka_restapi/api/penyakit/', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
        // return $data;
    }

    public function update($id)
    {
        // $post = $this->input->post();
        // $idp = $this->idpenyakit = $post["id"];
        // $np = $this->name = $post["namapenyakit"];

        // $this->db->set('namapenyakit', $np) ;
        // $this->db->where('idpenyakit', $idp);
        // $this->db->update('penyakit');

        $data = [
            'id' => $id,
            // 'idpenyakit' => $id,
            "namapenyakit" => $this->input->post('namapenyakit', true),
            "jenis" => $this->input->post('jenis', true),
            "nonkimiawi" => $this->input->post('nonkimiawi', true),
            "kimiawi" => $this->input->post('kimiawi', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa', $data);
        // $data = json_decode($this->curl->simple_put('http://localhost/spsemangka_restapi/api/penyakit/', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
        // return $data;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idpenyakit" => $id));
        // $data = json_decode($this->curl->simple_delete('http://localhost/spsemangka_restapi/api/penyakit/', array('idpenyakit' => $id), array(CURLOPT_BUFFERSIZE => 10)), true);
        // return $data;
    }
}
