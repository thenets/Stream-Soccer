<?php

class Campeonato extends SYN_Model {
	public function __construct ($id=0) {
		// @SYN_Model::scaffold ($table_name, $id, <optional : className>)
		$this->scaffold('campeonatos', $id);
	}

	public static function getAll () {
		$ci =& get_instance();
		$result = $ci->db->get('campeonatos')->result();

		$all = [];
		foreach ($result as $key => $value) {
			$all[] = new Campeonato($value->id_campeonato);
		}
		
		return $all;
	}

	public function getJogos() {
		$this->load->model('jogo');
		$jogos = [];
		$this->db->where('id_campeonato', $this->id_campeonato);
		$jogos = $this->db->get('jogos')->result();
		return $jogos;
	}

	public function getStatusJogos() {
		$this->load->model('equipe');
		$this->load->model('jogador');
		$this->load->model('jogo');
		$this->load->model('sumula');
		$this->load->model('campeonato');

		/*
			Estrutura final:
			array<Equipe> = ('vitorias', 'derrotas', 'empates', 'gols_a_favor', 'gols_contra', 'gols_saldo')
		*/

		// Jogos do campeonato
		$jogos = [];
		$this->db->where('id_campeonato', $this->id_campeonato);
		$jogos = $this->db->get('jogos')->result();
		foreach ($jogos as $key => &$jogo) {
			$jogo = new Jogo($jogo->id_jogo);
		}

		// Equipes
		$equipes = [];
		foreach ($jogos as $key => $jogo) {
			$equipes[] = $jogo->equipe_1;
			$equipes[] = $jogo->equipe_2;
		}
		$equipes = array_unique($equipes);

		// Status de cada equipe
		$status = [];
		

		foreach ($equipes as $key => $equipe_id) {
			// Status
			$status['equipe_'.$equipe_id] = array('id_equipe' => $equipe_id, 'vitoria' => 0, 'derrota' => 0, 'empate' => 0, 'gols_pro' => 0, 'gols_contra' => 0);

			// Gols a favor
			foreach ($jogos as $key => $jogo) {
				if($jogo->equipe_1 == $equipe_id) {
					$sumula = new Sumula($jogo->id_jogo);
					$gols = $sumula->get_gols_status();
					if($gols['equipe_1'] > $gols['equipe_2']) {
						$status['equipe_'.$equipe_id]['vitoria']++;
					}
					else if ($gols['equipe_1'] == $gols['equipe_2']) {
						$status['equipe_'.$equipe_id]['empate']++;
					}
					else {
						$status['equipe_'.$equipe_id]['derrota']++;	
					}

					$status['equipe_'.$equipe_id]['gols_pro'] 	+= $gols['equipe_1'];
					$status['equipe_'.$equipe_id]['gols_contra'] 	+= $gols['equipe_2'];
				}
			}

		}


		// DEBUG 
		//print_r($status);
		//exit();		

		return $status;


	}
}