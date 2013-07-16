<div class="container content">
	<div class="row-fluid">
		<div class="span3">
            <ul class="hero-menu">
                <li><a href="">Promotions</a></li>
                <li><a href="">New Products</a></li>
                <li><a href="">Best Buy</a></li>
                <li><a href="">Confirmation</a></li>
                <li><a href="">FAQs</a></li>
            </ul>
            <div class="content-header" style="width: 99%">
                Search
            </div>
            <div class="search-badge">
                <form name="main-search" action="<?php echo $this->location('product/search'); ?>" method="get">
                    <input type="text" name="keyword" placeholder="Search">
                </form>
            </div>

		</div>
		
		<div class="span9">
			<div class="hero">
                &nbsp;
			</div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
			<div class="content-header">
				<div class="header-link"><a href="">Browse Our Products by Brands &raquo;</a></div>
				Popular Brands
			</div>
			<div class="content-box">
                <div class="slide-nav slide-nav-prev prev-page"
                     style="background:#DDD url('<?php echo $this->asset('images/nav.png'); ?>') 4px 3px no-repeat;">
                </div>
                <div class="slide-nav slide-nav-next next-page"
                     style="background:#DDD url('<?php echo $this->asset('images/nav.png'); ?>') 4px -17px no-repeat;">
                </div>
                <div id="brand-slider" class="slider">
                    <ul>
                        <?php //var_dump($brands);
                        foreach($brands as $b) :
                            $temp = explode("/",$b->logo);
                            $key = $temp[count($temp)-1];
                        ?>
                        <li><a href="<?php echo $this->location('product/list/brand/'.$key); ?>">
                                <img class="brand-icon" src="<?php echo $this->location("coms/".$b->logo_thumb); ?>"
                                     alt="<?php echo $b->keterangan; ?>">
                            </a></li>
                        <?php endforeach; ?>
                    </ul>
                    <!--#prev-page #prev-slide #next-slide #next-page-->
                </div>
			</div>

			<div class="content-header">
				<div class="header-link"><a href="">Our Best Offers &raquo;</a></div>
				New Products
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<?php $this->view('product-box.php'); ?>
					<?php $this->view('product-box.php'); ?>
					<?php $this->view('product-box.php'); ?>
                    <?php $this->view('product-box.php'); ?>
				</div>
				<div class="row-fluid">
					<?php $this->view('product-box.php'); ?>
					<?php $this->view('product-box.php'); ?>
					<?php $this->view('product-box.php'); ?>
                    <?php $this->view('product-box.php'); ?>
				</div>
			</div>
			
			<div class="about">
			<h2>What or Who is BabyAffata.com?</h2>
			<p>BabyAffata is an award winning baby website, a supplier of baby products and accessories including prams and pushchairs, nursery furnitures, car seats baby cots, baby furnitures, and equipments. We supply all the top brands including Fisher-Price, Peg-Perego, Coco-Latte, Avent by Philips, MacLaren, Graco, and more. We now stock a huge ranga of baby daily equipments, everyday baby equipments, like nappies and foods.</p>
			</div>
			
		</div><!--/span9-->
	</div>
	<div class="row" style="background-color: #ff8f50; margin: 0;">
		<div class="span5" style="background-color: #ffcb13; height: 0.4em; margin: 0;"></div>
		<div class="span3" style="background-color: #a9cacf; height: 0.4em; margin: 0;"></div>
		<div class="span2" style="background-color: #f8eeb1; height: 0.4em; margin: 0;"></div>
		<div class="span2"></div>
	</div>
</div> <!--/container-->