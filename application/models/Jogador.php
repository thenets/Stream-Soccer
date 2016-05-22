<?php

class Jogador extends SYN_Model {
    public function __construct ($id=0) {
        // @SYN_Model::scaffold ($table_name, $id, <optional : className>)
        $this->scaffold('jogadores', $id);
    }
}