<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_produk');
	}
	public function index()
	{
		$db['produk'] = $this->m_produk->GetData();
		$this->load->view('layout/header');
		$this->load->view('welcome_message', $db);
		$this->load->view('layout/footer');
	}
}
