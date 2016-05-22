<?php
/*
SYN MODEL Scaffold

HOW TO USE


// Database Table example
//
// NEED TO CREATE A PRIMARY KEY WITH NAME "id_<class_model_name>"
// ========================================================================
CREATE TABLE IF NOT EXISTS `heros` (
  `id_hero` int(11) NOT NULL AUTO_INCREMENT,
  `real_name` varchar(255) DEFAULT NULL,
  `hero_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_hero`)
);


// Model example
// ========================================================================
class Hero extends SYN_Model {
	public function __contruct ($id=0) {
		// @SYN_Model::scaffold ($table_name, $id, <optional : className>)
		$this->scaffold('heros', $id);
	}	
}


// Controller example
// ========================================================================
class Heros extends CI_Controller {
    function index () {
        $this->load->model('hero');

        $arbitro = new Hero();
        $arbitro->real_name = 'Logan';
        $arbitro->hero_name = 'Wolverine';
        $arbitro->save();
    }
}
*/

class SYN_Model extends CI_Model {
	protected $SYN_table_name = null;

	/*
		Create a Scaffold
	*/
	public function scaffold ($table_name, $id=0) {
		$this->SYN_table_name = $table_name;

		$this->getAttributesFromDatabase($id);
	}


	/*
		Config
		Return config data
	*/
	private function config () {
		$config = new stdClass();
		$config->table_name = $this->SYN_table_name;
		$config->class_name = strtolower(get_class($this));

		return $config;
	}


    /*
        Get Attributes From Database to Create Object Vars
    */
    private function getAttributesFromDatabase ($id=0) {
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
            // Get user with filter based on id_<className>
            $this->db->where('id_'.$this->config()->class_name, $id);

            // Get result from database (a entry)
            $result = $this->db->get($this->config()->table_name)->result()[0];

            // Create id_<className> class var
            foreach ($result as $key => $value) {
                $this->{$key} = $value;
            }
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
    	// Create Obj to manipulated
    	$db_obj = new stdClass();
    	foreach (get_object_vars($this) as $key => $value) {
    		if(substr($key, 0, 4) != 'SYN_')
    			$db_obj->{$key} = $value;
    	}

        // Update
        // If has a PK 'id_nameclass'
        if ( isset($this->{'id_'.$this->config()->class_name}) ) {
            $this->db->update(
            	$this->config()->table_name, 
            	$db_obj, array('id_'.$this->config()->class_name => $this->{'id_'.$this->config()->class_name})
            );
        }

        // Save / Insert into database
        else {
            $this->db->insert($this->config()->table_name, $db_obj);
        }
    }


    /*
        Remove object from database
    */
    public function delete () {
        $this->db->delete($this->config()->table_name, array('id_'.$this->config()->class_name => $this->{'id_'.$this->config()->class_name}));
    }
}