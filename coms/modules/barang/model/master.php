<?php
class model_master extends model {

	public function __construct() {
		parent::__construct();	
	}
	
	function read($id=NULL){
		$sql = "SELECT
					mid(md5(`tbl_master_barang`.`barang_id`),5,5) as `id`,
					`babyaffata`.`tbl_master_barang`.`barang_id`,
					`babyaffata`.`tbl_master_barang`.`brand_id`,
					`babyaffata`.`tbl_master_barang`.`nama_barang`,
					`babyaffata`.`tbl_master_barang`.`kode_barang`,
					`babyaffata`.`tbl_master_barang`.`alias_barang`,
					`babyaffata`.`tbl_master_barang`.`is_publish`,
					`babyaffata`.`tbl_master_barang`.`parent_id`,
					`babyaffata`.`tbl_master_barang`.`user_id`,
					`babyaffata`.`tbl_master_barang`.`last_update`,
					`babyaffata`.`tbl_brand`.`keterangan` AS `brand`
					FROM
					`babyaffata`.`tbl_master_barang`
					Left Join `babyaffata`.`tbl_brand` ON `babyaffata`.`tbl_master_barang`.`brand_id` = `babyaffata`.`tbl_brand`.`brand_id`
					WHERE 1=1 
					";
		if($id){
			$sql=$sql . " AND mid(md5(`tbl_master_barang`.`barang_id`),5,5)='".$id."' ";
		}
		
		$sql = $sql . "ORDER BY `tbl_master_barang`.`last_update` DESC";
		$result = $this->db->query( $sql );
	
		return $result;	
	}
	
	function get_tahap(){
		$sql = "SELECT
					`tbl_kategori`.`kategori_id`,
					`tbl_kategori`.`keterangan`,
					`tbl_kategori`.`parent_id`,
					(SELECT `a`.keterangan FROM `babyaffata`.`tbl_kategori` as `a` WHERE `a`.kategori_id = `tbl_kategori`.`parent_id`) as `ptahap`
				FROM
				 	`babyaffata`.`tbl_kategori`
				WHERE is_publish='1' ORDER BY parent_id ASC
					";
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
		
	function delete_barang($datanya) {
		return $this->db->delete('babyaffata`.`tbl_master_barang',$datanya);
	}
	
	function get_kode_barang($str=NULL){
		$sql="SELECT RIGHT(concat( '000' , CAST(IFNULL(MAX(CAST(right(kode_barang,3) AS unsigned)), 0) + 1 AS unsigned)),3) as `data` 
				FROM babyaffata.tbl_master_barang WHERE (left(kode_barang,3)='".$str."')";		
		$result = $this->db->getRow( $sql );		
				
		return $result->data;
	}
	
	function get_barang_id($nama=NULL, $kode=NULL){
		$sql="SELECT barang_id as `data` FROM babyaffata.tbl_master_barang where nama_barang='".$nama."' AND kode_barang='".$kode."'";		
		$result = $this->db->getRow( $sql );		
					
		return $result->data;
	}
	
	function update_barang($datanya, $idnya) {
		$result= $this->db->update('babyaffata`.`tbl_master_barang',$datanya, $idnya);
		return $result;
	}
	
	function replace_barang($datanya) {
		$result= $this->db->replace('babyaffata`.`tbl_master_barang',$datanya);
		return $result;
	}
	
	function replace_stok($datanya) {
		$result= $this->db->replace('babyaffata`.`tbl_stok_barang',$datanya);
		
		return $result;
	}
	
	function insert_kategori_barang($datanya) {
		$result= $this->db->insert('babyaffata`.`tbl_kategori_barang',$datanya);
		return $result;
	}
	
	function replace_tags($datanya) {
	
		$result= $this->db->replace('babyaffata`.`tbl_tag_barang',$datanya);
			
		return $result;
	}
	
	function replace_foto($datanya) {
	
		$result= $this->db->replace('babyaffata`.`tbl_foto_barang',$datanya);
			
		return $result;
	}
	
	function replace_deskripsi($datanya) {
		$result= $this->db->replace('babyaffata`.`tbl_detail_barang',$datanya);
		return $result;
	}
	
	function update_harga_barang($datanya, $idnya) {
		$result= $this->db->update('babyaffata`.`tbl_harga_barang',$datanya, $idnya);
		return $result;
	}
	
	function replace_harga_barang($datanya) {
		$result= $this->db->replace('babyaffata`.`tbl_harga_barang',$datanya);
		var_dump($datanya);
		return $result;
	}
	
}

?>