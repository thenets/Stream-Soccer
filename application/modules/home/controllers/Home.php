<?php

class Home extends CI_Controller {
	public function index () {
		$this->load->model('equipe');
		$this->load->model('jogador');
		$this->load->model('jogo');
		$this->load->model('sumula');
		$this->load->model('campeonato');

		$data = [];
		$data['campeonatos'] = Campeonato::getAll();

		$this->load->view('home/_header');
		$this->load->view('home/home', $data);
		$this->load->view('home/_footer');
	}

	public function campeonato ($id_campeonato) {
		$this->load->model('equipe');
		$this->load->model('jogador');
		$this->load->model('jogo');
		$this->load->model('sumula');
		$this->load->model('campeonato');

		$campeonato = new Campeonato($id_campeonato);

		$data = [];
		$data['jogos'] = Jogo::getAllByCampeonato($id_campeonato);
		$data['id_campeonato'] = $id_campeonato;
		$data['status'] = $campeonato->getStatusJogos();

		$this->load->view('home/_header');
		$this->load->view('home/campeonato', $data);
		$this->load->view('home/_footer');
	}

	public function jogo ($id_jogo) {
		$this->load->model('equipe');
		$this->load->model('jogador');
		$this->load->model('jogo');
		$this->load->model('sumula');
		$this->load->model('campeonato');

		$data = [];
		$data['jogo'] = new Jogo($id_jogo);
		$data['sumula'] = new Sumula($id_jogo);

		$this->load->view('home/_header');
		$this->load->view('home/jogo', $data);
		$this->load->view('home/_footer');
	}

	public function ao_vivo ($id_jogo) {
		$this->load->model('equipe');
		$this->load->model('jogador');
		$this->load->model('jogo');
		$this->load->model('sumula');
		$this->load->model('campeonato');

		$data = [];
		$data['jogo'] = new Jogo($id_jogo);
		$data['sumula'] = new Sumula($id_jogo);		

		$this->load->view('home/ao_vivo', $data);
	}
}