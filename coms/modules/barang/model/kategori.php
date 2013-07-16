<?php
class model_kategori extends model {

	public function __construct() {
		parent::__construct();	
	}
	
	function read($id){
		$sql = "SELECT
					mid(md5(`tbl_kategori`.`kategori_id`),5,5) as `id`,
					`tbl_kategori`.`kategori_id`,
					`tbl_kategori`.`kategori_key`,
					`tbl_kategori`.`keterangan`,
					`tbl_kategori`.`is_publish`,
					if(`tbl_kategori`.`is_publish`=1,'Publish','') as `ispublish`,
					`tbl_kategori`.`parent_id`,
					(SELECT `a`.keterangan FROM `babyaffata`.`tbl_kategori` as `a` WHERE `a`.kategori_id = `tbl_kategori`.`parent_id`) as `ptahap`,
					(SELECT `b`.keterangan FROM  `babyaffata`.`tbl_kategori` as `b` WHERE `b`.kategori_id = `tbl_kategori`.`kategori_id`) as `kategori`
					FROM
					`babyaffata`.`tbl_kategori`
					WHERE 1=1 
					";

		if($id!=""){
			$sql=$sql . " AND mid(md5(`tbl_kategori`.`kategori_id`),5,5)='".$id."' ";
		}
		
		//$sql = $sql . "ORDER BY `tbl_kategori`.`last_update` DESC";
		$result = $this->db->query( $sql );
	
		return $result;	
	}

    function search($key){
        $key = $this->db->escape($key);
        $sql = "SELECT
					mid(md5(`tbl_kategori`.`kategori_id`),5,5) as `id`,
					`tbl_kategori`.`kategori_id`,
					`tbl_kategori`.`kategori_key`,
					`tbl_kategori`.`keterangan`,
					`tbl_kategori`.`is_publish`,
					if(`tbl_kategori`.`is_publish`=1,'Publish','') as `ispublish`,
					`tbl_kategori`.`parent_id`,
					(SELECT `a`.keterangan FROM `babyaffata`.`tbl_kategori` as `a` WHERE `a`.kategori_id = `tbl_kategori`.`parent_id`) as `ptahap`,
					(SELECT `b`.keterangan FROM  `babyaffata`.`tbl_kategori` as `b` WHERE `b`.kategori_id = `tbl_kategori`.`kategori_id`) as `kategori`
					FROM
					`babyaffata`.`tbl_kategori`
					WHERE
					`tbl_kategori`.`kategori_id` LIKE '%$key%'
					OR `tbl_kategori`.`keterangan` LIKE '%$key%'
					LIMIT 100
					";
        $result = $this->db->query( $sql ); //var_dump($this->db);

        return $result;
    }
	
	
	function get_kategori(){
		$sql = "SELECT
				`tbl_kategori`.`kategori_id`,
				`tbl_kategori`.`kategori_key`,
				`tbl_kategori`.`keterangan`,
				`tbl_kategori`.`parent_id`,
				`tbl_kategori`.`is_publish`,
				(SELECT `b`.keterangan FROM  `babyaffata`.`tbl_kategori` as `b` WHERE `b`.kategori_id = `tbl_kategori`.`kategori_id`) as `kategori`
				FROM
				babyaffata.`tbl_kategori`
				ORDER BY `tbl_kategori`.`keterangan` ASC
				";
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
	function get_tahap(){
		$sql = "SELECT
					`tbl_kategori`.`kategori_id`,
					`tbl_kategori`.`kategori_key`,
					`tbl_kategori`.`keterangan`,
					`tbl_kategori`.`is_aktif`,
					`tbl_kategori`.`parent_id`,
					(SELECT `a`.keterangan FROM `babyaffata`.`tbl_kategori` as `a` WHERE `a`.kategori_id = `tbl_kategori`.`parent_id`) as `ptahap`
				FROM
				 	`babyaffata`.`tbl_kategori`
				WHERE is_aktif='1' ORDER BY parent_id ASC
					";
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
	function replace_kategori($datanya) {
		$result= $this->db->replace('babyaffata`.`tbl_kategori',$datanya);
		return $result;
	}
	
	function delete_komponen($datanya) {
		return $this->db->delete('babyaffata`.`tbl_kategori',$datanya);
	}
	
	function get_kategori_id($str=NULL){
		$sql="SELECT RIGHT(concat( '0000' , CAST(IFNULL(MAX(CAST(right(kategori_id,4) AS unsigned)), 0) + 1 AS unsigned)),4) as `data` 
				FROM babyaffata.tbl_kategori";		
		$result = $this->db->query( $sql );
		
		foreach($result as $dt):
			$strresult = $dt->data;
		endforeach;
		
		return $strresult;
	}
}

?>