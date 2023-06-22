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

        $this->load->library('guzzle');
        date_default_timezone_set('Asia/Singapore');
        # guzzle client define
        $client     = new GuzzleHttp\Client(['verify' => false]);

        $username = "tesprogrammer" . date('d') . date('m') . date('y') . "C" . date('H');
        $password = "bisacoding-" . date('d') . "-" . date('m') . "-" . date('y');

        $queryParams = array(
            'username' => $username,
            'password' => md5($password)
        );


        #This url define speific Target for guzzle
        $url        = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';

        #guzzle
        try {
            # guzzle post request example with form parameter
            $response = $client->request(
                'POST',
                $url,
                [
                    'form_params'
                    => $queryParams
                ]
            );

            $dataJSON = json_decode($response->getBody());
            var_dump($dataJSON->data);
        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            #guzzle repose for future use
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            print_r($responseBodyAsString);
        }
    }
}
