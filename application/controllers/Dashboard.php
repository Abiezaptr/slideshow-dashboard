<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('slide');
		$this->load->view('partials/footer');
	}
}
