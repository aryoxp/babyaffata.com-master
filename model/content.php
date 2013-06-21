<?php
class model_content extends model {
	public function __construct() {
		parent::__construct();
	}
	
	public function read($key) {
		$s = array('id','content_page','content_title','content_modified',
		'content_content','content_status','content_author_id');
		$w['content_page'] = $key;
		$res = $this->db->select('contents', $s, $w); //var_dump($this->db);
		if($res) return $res[0];
		else return null;
	}
}