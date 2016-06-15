<?php

class Campeonatos extends CI_Controller {
	function index () {
		$this->load->model('campeonato');

		$data = [];
		$data['campeonatos'] = Campeonato::getAll();

		$this->load->view('admin/_header');
		$this->load->view('admin/campeonatos/list', $data);
		$this->load->view('admin/_footer');
	}


	function edit ($id) {
		$this->load->model('campeonato');

		// Update on database
		if(isset($_POST['nome'])) {
			$new_campeonato = new Campeonato($_POST['id_campeonato']);
			$new_campeonato->nome = $_POST['nome'];
			$new_campeonato->campeao = $_POST['campeao'].' ';
			$new_campeonato->vice = $_POST['vice'].' ';
			$new_campeonato->save();

			redirect(base_url('admin/campeonatos'));
		}

		$data = [];
		$data['campeonato'] = new Campeonato($id);

		$this->load->view('admin/_header');
		$this->load->view('admin/campeonatos/edit', $data);
		$this->load->view('admin/_footer');
	}


	function remove ($id) {
		$this->load->model('campeonato');
		$campeonato = new Campeonato($id);
		$campeonato->delete();

		redirect(base_url('admin/campeonatos'));
	}


	function add () {
		$this->load->model('campeonato');

		// Update on database
		if(isset($_POST['nome'])) {
			$new_campeonato = new Campeonato();
			$new_campeonato->nome = $_POST['nome'];
			$new_campeonato->campeao = $_POST['campeao'].' ';
			$new_campeonato->vice = $_POST['vice'].' ';
			$new_campeonato->save();
			
			redirect(base_url('admin/campeonatos'));
		}

		$data = [];

		$this->load->view('admin/_header');
		$this->load->view('admin/campeonatos/add', $data);
		$this->load->view('admin/_footer');

	}

}