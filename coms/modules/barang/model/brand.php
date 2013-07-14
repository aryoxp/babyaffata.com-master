<?php
class model_brand extends model {

	public function __construct() {
		parent::__construct();	
	}
	
	function read($id){
		$sql = "SELECT
					mid(md5(`tbl_brand`.`brand_id`),5,5) as `id`,
					`tbl_brand`.`brand_id`,
					`tbl_brand`.`logo`,
					`tbl_brand`.`logo_thumb`,
					`tbl_brand`.`keterangan`
					FROM
					`babyaffata`.`tbl_brand`
					WHERE 1=1 
					";
		if($id!=""){
			$sql=$sql . " AND mid(md5(`tbl_brand`.`brand_id`),5,5)='".$id."' ";
		}
		
		$sql = $sql . "ORDER BY `tbl_brand`.`keterangan` ASC";
		$result = $this->db->query( $sql );
	
		return $result;	
	}
	
	
	function replace_brand($datanya) {

		$result= $this->db->replace('babyaffata`.`tbl_brand',$datanya); //var_dump($datanya); //var_dump($this->db);
		return $result;
	}
	
	function update_brand($datanya, $idnya) {
		$result= $this->db->update('babyaffata`.`tbl_brand',$datanya, $idnya);
		return $result;
	}
	
	function delete_brand($datanya) {
		return $this->db->delete('babyaffata`.`tbl_brand',$datanya);
	}
}

?>