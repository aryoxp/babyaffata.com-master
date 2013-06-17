<?php
class model_conf extends model {

	public function __construct() {
		parent::__construct();	
	}	
	
	
	/* master kategori barang*/
	function get_kategori_barang($term = NULL){
		//$sql= "SELECT kelompok_id as `id`, keterangan as `value` FROM `db_purwandana`.`tbl_kelompok_barang` WHERE keterangan like '%".$term."%' ";
		$sql = "SELECT `tbl_kelompok_barang`.kelompok_id as `id`, 
					CASE 
						WHEN `b`.`keterangan` like '%".$term."%'  AND `b`.`keterangan` IS NOT NULL THEN 
							concat(`tbl_kategori_barang`.`keterangan`, ' > ', `b`.`keterangan`, ' > ', `a`.`keterangan`, ' > ',  `tbl_kelompok_barang`.`keterangan`)
						WHEN  `a`.`keterangan` like '%".$term."%'  AND `a`.`keterangan`  IS NOT NULL THEN  
							concat(`tbl_kategori_barang`.`keterangan`, ' > ', `a`.`keterangan`, ' > ',  `tbl_kelompok_barang`.`keterangan`) 
						WHEN `a`.`keterangan` like '%".$term."%'  OR `a`.`keterangan`  IS  NULL THEN  
							concat(`tbl_kategori_barang`.`keterangan`, ' > ', `tbl_kelompok_barang`.`keterangan`) 
					END as `value` 
				FROM
					`db_purwandana`.`tbl_kelompok_barang`
				Left Join `db_purwandana`.`tbl_kelompok_barang` AS `a` ON `tbl_kelompok_barang`.`parent_id` = `a`.`kelompok_id`
				Left Join `db_purwandana`.`tbl_kelompok_barang` AS `b` ON `a`.`parent_id` = `b`.`kelompok_id`
				Inner Join `db_purwandana`.`tbl_kategori_barang` ON `tbl_kelompok_barang`.`kategori_id` = `tbl_kategori_barang`.`kategori_id`
				WHERE 
					CASE 
						WHEN `b`.`keterangan` like '%".$term."%'  AND `b`.`keterangan` IS NOT NULL THEN concat(`b`.`keterangan`, ' > ', `a`.`keterangan`, ' > ',  `tbl_kelompok_barang`.`keterangan`)
						WHEN  `a`.`keterangan` like '%".$term."%'  AND `a`.`keterangan`  IS NOT NULL THEN  concat(`a`.`keterangan`, ' > ',  `tbl_kelompok_barang`.`keterangan`) 
						WHEN `a`.`keterangan` like '%".$term."%'  OR `a`.`keterangan`  IS  NULL THEN   `tbl_kelompok_barang`.`keterangan`
					END IS NOT NULL
				";
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
	/* master manufacture*/
	function get_manufacture($term = NULL){
		$sql= "SELECT manufacture_id as `id`, manufacture_by as `value` FROM `db_purwandana`.`tbl_manufacture` WHERE manufacture_by like '%".$term."%'  ORDER BY manufacture_by ASC";
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
	function get_dimensi_barang($term = NULL){
		$sql= "SELECT jenis_dimensi_barang as `id`, jenis_dimensi_barang as `value` FROM `db_purwandana`.`tbl_jenis_dimensi_barang` WHERE jenis_dimensi_barang like '%".$term."%'  ORDER BY jenis_dimensi_barang ASC";
		$result = $this->db->query( $sql );
		
		return $result;
	}
	
		
	public function log($tablename, $datanya, $username, $action){
		$return_arr = array();
		array_push($return_arr,$datanya);		
			
		$data['user']		= $username;
		$data['session']	= session_id();
		$data['tgl']		= date("Y-m-d H:i:s");
		$data['reference']	= $_SERVER['HTTP_REFERER'];
		$data['table_name']	= $tablename;
		$data['field']		= json_encode($return_arr);	
		$data['action']		= $action;			
		
		$result = $this->db->insert("coms`.`coms_log", $data);
		
		if( ($result and !$this->db->getLastError()) ) 
			return true;
		else if(!$result) return false;
	}
	
	
}