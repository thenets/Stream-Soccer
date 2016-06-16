<?php

class Home extends CI_Controller {
	public function index () {
		$this->load->model('equipe');
		$this->load->model('jogador');
		$this->load->model('jogo');
		$this->load->model('sumula');

		$data = [];
		$data['jogos'] = Jogo::getAll();

		$this->load->view('home/_header');
		$this->load->view('home/home', $data);
		$this->load->view('home/_footer');
	}

	public function jogo () {
		$this->load->model('equipe');
		$this->load->model('jogador');
		$this->load->model('jogo');
		$this->load->model('sumula');

		$data = [];
		$data['sumula'] = new Sumula($id_jogo);

		$this->load->view('home/_header');
		$this->load->view('home/jogo', $data);
		$this->load->view('home/_footer');
	}
}