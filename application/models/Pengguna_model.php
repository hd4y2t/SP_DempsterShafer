<?php
defined('BASEPATH') or exit('No direct script access allowed');


class pengguna_model extends CI_Model
{
    private $_table = "pengguna";

    public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }
}
