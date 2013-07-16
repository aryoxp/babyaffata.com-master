<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aryo
 * Date: 7/15/13
 * Time: 12:27 PM
 * To change this template use File | Settings | File Templates.
 */

class kategori {
    public $kategori_id;
    public $kategori_key;
    public $keterangan;
    public $parent_id;
    public $is_publish;

    public $child = array();

    public function __construct($kat) {
        $this->kategori_id = $kat->kategori_id;
        $this->kategori_key = $kat->kategori_key;
        $this->keterangan = $kat->keterangan;
        $this->parent_id = $kat->parent_id;
        $this->is_publish = $kat->is_publish;
    }

    public function addChild($kat) {
        $this->child[] = $kat;
    }
}