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
        redirect(base_url());
    }


    public function delete()
    {
        $cek = 'id_produk';
        $id_produk = $this->input->post('id');
        $this->m_produk->delete($id_produk, 'id_produk');
        redirect(base_url());
    }

    public function deleteAPI()
    {
        $nama_produk = $this->input->post('nama_produk');
        $this->m_produk->delete($nama_produk, 'nama_produk');
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
        redirect(base_url());
    }
}
