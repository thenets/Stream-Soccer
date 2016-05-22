<?php

class Arbitros extends CI_Controller {
	function index () {
		$this->load->model('arbitro');

		$data = [];
		$data['arbitros'] = Arbitro::getAll();

		$this->load->view('admin/_header');
		$this->load->view('admin/arbitros/list', $data);
		$this->load->view('admin/_footer');
	}


	function edit ($id) {
		$this->load->model('arbitro');

		// Update on database
		if(isset($_POST['nome'])) {
			$new_arbitro = new Arbitro($_POST['id_arbitro']);
			$new_arbitro->nome = $_POST['nome'];
			$new_arbitro->tipo = $_POST['tipo'];
			$new_arbitro->save();
		}


		$data = [];
		$data['arbitro'] = new Arbitro($id);

		$this->load->view('admin/_header');
		$this->load->view('admin/arbitros/edit', $data);
		$this->load->view('admin/_footer');
	}


	function remove ($id) {
		$this->load->model('arbitro');
		$arbitro = new Arbitro($id);
		$arbitro->delete();

		redirect(base_url('admin/arbitros'));
	}


	function add () {
		$this->load->model('arbitro');

		// Update on database
		if(isset($_POST['nome'])) {
			$new_arbitro = new Arbitro();
			$new_arbitro->nome = $_POST['nome'];
			$new_arbitro->tipo = $_POST['tipo'];
			$new_arbitro->save();
			
			redirect(base_url('admin/arbitros'));
		}

		$data = [];

		$this->load->view('admin/_header');
		$this->load->view('admin/arbitros/add', $data);
		$this->load->view('admin/_footer');

	}
}