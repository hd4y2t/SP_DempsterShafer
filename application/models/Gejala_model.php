<?php defined('BASEPATH') or exit('No direct script access allowed');


class gejala_model extends CI_Model
{
    private $_table = "gejala";

    public $idgejala;
    public $namagejala;
    public $organ;

    public function rules()
    {
        return [
            [
                'field' => 'namagejala',
                'label' => 'Name',
                'rules' => 'required'
            ],
        ];

        return [
            [
                'field' => 'organ',
                'label' => 'Organ',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
        // $data = json_decode($this->curl->simple_get('http://localhost/spsemangka_restapi/api/gejala/'),true);
        // return $data['data'];
    }
    public function getName()
    {
        return $this->db->get($this->_table)->result_array();
        // $data = json_decode($this->curl->simple_get('http://localhost/spsemangka_restapi/api/gejala/'),true);
        // return $data['data'];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idgejala" => $id])->row_array();
        // $data = json_decode($this->curl->simple_get('http://localhost/spsemangka_restapi/api/gejala/',array('idgejala'=>$id), array(CURLOPT_BUFFERSIZE => 10)),true);
        // return $data['data'];
    }

    public function save()
    {
        $semuadata = $this->getAll();
        $datakhir = $semuadata[count($semuadata) - 1];
        $idakhir = $datakhir['idgejala'];
        $id = (int) substr($idakhir, 1);

        $idbaru = 'P' .  (string) ($id + 1);

        $data = [
            "idgejala" => $idbaru,
            "namagejala" => $this->input->post('namagejala', true),
            "organ" => $this->input->post('organ', true)
        ];

        $this->db->insert('mahasiswa', $data);
        // $data = json_decode($this->curl->simple_post('http://localhost/spsemangka_restapi/api/gejala/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
        // return $data;
    }

    public function update($id)
    {
        // $post = $this->input->post();
        // $idp = $this->idgejala = $post["id"];
        // $np = $this->name = $post["namagejala"];

        // $this->db->set('namagejala', $np) ;
        // $this->db->where('idgejala', $idp);
        // $this->db->update('gejala');

        $data = [
            'idgejala' => $id,
            "namagejala" => $this->input->post('namagejala', true),
            "organ" => $this->input->post('organ', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa', $data);
        // $data = json_decode($this->curl->simple_put('http://localhost/spsemangka_restapi/api/gejala/', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
        // return $data;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idgejala" => $id));
        // $data = json_decode($this->curl->simple_delete('http://localhost/spsemangka_restapi/api/gejala/', array('idgejala' => $id), array(CURLOPT_BUFFERSIZE => 10)), true);
        // return $data;
    }
}
