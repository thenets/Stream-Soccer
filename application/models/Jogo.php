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
			$all[] = new Jogo($value->id_jogo);
		}
		
		return $all;
    }
    
    public static function getAllByCampeonato($id_campeonato){
        $ci =& get_instance();
        $ci->db->where('id_campeonato', $id_campeonato);
		$result = $ci->db->get('jogos')->result();

		$all = [];
		foreach ($result as $key => $value) {
			$all[] = new Jogo($value->id_jogo);
		}
		
		return $all;
    }
    
    public static function getEmAndamento(){
        $ci =& get_instance();
        $ci->db->where('finalizado', '0');
		$result = $ci->db->get('jogos')->result();

		$all = [];
		foreach ($result as $key => $value) {
			$all[] = new Jogo($value->id_jogo);
		}
		
		return $all;
    }

    public function getResultado(){
    	$this->load->model('sumula');
    	$sumula = new Sumula($this->id_jogo);

    	return $sumula->get_gols_status();
    }
}