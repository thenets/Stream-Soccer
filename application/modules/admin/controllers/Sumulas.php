<?php


class Sumulas extends CI_Controller {
	public function index ($id_jogo) {
		$this->load->model('jogo');
		$this->load->model('equipe');
		$this->load->model('sumula');

		$sumula = new Sumula($id_jogo);

		// Recebe escalação
		// ===================================
		if (isset($_POST['equipe_1'])) {
			$sumula->SYN_Log->escalacao = []; // HARD
			$sumula->addEscalacao(json_decode($_POST['equipe_1']));
			$sumula->addEscalacao(json_decode($_POST['equipe_2']));
		}


		$data = [];
		$data['jogo'] = new Jogo($id_jogo);

		$this->load->view('admin/_header');
		$this->load->view('admin/sumulas/panel', $data);
		$this->load->view('admin/_footer');
	}

	public function falta ($id_jogo) {
		$sumula = new Sumula($id_jogo);
		if(isset($_POST['tempo'])){
			
			$tempo = $_POST['tempo'];
			$jogador_cometeu_falta = $_POST['jogador_cometeu_falta'];
			$jogador_sofreu_falta = $_POST['jogador_sofreu_falta'];
			$cartao = $_POST['cartao'];
			$sumula->evento_falta($tempo,$jogador_cometeu_falta,$jogador_sofreu_falta,$cartao);
			
			redirect(base_url('admin/sumulas/index/'.$id_jogo));
		}
		echo "Erro: <br>";
		echo "<pre>".print_r($_POST)."</pre>";
	}
	
	public function gol ($id_jogo) {
		$sumula = new Sumula($id_jogo);
		if(isset($_POST['tempo'])){
			$tempo = $_POST['tempo'];
			$jogador_q_fez_o_gol = $_POST['jogador_q_fez_o_gol'];
			$contra = ($_POST['contra']) ? true : false;
			$sumula->evento_gol($tempo, $jogador_q_fez_o_gol, $contra);
			redirect(base_url('admin/sumulas/index/'.$id_jogo));
		}
		echo "Erro: <br>";
		echo "<pre>".print_r($_POST)."</pre>";
	}
	public function impedimento () {
		
	}
	public function substituicao () {
		
	}
	
	public function cartao(){
		
	}
	
	public function finalizar(){
		
	}

}