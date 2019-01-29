<?php defined('BASEPATH') or Exit('No direct script access allowed');?>
<!-- FOOTER -->
<footer id="footer">
	<div class="container footer-zero">
		<div class="row mb-40 fs-13 footer-zero">
			<!-- col #1 -->
			<div class="col-12 col-md-7 pb-10 footer-zero">
				<h2 class="pt-10">
					Stay in the know
				</h2>
				<h6>Be the first to hear about new inventory and offers.</h6>
				<div class="input-email">
					<input type="text" class="form-control form-control-footer" placeholder="Your Mail" aria-label="Your Mail"
					 aria-describedby="basic-addon2">
					<div>
						<button class="email-button eyebrow">SUBMIT<i class="pl-5 fa fa-chevron-right"></i></button>
					</div>
				</div>

				<!-- Social Icons -->
				<div class="pt-15">
					<div class="clearfix">
						<a href="<?= site_url('!#');?>" class="social-icon social-icon-border social-icon-round social-facebook float-left" data-toggle="tooltip"
						 data-placement="top" title="Facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>
						<a href="<?= site_url('!#');?>" class="social-icon social-icon-border social-icon-round social-twitter float-left" data-toggle="tooltip"
						 data-placement="top" title="Twitter">
							<i class="icon-twitter"></i>
							<i class="icon-twitter"></i>
						</a>
						<a href="<?= site_url('!#');?>" class="social-icon social-icon-border social-icon-round social-instagram float-left" data-toggle="tooltip"
						 data-placement="top" title="Instagram">
							<i class="icon-instagram2"></i>
							<i class="icon-instagram2"></i>
						</a>
						<a href="<?= site_url('!#');?>" class="social-icon social-icon-border social-icon-round social-whatsapp float-left" data-toggle="tooltip"
						 data-placement="top" title="Whatsapp">
							<i class="icon-wordpress"></i>
							<i class="icon-wordpress"></i>
						</a>
					</div>
				</div>
				<!-- /Social Icons -->
			</div>
			<!-- /col #1 -->

			<!-- col #2 -->
			<div class="col-sm-12 col-md-5 pt-10 footer-zero">
				<div class="row">
					<div class="col-md-4 col-4 pt-5">
						<h4 class="letter-spacing-1 footer-zero">SHOP</h4>
						<ul class="list-unstyled footer-list half-paddings b-0">
							<li><a class="block" href="<?= site_url('');?>home/Shop">Aireloom</a></li>
							<li><a class="block" href="<?= site_url('');?>home/Shop">Serta</a></li>
							<li><a class="block" href="<?= site_url('');?>home/Shop">Florence</a></li>
							<li><a class="block" href="<?= site_url('');?>home/Shop">Kingkoil</a></li>
							<li><a class="block" href="<?= site_url('');?>home/Shop">Tempur</a></li>
							<li><a class="block" href="<?= site_url('');?>home/Shop">Stressless</a></li>
						</ul>
					</div>
					<div class="col-md-4 col-4 pt-5">
						<h4 class="letter-spacing-1 footer-zero">ABOUT</h4>
						<ul class="list-unstyled footer-list half-paddings b-0">
							<li><a class="block" href="<?= site_url('');?>home/pageAbout">About Us</a></li>
							<li><a class="block" href="<?= site_url('');?>home/pageContact">Contact Us</a></li>
							<li><a class="block" href="<?= site_url('');?>home/pageFaq">FAQ</a></li>
						</ul>
					</div>
					<div class="col-md-4 col-4 pt-5">
						<h4 class="letter-spacing-1 footer-zero">HELP</h4>
						<ul class="list-unstyled footer-list half-paddings b-0">
							<li><a class="block" href="<?= site_url('');?>home/termCondition">Terms & Conditions</a></li>
							<li><a class="block" href="<?= site_url('');?>home/privacyPolicy">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /col #2 -->
		</div>
	</div>
	<div class="copyright">
		<div class="container text-center">
			&copy; All Rights Reserved, <b>AGM - American Giant Mattress</b>
		</div>
	</div>
</footer>
<!-- /FOOTER -->


		
	</div>
	<!-- SCROLL TO TOP -->
	<a href="<?= site_url('#');?>" id="toTop"></a>

<!-- JAVASCRIPT FILES -->
<script>
	var plugin_path = "<?= base_url('asset/plugins/');?>";
</script>
<script src="<?= base_url('asset/plugins/jquery/jquery-3.3.1.min.js');?>"></script>

<script src="<?= base_url('asset/javascript/scripts.js');?>"></script>
<script src="<?= base_url('asset/javascript/scrollAnimated.js');?>"></script>

<!-- STYLESWITCHER - REMOVE -->
<!-- <script async type="text/javascript" src="demo_files/styleswitcher/styleswitcher.js"></script> -->

<!-- PAGE LEVEL SCRIPTS -->
<script src="<?= base_url('asset/javascript/demo.shop.js');?>"></script>
</body>

</html>
