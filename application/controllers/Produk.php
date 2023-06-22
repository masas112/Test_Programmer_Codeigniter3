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
    }
}
