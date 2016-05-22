<?php

class Arbitro extends SYN_Model {
	public function __construct ($id=0) {
		// @SYN_Model::scaffold ($table_name, $id, <optional : className>)
		$this->scaffold('arbitros', $id);
	}

	public static function getAll () {
		$ci =& get_instance();
		$result = $ci->db->get('arbitros')->result();

		$all = [];
		foreach ($result as $key => $value) {
			$all[] = new Arbitro($value->id_arbitro);
		}
		
		return $all;
	}
}