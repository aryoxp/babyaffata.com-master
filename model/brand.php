<?php

class model_brand extends model {
	public function __construct() {
		parent::__construct();
	}
	
	public function read(){

        $sql = "SELECT brand_id, keterangan, logo, logo_thumb, user_id, last_update "
            . "FROM tbl_brand ORDER BY RAND()";
	
		$brands = $this->db->getResults( $sql );
        return $brands;
		
	}

}
