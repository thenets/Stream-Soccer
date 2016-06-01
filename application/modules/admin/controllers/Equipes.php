<?php
class Equipes extends CI_Controller{
    
    public function index(){
        $this->load->model('Equipe');
        
        $data = [];
        $data['equipes'] = Equipe::getAll();
        
        
        $this->load->view('admin/_header');
		$this->load->view('admin/equipes/list', $data);
		$this->load->view('admin/_footer');
    }
    
    public function add(){
        $this->load->model('Equipe');
        // Update on database
		if(isset($_POST['nome'])) {
			$new_equipe = new Equipe();
			$new_equipe->nome = $_POST['nome'];
			$new_equipe->titulos = (isset($_POST['titulos'])) ? $_POST['titulos'] : 0;
			$new_equipe->save();
			
			redirect(base_url('admin/equipes'));
		}
		
		$data = [];

		$this->load->view('admin/_header');
		$this->load->view('admin/equipes/add', $data);
		$this->load->view('admin/_footer');
    }
    
    function edit ($id) {
		$this->load->model('Equipe');

		// Update on database
		if(isset($_POST['nome'])) {
			$new_equipe = new Equipe($_POST['id_equipe']);
			$new_equipe->nome = $_POST['nome'];
			$new_equipe->titulos = (isset($_POST['titulos'])) ? $_POST['titulos'] : 0;
			$new_equipe->save();
		}


		$data = [];
		$data['equipe'] = new Equipe($id);

		$this->load->view('admin/_header');
		$this->load->view('admin/equipes/edit', $data);
		$this->load->view('admin/_footer');
	}
	
	function remove ($id) {
		$this->load->model('equipe');
		$equipe = new Equipe($id);
		$equipe->delete();

		redirect(base_url('admin/equipes'));
	}
}