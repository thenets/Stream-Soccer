<?php

class Equipe extends SYN_Model {
	public function __construct ($id=0) {
		// @SYN_Model::scaffold ($table_name, $id, <optional : className>)
		$this->scaffold('equipes', $id);

		$this->escudo = base_url('public/img/equipes/'.$id.'.png');
	}

	public static function getAll () {
		$ci =& get_instance();
		$result = $ci->db->get('equipes')->result();

		$all = [];
		foreach ($result as $key => $value) {
			$all[] = new Equipe($value->id_equipe);
		}

		// Remove "N/D"
		foreach ($all as $key => &$equipe) {
			if($equipe->nome == 'N/D' || empty($equipe->nome)) {
				unset($all[$key]);
			}
		}
		sort($all);
		
		return $all;
	}
	
	public static function getEquipeById ($id_equipe){
		$ci =& get_instance();
		$result = $ci->db->get_where('equipes',['id_equipe'=>$id_equipe])->result();
		$all = null;
		foreach ($result as $key => $value) {
			$all = new Equipe($value->id_equipe);
		}
		
		return $all;
	}

	public function getJogadores () {
		$this->load->model('jogador');

		$jogadores = [];

		$this->db->where('id_equipe', $this->id_equipe);
		$result = $this->db->get('jogadores')->result();

		foreach ($result as $key => $jogador) {
			$jogadores[] = new Jogador($jogador->id_jogador);
		}

		return $jogadores;
	}
}