<?php


class Sumulas extends CI_Controller {
	public function index ($id_jogo) {
		$this->load->model('jogo');
		$this->load->model('equipe');
		$this->load->model('sumula');

		$sumula = new Sumula($id_jogo);

		// Recebe escalação
		if (isset($_POST['equipe_1'])) {
			$sumula->SYN_Events->escalacao = []; // HARD
			$sumula->addEscalacao(json_decode($_POST['equipe_1']));
			$sumula->addEscalacao(json_decode($_POST['equipe_2']));
		}


		$data = [];
		$data['jogo'] = new Jogo($id_jogo);

		$this->load->view('admin/_header');
		$this->load->view('admin/sumulas/panel', $data);
		$this->load->view('admin/_footer');
	}

	public function render () {
		$this->load->view('admin/sumulas/_main');
	}

	public function falta () {
		
	}
	public function gol () {
		
	}
	public function impedimento () {
		
	}
	public function substituicao () {
		
	}

}