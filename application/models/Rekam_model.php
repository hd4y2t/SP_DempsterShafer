<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rekam_model extends CI_Model
{
    private $_table = "rekam";

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

    public function cek_data($ktp)
    {
        $data = $this->db->get_where('pengguna', ['no_identitas' => $ktp])->row_array();
        $this->db->where('no_identitas', $ktp);
        $this->db->update('pengguna');

        return $this->db->get_where('pengguna', array('no_identitas' => $ktp));
    }

    public function joinTable()
    {
        $query = "SELECT `rekam`.* ,`gejala`.`namagejala`
        FROM `rekam`
        JOIN `gejala` ON `rekam`.`gejala` = `gejala`.`idgejala`
        ORDER BY id_rekam ASC";

        return $this->db->query($query)->result_array();
    }
    public function joinHasil()
    {
        $query = "SELECT `hasil`.* ,`penyakit`.`namapenyakit`
        FROM `hasil`
        JOIN `penyakit` ON `hasil`.`diagnosa` = `penyakit`.`idpenyakit`
        ORDER BY id_hasil ASC";

        return $this->db->query($query)->result_array();
    }
}
