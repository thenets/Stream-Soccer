<?php

class Home extends CI_Controller {
	public function index () {
		$this->load->view('home/_header');
		$this->load->view('home/home');
		$this->load->view('home/_footer');
	}
}