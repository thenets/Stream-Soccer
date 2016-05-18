<?php

class Admin extends CI_Controller {
	public function index () {
		$this->load->view('admin/_header');
		$this->load->view('admin/panel');
		$this->load->view('admin/_footer');
	}
}