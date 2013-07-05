<?php
class model_conf extends model {

	public function __construct() {
		parent::__construct();	
	}	
	
	
	/* master kategori barang*/
	function get_kategori_barang($term = NULL){
		//$sql= "SELECT kategori_id as `id`, keterangan as `value` FROM `babyaffata`.`tbl_kategori` WHERE keterangan like '%".$term."%' ";
		$sql = "SELECT `tbl_kategori`.kategori_id as `id`, 
					CASE 
						WHEN `tbl_kategori`.parent_id ='0' AND `tbl_kategori`.`keterangan` like '%".$term."%' THEN `tbl_kategori`.`keterangan` 
						WHEN `b`.`keterangan` like '%".$term."%'  AND `b`.`keterangan` IS NOT NULL AND `b`.parent_id <> 0 THEN 
							concat(`tbl_kategori`.`keterangan`, ' > ', `b`.`keterangan`, ' > ', `a`.`keterangan`, ' > ',  `tbl_kategori`.`keterangan`)
						WHEN  `a`.`keterangan` like '%".$term."%'  AND `a`.`keterangan`  IS NOT NULL AND `a`.parent_id <> 0 THEN  
							concat(`tbl_kategori`.`keterangan`, ' > ', `a`.`keterangan`, ' > ',  `tbl_kategori`.`keterangan`) 
						WHEN (`a`.`keterangan` like '%".$term."%'  OR `a`.`keterangan`  IS  NULL) AND `tbl_kategori`.parent_id <> 0 THEN  
							concat(`tbl_kategori`.`keterangan`, ' > ', `tbl_kategori`.`keterangan`) 
					END as `value` 
				FROM
					`babyaffata`.`tbl_kategori`
				Left Join `babyaffata`.`tbl_kategori` AS `a` ON `tbl_kategori`.`parent_id` = `a`.`kategori_id`
				Left Join `babyaffata`.`tbl_kategori` AS `b` ON `a`.`parent_id` = `b`.`kategori_id`
				Inner Join `babyaffata`.`tbl_kategori` AS `c` ON `tbl_kategori`.`kategori_id` = `c`.`kategori_id`
				WHERE 
					CASE 
						WHEN `tbl_kategori`.parent_id ='0' AND `tbl_kategori`.`keterangan` like '%".$term."%' THEN `tbl_kategori`.`keterangan` 
						WHEN `b`.`keterangan` like '%".$term."%'  AND `b`.`keterangan` IS NOT NULL  AND `b`.parent_id <> 0 THEN concat(`b`.`keterangan`, ' > ', `a`.`keterangan`, ' > ',  `tbl_kategori`.`keterangan`)
						WHEN  `a`.`keterangan` like '%".$term."%'  AND `a`.`keterangan`  IS NOT NULL AND `a`.parent_id <> 0 THEN  concat(`a`.`keterangan`, ' > ',  `tbl_kategori`.`keterangan`) 
						WHEN (`a`.`keterangan` like '%".$term."%'  OR `a`.`keterangan`  IS  NULL) AND `tbl_kategori`.parent_id <> 0 THEN   `tbl_kategori`.`keterangan`
					END IS NOT NULL
				";
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
	/* master brand*/
	function get_brand($term = NULL){
		$sql= "SELECT brand_id as `id`, keterangan as `value` FROM `babyaffata`.`tbl_brand` WHERE keterangan like '%".$term."%'  ORDER BY keterangan ASC";
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
	/* master detail product*/
	function get_nama_detail_barang($term = NULL){
		$sql= "SELECT nama_detail_id as `id`, keterangan as `value` FROM `babyaffata`.`tbl_nama_detail` WHERE keterangan like '%".$term."%'  ORDER BY keterangan ASC";
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
	function get_dimensi_barang($term = NULL){
		$sql= "SELECT jenis_dimensi_barang as `id`, jenis_dimensi_barang as `value` FROM `babyaffata`.`tbl_jenis_dimensi_barang` WHERE jenis_dimensi_barang like '%".$term."%'  ORDER BY jenis_dimensi_barang ASC";
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