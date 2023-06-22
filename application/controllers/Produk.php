<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
    }

    public function add()
    {
        $nama_produk = $this->input->post('nama_produk');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $status = $this->input->post('status');

        $data = array(
            'nama_produk' => $nama_produk,
            'kategori' => $kategori,
            'harga' => $harga,
            'status' =>  $status
        );

        $this->m_produk->Tambah($data);
        redirect('welcome/index');
    }

    public function delete()
    {
        $id_produk = $this->input->post('id');
        $this->m_produk->delete($id_produk);
        redirect('welcome/index');
    }

    public function edit()
    {
        $data = array(
            'id_produk' => $this->input->post('id'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kategori' => $this->input->post('kategori'),
            'harga' => $this->input->post('harga'),
            'status' => $this->input->post('status'),
        );

        $this->m_produk->Update($data);
        redirect('welcome/index');
    }

    public function koneksiAPI()
    {
        date_default_timezone_set('Asia/Singapore');
        $url = "https://recruitment.fastprint.co.id/tes/api_tes_programmer";
        $username = "tesprogrammer" . date('d') . date('m') . date('y') . "C" . date('H');
        $password = "bisacoding-" . date('d') . "-" . date('m') . "-" . date('y');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(
            array(
                'username' => 'tesprogrammer230623C00', 'password' => '43d85a4391fa66039cabc5c65ee715b8',
            )
        ));


        $response = curl_exec($ch);
        $dataJSON = json_decode($response);
        var_dump($dataJSON);
        curl_close($ch);
        try {
            if ($dataJSON == null) {
                throw new Exception("Server Down");
            }
            $data = $dataJSON->data;
            foreach ($data as $item) {
                $no = $item->no; // Mengambil nilai dari properti 'no'
                $id_produk = $item->id_produk; // Mengambil nilai dari properti 'id_produk'
                $nama_produk = $item->nama_produk; // Mengambil nilai dari properti 'nama_produk'
                $kategori = $item->kategori; // Mengambil nilai dari properti 'kategori'
                $harga = $item->harga; // Mengambil nilai dari properti 'harga'
                $status = $item->status; // Mengambil nilai dari properti 'status'

                // Menampilkan nilai-nilai yang telah diambil
                // echo "No: " . $no . "<br>";
                // echo "ID Produk: " . $id_produk . "<br>";
                // echo "Nama Produk: " . $nama_produk . "<br>";
                // echo "Kategori: " . $kategori . "<br>";
                // echo "Harga: " . $harga . "<br>";
                // echo "Status: " . $status . "<br>";
            }
        } catch (Exception $e) {
            echo 'Pesan : ' . $e->getMessage();
            die;
        }


        return $data;
    }
}
