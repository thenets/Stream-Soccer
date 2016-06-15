<?php

class Jogos extends CI_Controller {
	public function index () {
		$this->load->model('arbitro');

		$arbitro = new Arbitro();
		$arbitro->nome = 'Luiz';
		$arbitro->tipo = 'principal';
		//$arbitro->save();
	}
}