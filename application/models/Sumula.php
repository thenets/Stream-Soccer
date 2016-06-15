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
			$this->SYN_Events = json_decode($this->log);
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

	public function getEscalacao ($time) { // 0 ou 1
		$this->load->model('jogador');

		$equipe = [];
		foreach ($this->SYN_Events->escalacao[$time] as $key => $jogador) {
			$equipe[] = new Jogador($jogador);
		}

		return $equipe;
	}

	public function updateLog () {
		$this->log = json_encode($this->SYN_Events);
		$this->save();
	}

	public function addEscalacao ($array_new_escalacao) {
		if(count($this->SYN_Events) < 3) {
			$this->SYN_Events->escalacao[] = $array_new_escalacao;
		}

		$this->updateLog();
	}
}