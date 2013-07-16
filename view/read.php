<div class="container content">
	<div class="row" style="overflow: hidden;">
		<div class="span3"><?php $this->view('sidebar.php', array('kategoris'=>$kategoris)); ?></div>
		
		<div class="span9" style="padding-bottom: 2em;">
		
			<div class="content-box" style="margin-top: 1em; padding: 1em 1.5em;">

			<?php //var_dump($content);
                if(isset($content) and is_object($content)) : ?>
			<h2><?php echo $content->content_title; ?></h2>
			<?php echo $content->content_content; ?>
            <?php else: ?>
            <h2>404: Page Not Found</h2>
            <p>Sorry, but the page that you are looking for could not been found. Try checking the URL for errors, then hit refresh button on your web browser or you may wish to <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">go back to previous page</a>.</p>
            <?php endif; ?>
			</div>
			<hr>
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