<?php

class Jogos extends CI_Controller {
	function index ($id_campeonato) {
		$this->load->model('jogo');
		$this->load->model('campeonato');

		$data = [];
		$data['campeonato'] = new Campeonato($id_campeonato);
		$data['jogos'] = Jogo::getAllByCampeonato($id_campeonato);

		$this->load->view('admin/_header');
		$this->load->view('admin/jogos/list', $data);
		$this->load->view('admin/_footer');
	}


	function edit ($id_campeonato, $id_jogo) {
		$this->load->model('campeonato');
		$this->load->model('jogo');

		// Update on database
		if(isset($_POST['id_campeonato'])) {
			$new_jogo = new Jogo($id_jogo);
			$new_jogo->id_campeonato 	= $_POST['id_campeonato'];
			$new_jogo->hora_inicio 		= isset($_POST['hora_inicio']) ? $_POST['hora_inicio'] : ' ';
			$new_jogo->hora_fim 		= isset($_POST['hora_fim']) ? $_POST['hora_fim'] : ' ';
			$new_jogo->data 			= isset($_POST['data']) ? $_POST['data'] : ' ';
			$new_jogo->finalizado 		= isset($_POST['finalizado']) ? $_POST['finalizado'] : ' ';
			$new_jogo->campo_nome 		= $_POST['campo_nome'];
			$new_jogo->campo_dimensao 	= $_POST['campo_dimensao'];
			$new_jogo->equipe_1 		= $_POST['equipe_1'];
			$new_jogo->equipe_2 		= $_POST['equipe_2'];
			$new_jogo->save();
		}


		$data = [];
		$data['jogo'] = new Jogo($id_jogo);

		$this->load->view('admin/_header');
		$this->load->view('admin/jogos/edit', $data);
		$this->load->view('admin/_footer');
	}


	function remove ($id_campeonato, $id_jogo) {
		$this->load->model('jogo');
		$jogo = new Jogo($id_jogo);
		$jogo->delete();

		redirect(base_url('admin/campeonatos/'.$id_campeonato.'/jogos'));
	}


	function add ($id_campeonato) {
		$this->load->model('jogo');

		// Update on database
		if(isset($_POST['id_campeonato'])) {
			$new_jogo = new Jogo();
			$new_jogo->id_campeonato 	= $_POST['id_campeonato'];
			$new_jogo->hora_inicio 		= isset($_POST['hora_inicio']) ? $_POST['hora_inicio'] : ' ';
			$new_jogo->hora_fim 		= isset($_POST['hora_fim']) ? $_POST['hora_fim'] : ' ';
			$new_jogo->data 			= isset($_POST['data']) ? $_POST['data'] : ' ';
			$new_jogo->finalizado 		= isset($_POST['finalizado']) ? $_POST['finalizado'] : ' ';
			$new_jogo->campo_nome 		= $_POST['campo_nome'];
			$new_jogo->campo_dimensao 	= $_POST['campo_dimensao'];
			$new_jogo->equipe_1 		= $_POST['equipe_1'];
			$new_jogo->equipe_2 		= $_POST['equipe_2'];
			$new_jogo->save();
			
			redirect(base_url('admin/campeonatos/'.$_POST['id_campeonato'].'/jogos'));
		}

		$data = [];
		$data['id_campeonato'] = $id_campeonato;

		$this->load->view('admin/_header');
		$this->load->view('admin/jogos/add', $data);
		$this->load->view('admin/_footer');

	}
}