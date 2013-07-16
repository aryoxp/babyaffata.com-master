<div class="container">
	<div class="row-fluid footer">
		<div class="span4" style="padding-left: 1em"><h2>Exclusive Offer By Email</h2>
		<form action="<?php echo $this->location('register/mail'); ?>" method="post">
			<input type="text" placeholder="Enter your email here">
		</form>
		</div>
		<div class="span4"><h2>Track Your Order</h2>
		<form action="<?php echo $this->location('order/track'); ?>" method="post">
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
	<div class="row-fluid footer" style="border-top: 4px dotted #CCC;">
        <div class="span4" style="padding: 0 1em">
            <h2>Keep Connected</h2>
            <img class="connect-icon" src="<?php echo $this->asset('images/icon-twitter.png'); ?>" alt="Twitter">
            <img class="connect-icon" src="<?php echo $this->asset('images/icon-fb.png'); ?>" alt="Facebook">
            <img class="connect-icon" src="<?php echo $this->asset('images/icon-youtube.png'); ?>" alt="YouTube">
            <hr>
            <p style="font-size: 0.8em">Website ini dirancang untuk digunakan pada komputer dengan resolusi layar diatas 1024&times;768 namun responsif untuk resolusi layar perangkat bergerak.</p>
        </div>
        <div class="span5">
            <h2>Need Help? Questions?</h2>
            <ul class="help">
                <li>Cara Belanja</li>
                <li>Pengantaran dan Pengembalian</li>
                <li>Cara Pembayaran</li>
                <li>Terms and Conditions</li>
                <li>Cara Pre-Order</li>
                <li>Privasi dan Cookies</li>
                <li>Testimonial</li>
                <li>Tentang Kami</li>
                <li>Blog</li>
                <li>Hubungi Kami</li>
                <li>FAQs</li>
                <li>Site Credits</li>
            </ul>
        </div>
        <div class="span3">
            <h2>Contacts</h2>
            <h4>BabyAffata.com</h4>
            <p>Tel: (021) 1234567<br><small>SMS: 0812-123-8000, Fax: (021) 425-7787</small></p>
            <h4>Operating Hours:</h4>
            <p style="font-size: 0.8em">
                Senin - Jumat; 08.30 - 19.00 WIB
                <br>Sabtu; 09.00 - 16.00 WIB
                <br>Toko: Setiap Hari; 10.00 - 19.00 WIB
            </p>
        </div>
	</div>
</div>

<div style="height: 0.4em; margin-top: 2em; background-color: #AAA;"></div>
<div style="font-size: 0.8em; padding: 0.5em; background-color: #BBB; text-align: center; text-shadow: 0px 1px 0px #DDD;">&copy;<?php echo date('Y'); ?> BabyAffata.com &mdash; All rights reserved. All brand and trademarks are of their respective owners.</div>



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
    echo '    <script src="'.$this->assets($s).'"></script>'."\n";
}
?>

</body>
</html>