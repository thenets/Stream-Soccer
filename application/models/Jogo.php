<?php

class Jogo extends SYN_Model {
    public function __construct ($id=0) {
        // @SYN_Model::scaffold ($table_name, $id, <optional : className>)
        $this->scaffold('jogos', $id);
    }
    
    public static function getAll(){
        $ci =& get_instance();
		$result = $ci->db->get('jogos')->result();

		$all = [];
		foreach ($result as $key => $value) {
			$all[] = new Jogo($value->id_jogador);
		}
		
		return $all;
    }
    
    public static function getAllByCampeonato($id){
        $ci =& get_instance();
        $ci->db->where('id_campeonato', $id);
		$result = $ci->db->get('jogos')->result();

		$all = [];
		foreach ($result as $key => $value) {
			$all[] = new Jogo($value->id_jogo);
		}
		
		return $all;
    }
}