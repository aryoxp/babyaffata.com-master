<div class="container">
	<div class="row footer">
		<div class="span4"><h2>Exclusive Offer By Email</h2>
		<form action="" method="post">
			<input type="text" placeholder="Enter your email here">
		</form>
		</div>
		<div class="span4"><h2>Track Your Order</h2>
		<form action="" method="post">
			<input type="text" placeholder="Put your order number here">
		</form>
		</div>
		<div class="span4"><h2>Payment Accepted</h2>
            <img class="iconbank" src="<?php echo $this->asset('images/bank-cimb.png'); ?>" alt="">
            <img class="iconbank" src="<?php echo $this->asset('images/bank-bni.png'); ?>" alt="">
            <img class="iconbank" src="<?php echo $this->asset('images/bank-bca.png'); ?>" alt="">
            <img class="iconbank" src="<?php echo $this->asset('images/bank-mandiri.png'); ?>" alt="">
            <img class="iconbank" src="<?php echo $this->asset('images/bank-bii.png'); ?>" alt="">
		</div>
	</div>
	<div class="row" style="border-top: 4px dotted #CCC; margin: 0;"></div>
</div>

<div style="height: 0.4em; margin-top: 2em; background-color: #AAA;"></div>



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $this->asset('script/modernizr.custom.17475.js'); ?>"></script>
<script src="<?php echo $this->asset('script/jquery-1.10.2.min.js'); ?>"></script>
<script src="<?php echo $this->asset('script/jquery-migrate-1.2.1.min.js'); ?>"></script>
<?php /* <script src="<?php echo $this->asset('script/jquery.min.js'); ?>"></script> */?>
<?php
/*
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-transition.js'); ?>"></script>
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-alert.js'); ?>"></script>
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-modal.js'); ?>"></script>
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-dropdown.js'); ?>"></script>
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-scrollspy.js'); ?>"></script>
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-tab.js'); ?>"></script>
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-tooltip.js'); ?>"></script>
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-popover.js'); ?>"></script>
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-button.js'); ?>"></script>
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-collapse.js'); ?>"></script>
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-carousel.js'); ?>"></script>
<script src="<?php echo $this->assets('bootstrap/js/bootstrap-typeahead.js'); ?>"></script>
*/
?><?php //var_dump($this->get_styles());
$scripts = $this->get_scripts();
foreach($scripts as $s){
    echo '    <script src="'.$this->assets($s).'" language="javascript"></script>'."\n";
}
?>

  </body>
</html>