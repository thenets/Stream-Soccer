<?php

class Home extends CI_Controller {
	public function index () {
		$this->load->view('layout/header');
		$this->load->view('home/home');
		$this->load->view('layout/footer');
	}
}