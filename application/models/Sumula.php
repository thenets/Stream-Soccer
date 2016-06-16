<?php

class Sumula extends SYN_Model {
	public function __construct ($id_jogo=0) {
		if ($id_jogo != 0) {
			// Get Jogo data
			$this->load->model('jogo');
			$jogo = new Jogo($id_jogo);

			// Check Sumula exists
			$this->db->where('id_jogo', $id_jogo);
			if(count($this->db->get('sumulas')->result()) == 0) {
				$log = new stdClass();
				$log->escalacao = [];
				$log->eventos = [];

				$data = array(
			        'id_jogo' => $jogo->id_jogo,
			        'equipe_1' => $jogo->equipe_1,
			        'equipe_2' => $jogo->equipe_2,
			        'log' => json_encode( $log )
				);

				$this->db->insert('sumulas', $data);
			}


			$this->db->where('id_jogo', $id_jogo);
			$id_sumula = $this->db->get('sumulas')->result()[0]->id_sumula;

			$this->scaffold('sumulas', $id_sumula);
			$this->SYN_Log = json_decode($this->log);
		}
	}

	public static function getAll () {
		$ci =& get_instance();
		$result = $ci->db->get('sumulas')->result();

		$all = [];
		foreach ($result as $key => $value) {
			$all[] = new Sumula($value->id_campeonato);
		}
		
		return $all;
	}

	/*
		Update Log

		Atualiza o log do banco
	*/
	public function updateLog () {
		$this->log = json_encode($this->SYN_Log);
		$this->save();
	}

	/*
		Escalação
	*/
	public function addEscalacao ($array_new_escalacao) {
		if(count($this->SYN_Log) < 3) {
			$this->SYN_Log->escalacao[] = $array_new_escalacao;
		}

		$this->updateLog();
	}
	public function getEscalacao ($time) { // 0 ou 1
		$this->load->model('jogador');

		$equipe = [];
		foreach ($this->SYN_Log->escalacao[$time] as $key => $jogador) {
			$equipe[] = new Jogador($jogador);
		}

		return $equipe;
	}

	/*
		Eventos Geral
	*/
	public function addEvento ($new_evento) {
		$this->SYN_Log->eventos[] = $new_evento;
		$this->updateLog();
	}

	/*
		Add Evento Gol
	*/
	public function evento_gol ($tempo, $jogador_q_fez_o_gol, $contra=false) {
		$this->load->model('jogador');
		$new_gol = array(
			'key' 		=> md5(time().' '.microtime()),
			'tipo' 		=> 'gol', // Tipo
			'tempo' 	=> $tempo, // Tempo do jogo exemplo: [35/1] ou [42/2]
			'atributos' => array(
				'equipe'	=> (new Jogador($jogador_q_fez_o_gol))->id_equipe,
				'jogador' 	=> $jogador_q_fez_o_gol,
				'contra' 	=> $contra
			) // Atributos (array)
		);

		$this->addEvento($new_gol);
	}

	/*
		Add Evento Impedimento
	*/
	public function evento_impedimento ($tempo, $jogador_impedido) {
		$this->load->model('jogador');
		$new_impedimento = array(
			'key' 		=> md5(time().' '.microtime()),
			'tipo' 		=> 'impedimento', // Tipo
			'tempo' 	=> $tempo, // Tempo do jogo exemplo: [35/1] ou [42/2]
			'atributos' => array(
				'equipe'	=> (new Jogador($jogador_impedido))->id_equipe,
				'jogador' 	=> $jogador_impedido
			) // Atributos (array)
		);

		$this->addEvento($new_impedimento);
	}


	/*
		Add Evento Substituição
	*/
	public function evento_substituicao ($tempo, $jogador_entra, $jogador_sai) {
		$this->load->model('jogador');
		$new_substituicao = array(
			'key' 		=> md5(time().' '.microtime()),
			'tipo' 		=> 'substituicao', // Tipo
			'tempo' 	=> $tempo, // Tempo do jogo exemplo: [35/1] ou [42/2]
			'atributos' => array(
				'equipe'			=> (new Jogador($jogador_sai))->id_equipe,
				'jogador_entra' 	=> $jogador_entra,
				'jogador_sai' 		=> $jogador_sai
			) // Atributos (array)
		);

		$this->addEvento($new_substituicao);
	}


