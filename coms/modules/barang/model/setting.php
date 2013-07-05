<?php
class model_setting extends model {

	public function __construct() {
		parent::__construct();	
	}
	
	function read($id=NULL){
		$sql = "SELECT
					mid(md5(`tbl_nama_detail`.`nama_detail_id`),5,5) as `id`,
					`tbl_nama_detail`.`nama_detail_id`,
					`tbl_nama_detail`.`keterangan`
					FROM
					`babyaffata`.`tbl_nama_detail`
					WHERE 1=1 
					";
		if($id!=""){
			$sql=$sql . " AND mid(md5(`tbl_nama_detail`.`nama_detail_id`),5,5)='".$id."' ";
		}
		
		$sql = $sql . "ORDER BY `tbl_nama_detail`.`keterangan` ASC";
		$result = $this->db->query( $sql );
	
		return $result;	
	}
	
	
	function replace_nama_detail($datanya) {
		$result= $this->db->replace('babyaffata`.`tbl_nama_detail',$datanya);
		return $result;
	}
	
	function update_nama_detail($datanya, $idnya) {
		$result= $this->db->update('babyaffata`.`tbl_nama_detail',$datanya, $idnya);
		return $result;
	}
	
	function delete_nama_detail($datanya) {
		return $this->db->delete('babyaffata`.`tbl_nama_detail',$datanya);
	}
}

?>