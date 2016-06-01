<?php

class Equipe extends SYN_Model {
	public function __construct ($id=0) {
		// @SYN_Model::scaffold ($table_name, $id, <optional : className>)
		$this->scaffold('equipes', $id);
	}

	public static function getAll () {
		$ci =& get_instance();
		$result = $ci->db->get('equipes')->result();

		$all = [];
		foreach ($result as $key => $value) {
			$all[] = new Equipe($value->id_equipe);
		}
		
		return $all;
	}
}