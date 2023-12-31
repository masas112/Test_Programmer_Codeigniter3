<?php

use GuzzleHttp\Psr7\Response;

use function GuzzleHttp\json_decode;

defined('BASEPATH') or exit('No direct script access allowed');


class Api extends CI_Controller
{
    public function cekKoneksiAPI()
    {
        $data = $this->koneksiAPI();
        if ($data != null) {
            echo '<h1>Terkoneksi dengan API<h1>';
        } else {
            echo '<h1> Tidak Terkoneksi dengan API<h1>';
        }
        header("Refresh: 5; URL='" . base_url('welcome/index'));
    }

    public function getDataAPI()
    {
        $itemAPI = $this->koneksiAPI();
        $responseData = [];

        foreach ($itemAPI->data as $item) {

            $data = array(
                'id_produk' => $item->id_produk, 'nama_produk' => $item->nama_produk,
                'kategori' => $item->kategori,
                'harga' => $item->harga,
                'status' => ($item->status == 'bisa dijual') ? 1 : 0,
            );
            $responseData[] = $data;
        }

        echo json_encode($responseData);
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
            return $dataJSON;
        } catch (GuzzleHttp\Exception\BadResponseException $e) {
            #guzzle repose for future use
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            print_r($responseBodyAsString);
        }
    }
}
