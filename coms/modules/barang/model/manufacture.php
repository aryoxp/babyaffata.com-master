<?php
class model_manufacture extends model {

	public function __construct() {
		parent::__construct();	
	}
	
	function read($id){
		$sql = "SELECT
					mid(md5(`tbl_manufacture`.`manufacture_id`),5,5) as `id`,
					`tbl_manufacture`.`manufacture_id`,
					`tbl_manufacture`.`manufacture_by`
					FROM
					`db_purwandana`.`tbl_manufacture`
					WHERE 1=1 
					";
		if($id!=""){
			$sql=$sql . " AND mid(md5(`tbl_manufacture`.`manufacture_id`),5,5)='".$id."' ";
		}
		
		$sql = $sql . "ORDER BY `tbl_manufacture`.`manufacture_by` ASC";
		$result = $this->db->query( $sql );
	
		return $result;	
	}
	
	
	function replace_manufacture($datanya) {
		$result= $this->db->replace('db_purwandana`.`tbl_manufacture',$datanya);
		return $result;
	}
	
	function update_manufacture($datanya, $idnya) {
		$result= $this->db->update('db_purwandana`.`tbl_manufacture',$datanya, $idnya);
		return $result;
	}
	
	function delete_manufacture($datanya) {
		return $this->db->delete('db_purwandana`.`tbl_manufacture',$datanya);
	}
}

?>