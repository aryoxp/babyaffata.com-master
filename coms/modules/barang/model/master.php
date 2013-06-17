<?php
class model_master extends model {

	public function __construct() {
		parent::__construct();	
	}
	
	function read($id){
		$sql = "SELECT
					mid(md5(`tbl_kategori_barang`.`kategori_id`),5,5) as `id`,
					`tbl_kategori_barang`.`kategori_id`,
					`tbl_kategori_barang`.`keterangan`,
					`tbl_kategori_barang`.`is_aktif`,
					if(`tbl_kategori_barang`.`is_aktif`=1,'Aktif','Non Aktif') as `isaktif`,
					`tbl_kategori_barang`.`parent_id`,
					(SELECT `a`.keterangan FROM `db_purwandana`.`tbl_kategori_barang` as `a` WHERE `a`.kategori_id = `tbl_kategori_barang`.`parent_id`) as `ptahap`
					FROM
					`db_purwandana`.`tbl_kategori_barang`
					WHERE 1=1 
					";
		if($id!=""){
			$sql=$sql . " AND mid(md5(`tbl_kategori_barang`.`kategori_id`),5,5)='".$id."' ";
		}
		
		$sql = $sql . "ORDER BY `tbl_kategori_barang`.`last_update` DESC";
		$result = $this->db->query( $sql );
	
		return $result;	
	}
	
	function get_tahap(){
		$sql = "SELECT
					`tbl_kategori_barang`.`kategori_id`,
					`tbl_kategori_barang`.`keterangan`,
					`tbl_kategori_barang`.`is_aktif`,
					`tbl_kategori_barang`.`parent_id`,
					(SELECT `a`.keterangan FROM `db_purwandana`.`tbl_kategori_barang` as `a` WHERE `a`.kategori_id = `tbl_kategori_barang`.`parent_id`) as `ptahap`
				FROM
				 	`db_purwandana`.`tbl_kategori_barang`
				WHERE is_aktif='1' ORDER BY parent_id ASC
					";
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
	function replace_kategori($datanya) {
		$result= $this->db->replace('db_purwandana`.`tbl_kategori_barang',$datanya);
		return $result;
	}
	
	function delete_komponen($datanya) {
		return $this->db->delete('db_purwandana`.`tbl_kategori_barang',$datanya);
	}
	
	function get_kode_barang($str=NULL){
		$sql="SELECT RIGHT(concat( '000' , CAST(IFNULL(MAX(CAST(right(kode_barang,3) AS unsigned)), 0) + 1 AS unsigned)),3) as `data` 
				FROM db_purwandana.tbl_master_barang WHERE (left(kode_barang,3)='".$str."')";		
		$result = $this->db->query( $sql );
		
		foreach($result as $dt):
			$strresult = $dt->data;
		endforeach;
		
		return $strresult;
	}
	
	function get_barang_id(){
		$sql="SELECT RIGHT(concat( '0000' , CAST(IFNULL(MAX(CAST(right(barang_id,4) AS unsigned)), 0) + 1 AS unsigned)),4) as `data` 
				FROM db_purwandana.tbl_master_barang ";		
		$result = $this->db->query( $sql );
		
		foreach($result as $dt):
			$strresult = $dt->data;
		endforeach;
		
		return $strresult;
	}
}

?>