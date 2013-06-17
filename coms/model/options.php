<?php

class model_options extends model {
	public function __construct() {
		parent::__construct();
	}
	
	public function read($id){
	
		$sql = "SELECT id, name, description, value, level FROM coms.coms_options ";
		$sql .= "WHERE name = '".$this->db->escape($id)."'";
	
		$option = $this->db->getRow( $sql );
		
		return unserialize($option->value);
		
	}
	
	public function save($id, $value){
		
		$data['value'] = serialize($value);
		$where['name'] = $id;
		
		$affected = $this->db->update('coms.coms_options', $data, $where);
		//var_dump($this->db);
		return $affected;
		
	}

}