	/*
		Add Evento Falta
	*/
	public function evento_falta ($tempo, $jogador_cometeu_falta, $jogador_sofreu_falta, $cartao=0) {
		$this->load->model('jogador');
		$new_falta = array(
			'key' 		=> md5(time().' '.microtime()),
			'tipo' 		=> 'falta', // Tipo
			'tempo' 	=> $tempo, // Tempo do jogo exemplo: [35/1] ou [42/2]
			'atributos' => array(
				'equipe'					=> (new Jogador($jogador_cometeu_falta))->id_equipe,
				'jogador_cometeu_falta' 	=> $jogador_cometeu_falta,
				'jogador_sofreu_falta' 		=> $jogador_sofreu_falta
			) // Atributos (array)
		);

		if($cartao>0)
			$this->evento_cartao($tempo, $jogador_cometeu_falta, $cartao);

		$this->addEvento($new_falta);
	}


	/*
		Add Evento Cartão
	*/
	public function evento_cartao ($tempo, $jogador_levou_cartao, $cartao=1) {
		$this->load->model('jogador');
		$new_cartao = array(
			'key' 		=> md5(time().' '.microtime()),
			'tipo' 		=> 'cartao', // Tipo
			'tempo' 	=> $tempo, // Tempo do jogo exemplo: [35/1] ou [42/2]
			'atributos' => array(
				'equipe'				=> (new Jogador($jogador_levou_cartao))->id_equipe,
				'jogador_levou_cartao' 	=> $jogador_levou_cartao,
				'cartao' 				=> $cartao // 
			) // Atributos (array)
		);

		$this->addEvento($new_cartao);
	}
	
	/*
		Add Evento Cartão
	*/
	public function evento_finalizar_jogo ($tempo) {
		$new_finalizado = array(
			'key' 		=> md5(time().' '.microtime()),
			'tipo' 		=> 'finalizado', // Tipo
			'tempo' 	=> $tempo,
			'atributos' => array() // Atributos (array)
		);

		$this->addEvento($new_finalizado);
	}


	/*
		Get Status
	*/
	public function get_gols_status () {
		$status = [];
		$status['equipe_1'] = 0;
		$status['equipe_2'] = 0;

		foreach ($this->SYN_Log->eventos as $key => $evento) {
			if($evento->tipo == 'gol'){
				// Verifica se é gol contra
				if($evento->atributos->contra) {
					// Se for gol contra, add gol para a outra equipe
					if($evento->atributos->equipe == 1)
						$status['equipe_2']++;
					else
						$status['equipe_1']++;
				} else {
					// Se não for contra, incrementa o saldo
					$status['equipe_'.$evento->atributos->equipe]++;
				}
			}
		}

		return $status;
	}


	/*
		Get Gols
	*/
	public function get_gols () {
		$status = [];
		$status['equipe_1'] = [];
		$status['equipe_2'] = [];

		foreach ($this->SYN_Log->eventos as $key => $evento) {
			if($evento->tipo == 'gol'){
				// Verifica se é gol contra
				if($evento->atributos->contra) {
					$status['equipe_'.$evento->atributos->equipe][] = array('contra'=>1);
				} else {
					// Se não for contra, incrementa o saldo
					$status['equipe_'.$evento->atributos->equipe][] = array('contra'=>0);
				}
			}
		}


		return $status;
	}


	/*
		Ao vivo
	*/
	public function Ao_vivo () {
		$this->load->model('jogador');

		$msgs = [];

		foreach ($this->SYN_Log->eventos as $key => $evento) {
			if($evento->tipo == 'gol') {
				$jogador = new Jogador($evento->atributos->jogador);
				$msgs[] = array(
					'equipe' 	=> $evento->atributos->equipe,
					'msg' 		=> "Gol do $jogador!"
				);
			}
		}
	}
}