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
}