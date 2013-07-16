<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>Baby Affata &middot; Baby Specialist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo $this->assets('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->assets('bootstrap/css/bootstrap-responsive.css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->assets('style/shared.css'); ?>" rel="stylesheet">

    <?php //var_dump($this->get_styles());
        $styles = $this->get_styles();
        foreach($styles as $s){
            echo '<link href="'.$this->assets($s).'" rel="stylesheet">';
        }
    ?>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo $this->assets('script/html5shiv.js'); ?>"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $this->assets('ico/apple-touch-icon-144-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->assets('bootstrap/ico/apple-touch-icon-114-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->assets('ico/apple-touch-icon-72-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $this->assets('bootstrap/ico/apple-touch-icon-57-precomposed.png'); ?>">
    <link rel="shortcut icon" href="<?php echo $this->assets('ico/favicon.png'); ?>">
    
  </head>

  <body>

  <div class="accent">
  	<div class="container">
  		<div class="row">
  		<div class="span2"></div>
  		<div class="span5" style="background-color: #ffcb13; height: 0.8em; margin: 0;"></div>
  		<div class="span3" style="background-color: #a9cacf; height: 0.8em; margin: 0;"></div>
  		<div class="span2" style="background-color: #f8eeb1; height: 0.8em; margin: 0;"></div>
  		</div>
  	</div>
  </div>
  
  <?php $this->view('top-menu.php'); ?>
  
  <div class="container">
  	<div class="row">
	  	<div class="span5">
	  		<img src="<?php echo $this->assets('images/logo-main.png'); ?>" alt="BabyAffata.com">
	  	</div>	
	  	<div class="span7">
			<div class="cart">
				<div class="cart-info">
					<div class="cart-info-item"><a href=""><strong>10 item(s)</strong></a></div>
					<div class="cart-info-total">Rp. 1.500.000,-</div>
				</div>
				<div class="cart-button">
	  			<a href="">
	  				<img src="<?php echo $this->assets('images/cart.png'); ?>" alt="cart">
	  				Checkout
	  			</a>
	  			</div>
	  		</div>
	  	</div>
  	</div>
  </div>
  
  <div class="container" style="background-color: #a9cacf;">
      <div class="menu-button">Menu</div>
      <ul class="menubar flexnav" data-breakpoint="800">
  		<li><a href="<?php echo $this->location(NULL, false); ?>">
                <img src="<?php echo $this->asset('images/icon-home.png'); ?>" alt="Home" style="width: 20px">
  		</a></li>
        <?php //var_dump($kategoris);

        function getChildKategori($kategori, $kategoris, $level, $coms) {
            $kategori = new kategori($kategori);

            $shown = false;
            foreach( $kategoris as $k ){
                if($k->parent_id != 0 and $k->parent_id == $kategori->kategori_id) {
                    $k = new kategori($k);
                    if(!$shown) {
                        $level++;
                        echo "\n\t".'<ul class="deep">';
                        $shown = true;
                    }
                    echo "\n\t\t".'<li><a href="'.$coms->location('product/list/kategori/'.$k->kategori_key).'">'.$k->keterangan.'</a>';
                    $k = getChildKategori($k, $kategoris, $level, $coms);
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
        //echo '<ul class="">';
        foreach($kategoris as $k) {
            if($k->parent_id == 0) {
                echo '<li><a href="'.$this->location('product/list/kategori/'.$k->kategori_key).'">'.$k->keterangan.'</a>';
                $k = getChildKategori($k, $kategoris, $level, $this);
                $kats[] = $k;
                echo '</li>'."\n";
            }
        }
        //echo '</ul>';

        //var_dump($kats);

        ?>
        <!--
  		<li><a href="">New Products</a></li>
  		<li><a href="">Promotion</a></li>
  		<li><a href="">Best Buy</a></li>
  		<li><a href="">Confirmation</a></li>
  		<li><a href="">Pre-Order</a></li>
  		<li><a href="">FAQs</a></li>
  		<li><a href="">Retail</a></li>
  		<li><a href="">Contacts</a></li>
  		-->
  	</ul>
  </div>