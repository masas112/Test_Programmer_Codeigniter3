<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Produk');
	}
	public function index()
	{
		$db['produk'] = $this->Produk->GetData();
		$this->load->view('welcome_message', $db);
	}
}
