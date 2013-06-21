<?php
class model_absen extends model {

	public function __construct() {
		parent::__construct('master');	
	}
	
	/* master jabatan */
	function  get_absen($id){
		$sql = "SELECT
				`vw_absen`.`jabatan`,
				`vw_absen`.`nama`,
				`vw_absen`.`gelar_awal`,
				`vw_absen`.`gelar_akhir`,
				`vw_absen`.`tgl_absen`,
				`vw_absen`.`jam_absen`,
				`vw_absen`.`foto`,
				`vw_absen`.`is_absen`
				FROM
				`vw_absen`
				
				";
		
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
	function  get_absen_pimpinan($id){
		$sql = "SELECT
				`vw_absenpimpinan`.`jabatan`,
				`vw_absenpimpinan`.`nama`,
				`vw_absenpimpinan`.`gelar_awal`,
				`vw_absenpimpinan`.`gelar_akhir`,
				`vw_absenpimpinan`.`tgl_absen`,
				`vw_absenpimpinan`.`jam_absen`,
				`vw_absenpimpinan`.`foto`,
				`vw_absenpimpinan`.`is_absen`
				FROM
				`vw_absenpimpinan`
				";
		
		$result = $this->db->query( $sql );
		
		return $result;	
	}
	
}