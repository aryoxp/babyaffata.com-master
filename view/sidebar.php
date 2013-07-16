<div class="sidebar" style="border: 1px solid transparent; margin-bottom: -999999px; padding-bottom: 999999px;">
<div class="sidebar-header">
	Shopping Information
</div>

<ul>
	<li><a href="">Loyality Point</a></li>
	<li><a href="">Cara Pre-Order</a></li>
	<li><a href="">Iklan dengan Kami</a></li>
	<li><a href="">Konfirmasi Pembayaran</a></li>
	<li><a href="">Jadwal Pengiriman</a></li>
	<li><a href="">Reseller dan Dropship</a></li>
	<li><a href="">Check No Resi</a></li>
	<li><a href="">Estimasi Ongkos Kirim</a></li>
	<li><a href="">Belanja Cepat</a></li>
	<li><a href="<?php echo $this->location('page/read/aturan-belanja.html'); ?>">Aturan Belanja</a></li>
	<li><a href="">Cara Belanja</a></li>
</ul>

<div class="sidebar-header">
	Product Categories
</div>
<?php //var_dump($kategoris);

    function getChildKategori($kategori, $kategoris, $level, $coms) {
        $kategori = new kategori($kategori);
        $shown = false;
        foreach( $kategoris as $k ){
            if($k->parent_id != 0 and $k->parent_id == $kategori->kategori_id) {
                $k = new kategori($k);
                if(!$shown) {
                    $level++;
                    echo '<ul class="nav nav-tabs nav-stacked level-'.$level.'">';
                    $shown = true;
                }
                getChildKategori($k, $kategoris, $level, $coms);
                echo '<li><a href="'.$coms->location('product/list/kategori/'.$k->kategori_key).'">'.$k->keterangan.'</a>';
                $kategori->addChild($k);
                echo '</li>';

            }
        }
        if($shown) {
            echo '</ul>';
            $level--;
        }
        return $kategori;
    }

    $level=0;
    $kats = array();
    echo '<ul class="nav nav-tabs nav-stacked ">';
    foreach($kategoris as $k) {
        if($k->parent_id == 0) {
            echo '<li><a href="'.$this->location('product/list/kategori/'.$k->kategori_key).'">'.$k->keterangan.'</a>';
            $k = getChildKategori($k, $kategoris, $level, $this);
            $kats[] = $k;
            echo '</li>';
        }
    }
    echo '</ul>';

    //var_dump($kats);

?>
<!--
<ul>
	<li><a href="">Baby Box</a></li>
	<li><a href="">Baby Carrier</a></li>
	<li><a href="">Books</a></li>
	<li><a href="">Bags</a></li>
	<li><a href="">Magazine</a></li>
	<li><a href="">Diapers</a></li>
	<li><a href="">Potty</a></li>
	<li><a href="">Stroller</a></li>
	<li><a href="">Toys</a></li>
	<li><a href="">Maternity and Mom Care</a></li>
	<li><a href="">Nursing Accessories</a></li>
	<li><a href="">Healthcare Accessories</a></li>
	<li><a href="">Feeding Accessories</a></li>
	<li><a href="">Clothes</a></li>
	<li><a href="">Fancy</a></li>
	<li><a href="">Fashion</a></li>			
</ul>
-->
</div>