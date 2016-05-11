<?php

class Arbitro extends CI_Model {
	/*
		Config
		Return config data
	*/
	public function config () {
		$config = new stdClass();
		$config->table_name = 'arbitros';
		$config->class_name = strtolower(get_class($this));

		return $config;
	}


    /*
        Construtor
    */
    public function __construct ($id=0) {
    	// Load database
        $this->load->database();

		// Create atributes to this object based on table
		foreach ($this->db->list_fields($this->config()->table_name) as $var) {
			$this->{$var} = '';
		}

		/*
			Get data from database
		*/
        if ($id) {
            $this->db->where('id_'.$this->config()->class_name, $id);

            $result = $this->db->get($this->config()->table_name)->result()[0];

            $this->{'id_'.$this->config()->class_name} = $result->{'id_'.$this->config()->class_name};
        }

        /*
            Create a new object to be add to database
        */
        else {
            unset( $this->{'id_'.$this->config()->class_name} );
        }
    }


    /*
        Insert or update object into database
    */
    public function save () {
        // Update
        // If has a PK 'id_nameclass'
        if ( isset($this->{'id_'.$this->config()->class_name}) ) {
             $this->db->update(
             	$this->config()->table_name, 
             	$this, array('id_'.$this->config()->class_name => $this->{'id_'.$this->config()->class_name})
             );
        }

        // Save / Insert into database
        else {
            $this->db->insert($this->config()->table_name, $this);
        }
    }


    /*
        Remove object from database
    */
    public function delete () {
        $this->db->delete($this->config()->table_name, array('id_trainer' => $this->id_trainer));
    }

}