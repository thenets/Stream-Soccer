<?php

class Arbitros extends CI_Controller {
	function index () {
		$this->load->model('arbitro');

		$arbitro = new Arbitro(2);
		$arbitro->nome = 'Superman';
		$arbitro->tipo = 'principal';
		$arbitro->save();
	}
}