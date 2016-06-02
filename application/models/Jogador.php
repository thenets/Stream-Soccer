<?php

class Jogador extends SYN_Model {
    public function __construct ($id=0) {
        // @SYN_Model::scaffold ($table_name, $id, <optional : className>)
        $this->scaffold('jogadores', $id);
    }
    
    public static function getAll(){
        $ci =& get_instance();
		$result = $ci->db->get('jogadores')->result();

		$all = [];
		foreach ($result as $key => $value) {
			$all[] = new Jogador($value->id_jogador);
		}
		
		return $all;
    }
    
    public static function getAllByEquipe($id_equipe){
        $ci =& get_instance();
        $result = $ci->db->get_where('jogadores',['id_equipe'=>$id_equipe])->result();
        $all = [];
		foreach ($result as $key => $value) {
			$all[] = new Jogador($value->id_jogador);
		}
		
		return $all;
    }
}