<?php


class Sumulas extends CI_Controller {

	public function index ($id_jogo) {
		$this->load->model('jogador');
		$this->load->model('equipe');
		$this->load->model('sumula');
		$this->load->model('jogo');

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

	public function falta ($id_jogo,$id_jogador) {
		$this->load->model('jogador');
		$this->load->model('equipe');
		$this->load->model('sumula');
		$this->load->model('jogo');

		$sumula = new Sumula($id_jogo);
		if(isset($_POST['tempo'])){
			
			$tempo = $_POST['tempo'];
			$jogador_cometeu_falta = $id_jogador;
			$jogador_sofreu_falta = $_POST['jogador_sofreu_falta'];
			$cartao = $_POST['cartao'];
			$sumula->evento_falta($tempo,$jogador_cometeu_falta,$jogador_sofreu_falta,$cartao);
			
			redirect(base_url('admin/sumulas/index/'.$id_jogo));
		}
		echo "Erro: <br>";
		echo "<pre>".print_r($_POST)."</pre>";
	}
	
	public function gol ($id_jogo,$id_jogador) {
		$this->load->model('jogador');
		$this->load->model('equipe');
		$this->load->model('sumula');
		$this->load->model('jogo');
		
		$sumula = new Sumula($id_jogo);
		if(isset($_POST['tempo'])){
			$tempo = $_POST['tempo'];
			$jogador_q_fez_o_gol = $id_jogador;
			$contra = isset($_POST['contra']) ? true : false;
			$sumula->evento_gol($tempo, $jogador_q_fez_o_gol, $contra);
			redirect(base_url('admin/sumulas/index/'.$id_jogo));
		}
		echo "Erro: <br>";
		echo "<pre>".print_r($_POST)."</pre>";
	}
	
	public function impedimento ($id_jogo,$id_jogador) {
		$this->load->model('jogador');
		$this->load->model('equipe');
		$this->load->model('sumula');
		$this->load->model('jogo');
		
		$sumula = new Sumula($id_jogo);
		if(isset($_POST['tempo'])){
			$tempo = $_POST['tempo'];
			$jogador_impedido = $id_jogador;
			$sumula->evento_impedimento($tempo,$jogador_impedido);
			redirect(base_url('admin/sumulas/index/'.$id_jogo));
		}
		echo "Erro: <br>";
		echo "<pre>".print_r($_POST)."</pre>";
	}
	
	public function substituicao ($id_jogo,$id_jogador) {
		$this->load->model('jogador');
		$this->load->model('equipe');
		$this->load->model('sumula');
		$this->load->model('jogo');
		
		$sumula = new Sumula($id_jogo);
		if(isset($_POST['tempo'])){
			$tempo = $_POST['tempo'];
			$jogador_entra = $_POST['jogador_entra'];
			$jogador_sai = $id_jogador;
			$sumula->evento_substituicao($tempo,$jogador_entra,$jogador_sai);
			redirect(base_url('admin/sumulas/index/'.$id_jogo));
		}
		echo "Erro: <br>";
		echo "<pre>".print_r($_POST)."</pre>";
	}
	
	public function cartao($id_jogo,$id_jogador){
		$this->load->model('jogador');
		$this->load->model('equipe');
		$this->load->model('sumula');
		$this->load->model('jogo');
		
		$sumula = new Sumula($id_jogo);
		if(isset($_POST['tempo'])){
			$tempo = $_POST['tempo'];
			$cartao = $_POST['cartao'];
			$jogador_levou_cartao = $id_jogador;
			$sumula->evento_cartao($tempo,$jogador_levou_cartao,$cartao);
			redirect(base_url('admin/sumulas/index/'.$id_jogo));
		}
		echo "Erro: <br>";
		echo "<pre>".print_r($_POST)."</pre>";
	}
	
	public function finalizar($id_jogo){
		$this->load->model('jogador');
		$this->load->model('equipe');
		$this->load->model('sumula');
		$this->load->model('jogo');
		$jogo = new Jogo($id_jogo);
		$jogo->finalizado = true;
		$jogo->save();
		redirect(base_url('admin/'));
	}

}