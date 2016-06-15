<?php

class Jogadores extends CI_Controller{
    
    public function jogador_by_equipe($id_equipe){
        $this->load->model('Jogador');
        $this->load->model('Equipe');
        
        $data['equipe']    = Equipe::getEquipeById($id_equipe);
        $data['jogadores'] = Jogador::getAllByEquipe($id_equipe);
        $data['id_equipe'] = $id_equipe;
        
        $this->load->view('admin/_header');
		$this->load->view('admin/jogadores/list', $data);
		$this->load->view('admin/_footer');
        
    }
    
    public function add($id_equipe){
        $this->load->model('Jogador');
        if(isset($_POST['nome'])) {
			$new_jogador = new Jogador();
			$new_jogador->id_equipe = $id_equipe;
			$new_jogador->nome = $_POST['nome'];
			$new_jogador->posicao = (isset($_POST['posicao'])) ? $_POST['posicao'] : null;
			$new_jogador->save();
			
			redirect(base_url('admin/equipes/'.$id_equipe.'/jogadores'));
		}
        $data['id_equipe'] = $id_equipe;
        
        $this->load->view('admin/_header');
		$this->load->view('admin/jogadores/add', $data);
		$this->load->view('admin/_footer');
        
    }
    
    public function edit($id_equipe,$id_jogador){
        
        $this->load->model('Jogador');

		// Update on database
		if(isset($_POST['nome'])) {
			$new_jogador = new Jogador($_POST['id_jogador']);
			$new_jogador->nome = $_POST['nome'];
			$new_jogador->posicao = (isset($_POST['posicao'])) ? $_POST['posicao'] : null;
			$new_jogador->save();
		}


		$data = [];
		$data['jogador'] = new Jogador($id_jogador);
		$data['id_equipe'] = $id_equipe;
		$data['id_jogador'] = $id_jogador;

		$this->load->view('admin/_header');
		$this->load->view('admin/jogadores/edit', $data);
		$this->load->view('admin/_footer');
    }
    
    function remove ($id_equipe,$id_jogador) {
		$this->load->model('jogador');
		$equipe = new Jogador($id_jogador);
		$equipe->delete();

		redirect(base_url('admin/equipes/'.$id_equipe.'/jogadores'));
	}
    
}