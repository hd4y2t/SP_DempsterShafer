<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Rule_model', 'rule_model');
        $this->load->model('Penyakit_model', 'penyakit_model');
        $this->load->model('Gejala_model', 'gejala_model');
        $this->load->model('Rekam_model', 'rekam_model');
    }

    public function index()
    {
        $data['gejala'] = $this->db->get('gejala')->num_rows();
        $data['penyakit'] = $this->db->get('penyakit')->num_rows();
        $data['rules'] = $this->db->get('rules')->num_rows();
        $this->load->view("home/template/header");
        $this->load->view("home/index", $data);
        $this->load->view("home/template/footer");
    }

    public function gejala()
    {

        $data["gejala"] = $this->gejala_model->getAll();
        $this->load->view("home/template/header");
        $this->load->view("home/gejala", $data);
        $this->load->view("home/template/footer");
    }

    public function penyakit()
    {

        $data["penyakit"] = $this->penyakit_model->getAll();
        $this->load->view("home/template/header");
        $this->load->view("home/penyakit", $data);
        $this->load->view("home/template/footer");
    }
    public function detailPenyakit($id)
    {
        $data["penyakit"] = $this->penyakit_model->getById($id);
        $data["rules"] = $this->rule_model->getById($id);
        $this->load->view("home/template/header");
        $this->load->view("home/detail", $data);
        $this->load->view("home/template/footer");
    }

    public function diagnosa()
    {

        $data["gejala"] = $this->gejala_model->getAll();
        $gejala = $this->gejala_model->getAll();
        $data["rule"] = $this->rule_model->joinTable();
        $rule = $this->rule_model->getAll();

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        // $this->form_validation->set_rules('gejala', 'gejala', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view("home/template/header");
            $this->load->view("home/diagnosa", $data);
            $this->load->view("home/template/footer");
        } else {
            $nama =  $this->input->post("nama", TRUE);
            $alamat =  $this->input->post("alamat", TRUE);
            $data = [
                'nama' => $nama,
                'alamat' => $alamat
            ];
            $this->db->insert('pengguna', $data);

            $pilihan = count($_POST['gejala']);
            for ($i = 0; $i < $pilihan; $i++) {
                $rekam = [
                    'nama' => $nama,
                    'gejala' => 'G' . $_POST['gejala'][$i]
                ];
                $this->db->insert('rekam', $rekam);
                $tampil = "SELECT penyakit_id, COUNT(gejala_id)
                            FROM rules
                            WHERE gejala_id IN(" . implode(',', $_POST['gejala']) . ")
                            GROUP BY penyakit_id
                            ORDER BY COUNT(penyakit_id) DESC LIMIT 1
               ";
            }

            $result = $this->db->query($tampil)->row_array();
            $data['penyakit'] = $this->db->get_where('penyakit', ['id' => $result['penyakit_id']])->row_array();
            $hasil = [
                'nama' => $nama,
                'diagnosa' => 'P' . $result['penyakit_id']
            ];
            $this->db->insert('hasil', $hasil);

            $this->load->view("home/template/header");
            $this->load->view("home/hasil", $data);
            $this->load->view("home/template/footer");
            // $gejala[] =  $this->input->post("gejala");

            // var_dump($query);
            // die;
        }
    }
    public function hitung()
    {
        $data["gejala"] = $this->gejala_model->getAll();
        $gejala = $this->gejala_model->getAll();
        $data["rule"] = $this->rule_model->joinTable();

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view("home/template/header");
            $this->load->view("home/diagnosa", $data);
            $this->load->view("home/template/footer");
        } else {
            $pilihan_user = [];
            foreach ($_POST['gejala'] as $key => $value) {
                if ($value > 0) :
                    $pilihan_user[] = $key;
                endif;
            }
            $sql = "SELECT GROUP_CONCAT(penyakit.idpenyakit),rules.nilai
                                FROM rules
                                JOIN penyakit
                                ON rules.penyakit_id = penyakit.id
                                WHERE rules.gejala_id
                                IN (" . implode(',', $pilihan_user) . ")
                                GROUP BY rules.gejala_id";

            $result = $this->db->query($sql);
            $gejala = array();
            while ($row = $result->row()) {
                $gejala[] = $row;
            }
            // menentukan environment
            $sql = "SELECT GROUP_CONCAT(penyakit.idpenyakit) FROM penyakit";
            $result = $this->db->query($sql);
            $row = $result->row();
            $fod = $row[0];

            // menentukan nilai densitas
            $densitas_baru = array();
            while (!empty($gejala)) {
                //nilai pada Y1 baris atas
                $densitas1[0] = array_shift($gejala);
                $densitas1[1] = array($fod, 1 - $densitas1[0][1]);
                $densitas2 = array();
                //nilai pada X1 baris 1
                if (empty($densitas_baru)) {
                    $densitas2[0] = array_shift($gejala);
                } else {
                    foreach ($densitas_baru as $k => $r) {
                        //nilai pada X1 baris 2; jika ad densitas baru
                        if ($k != "&theta;") {
                            $densitas2[] = array($k, $r);
                        }
                    }
                }
                //bagian y1
                $theta = 1;
                //nilai X1 baris 2 teta
                foreach ($densitas2 as $d) $theta -= $d[1];
                $densitas2[] = array($fod, $theta);
                $m = count($densitas2);
                $densitas_baru = array();
                for ($y = 0; $y < $m; $y++) {
                    for ($x = 0; $x < 2; $x++) {
                        if (!($y == $m - 1 && $x == 1)) {
                            $v = explode(',', $densitas1[$x][0]);
                            $w = explode(',', $densitas2[$y][0]);
                            sort($v);
                            sort($w);
                            $vw = array_intersect($v, $w);  //mencari nilai irisan
                            if (empty($vw)) {
                                $k = "&theta;";
                            } else {
                                $k = implode(',', $vw);
                            }
                            if (!isset($densitas_baru[$k])) {

                                //data Y1r2
                                $densitas_baru[$k] = $densitas1[$x][1] * $densitas2[$y][1];
                            } else {
                                $densitas_baru[$k] += $densitas1[$x][1] * $densitas2[$y][1];
                            }
                        }
                    }
                }
                foreach ($densitas_baru as $k => $d) {
                    if ($k != "&theta;") {
                        $densitas_baru[$k] = $d / (1 - (isset($densitas_baru["&theta;"]) ? $densitas_baru["&theta;"] : 0));
                    }
                }
            }

            //--- perangkingan
            unset($densitas_baru["&theta;"]);
            arsort($densitas_baru);

            $codes = array_keys($densitas_baru);
            $sql = "SELECT * FROM penyakit WHERE id IN('{$codes[0]}')";
            $result = $this->db->query($sql);
            $row = $result->row();
            echo '<h4>Berikut Hasil Diagnosa anda!</h4>';

            //--- menampilkan hasil akhir
            echo "Anda kemungkinan mengidap penyakit <b>" . $row[0] . "</br> " . " % <br>";
        }
    }
}
