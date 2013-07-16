<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aryo
 * Date: 7/15/13
 * Time: 12:31 PM
 * To change this template use File | Settings | File Templates.
 */

class model_kategori extends model {

    public $kategoris = array();

    public function __construct() {
        parent::__construct();
    }

    public function getAllKategori() {

        $sql = "SELECT kategori_id, kategori_key, keterangan, parent_id, is_publish FROM tbl_kategori";

        $kategoris = $this->db->getResults($sql);
        if(is_array($kategoris))
            $this->kategoris = $kategoris;

        return $this->kategoris;
    }

}