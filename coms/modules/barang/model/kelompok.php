<?php
class model_kelompok extends model {

	public function __construct() {
		parent::__construct();	
	}
	
	function read($id){
		$sql = "SELECT
					mid(md5(`tbl_kelompok_barang`.`kelompok_id`),5,5) as `id`,
					`tbl_kelompok_barang`.`kelompok_id`,
					`tbl_kelompok_barang`.`keterangan`,
					`tbl_kelompok_barang`.`kategori_id`,
					`tbl_kelompok_barang`.`is_aktif`,
					`tbl_kelompok_barang`.`is_publish`, 
					if(`tbl_kelompok_barang`.`is_aktif`=1,'Aktif','Non Aktif') as `isaktif`,
					if(`tbl_kelompok_barang`.`is_publish`=1,'Publish','') as `ispublish`,
					`tbl_kelompok_barang`.`parent_id`,
					(SELECT `a`.keterangan FROM `db_purwandana`.`tbl_kelompok_barang` as `a` WHERE `a`.kelompok_id = `tbl_kelompok_barang`.`parent_id`) as `ptahap`,
					(SELECT `b`.keterangan FROM  `db_purwandana`.`tbl_kategori_barang` as `b` WHERE `b`.kategori_id = `tbl_kelompok_barang`.`kategori_id`) as `kategori`
					FROM
					`db_purwandana`.`tbl_kelompok_barang`
					WHERE 1=1 
					";
		if($id!=""){
			$sql=$sql . " AND mid(md5(`tbl_kelompok_barang`.`kelompok_id`),5,5)='".$id."' ";
		}
		
		$sql = $sql . "ORDER BY `tbl_kelompok_barang`.`last_update` DESC";
		$result = $this->db->query( $sql );
	
		return $result;	
	}
	
	
	function get_kategori(){
		$sql = "SELECT
				`tbl_kategori_barang`.`kategori_id`,
				`tbl_kategori_barang`.`keterangan`,
				`tbl_kategori_barang`.`is_publish`
				FROM
				db_purwandana.`tbl_kategori_barang`
				ORDER BY `tbl_kategori_barang`.`keterangan` ASC
				";
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
	function get_tahap(){
		$sql = "SELECT
					`tbl_kelompok_barang`.`kelompok_id`,
					`tbl_kelompok_barang`.`keterangan`,
					`tbl_kelompok_barang`.`is_aktif`,
					`tbl_kelompok_barang`.`parent_id`,
					(SELECT `a`.keterangan FROM `db_purwandana`.`tbl_kelompok_barang` as `a` WHERE `a`.kelompok_id = `tbl_kelompok_barang`.`parent_id`) as `ptahap`
				FROM
				 	`db_purwandana`.`tbl_kelompok_barang`
				WHERE is_aktif='1' ORDER BY parent_id ASC
					";
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
	function replace_kelompok($datanya) {
		$result= $this->db->replace('db_purwandana`.`tbl_kelompok_barang',$datanya);
		return $result;
	}
	
	function delete_komponen($datanya) {
		return $this->db->delete('db_purwandana`.`tbl_kelompok_barang',$datanya);
	}
	
	function get_kelompok_id($str=NULL){
		$sql="SELECT RIGHT(concat( '0000' , CAST(IFNULL(MAX(CAST(right(kelompok_id,4) AS unsigned)), 0) + 1 AS unsigned)),4) as `data` 
				FROM db_purwandana.tbl_kelompok_barang";		
		$result = $this->db->query( $sql );
		
		foreach($result as $dt):
			$strresult = $dt->data;
		endforeach;
		
		return $strresult;
	}
}

?>