<?php defined('BASEPATH') or exit('No direct script access allowed');


class rule_model extends CI_Model
{
    private $_table = "rules";

    public $idrule;
    public $namarule;
    public $rulerule;

    public function rules()
    {
        return [
            [
                'field' => 'penyakit',
                'label' => 'Penyakit',
                'rules' => 'required'
            ],
        ];

        return [
            [
                'field' => 'gejala',
                'label' => 'Gejala',
                'rules' => 'required'
            ],
        ];
        return [
            [
                'field' => 'nilai',
                'label' => 'Nilai',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
        // $data = json_decode($this->curl->simple_get('http://localhost/spsemangka_restapi/api/rule/'),true);
        // return $data['data'];
    }

    public function getById($id)
    {
        $query = "SELECT `rules`.*,`gejala`.`namagejala`
        FROM `rules`
        JOIN `gejala` ON `rules`.`gejala_id` = `gejala`.`id`
        WHERE `rules`.`penyakit_id` = $id
       ";
        return $this->db->query($query)->result_array();
    }



    public function joinTable()
    {
        $query = "SELECT `rules`.*, `penyakit`.`namapenyakit`, `gejala`.`namagejala`, `gejala`.`idgejala`
                    FROM `rules`
                    JOIN `penyakit` ON `rules`.`penyakit_id` = `penyakit`.`id`
                    JOIN `gejala` ON `rules`.`gejala_id` = `gejala`.`id`
                   ";
        return $this->db->query($query)->result_array();
    }

    public function nilaiMax()
    {
        $query = "SELECT * FROM rule";
        return $this->db->query($query)->num_rows();
    }

    public function save()
    {
        $semuadata = $this->getAll();
        $datakhir = $semuadata[count($semuadata) - 1];
        $idakhir = $datakhir['idrule'];
        $id = (int) substr($idakhir, 1);

        $idbaru = 'R' .  (string) ($id + 1);

        $data = [
            "idrule" => $idbaru,
            "namarule" => $this->input->post('namarule', true),
            "gejalarule" => $this->input->post('gejalarule', true),
            "nilai" => $this->input->post('nilai', true)
        ];

        $this->db->insert('rules', $data);
        // $data = json_decode($this->curl->simple_post('http://localhost/spsemangka_restapi/api/rule/',$data, array(CURLOPT_BUFFERSIZE => 10)),true);
        // return $data;
    }

    public function update($id)
    {
        // $post = $this->input->post();
        // $idp = $this->idrule = $post["id"];
        // $np = $this->name = $post["namarule"];

        // $this->db->set('namarule', $np) ;
        // $this->db->where('idrule', $idp);
        // $this->db->update('rule');

        $data = [
            'idrule' => $id,
            "namarule" => $this->input->post('namarule', true),
            "gejalarule" => $this->input->post('gejalarule', true),
            "nilai" => $this->input->post('nilai', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('rules', $data);
        // $data = json_decode($this->curl->simple_put('http://localhost/spsemangka_restapi/api/rule/', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
        // return $data;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idrule" => $id));
        // $data = json_decode($this->curl->simple_delete('http://localhost/spsemangka_restapi/api/rule/', array('idrule' => $id), array(CURLOPT_BUFFERSIZE => 10)), true);
        // return $data;
    }
}
