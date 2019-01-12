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
							<li><a class="block" href="<?= site_url('!#');?>">All Furniture</a></li>
							<li><a class="block" href="<?= site_url('!#');?>">Packages</a></li>
							<li><a class="block" href="<?= site_url('!#');?>">Living Room</a></li>
							<li><a class="block" href="<?= site_url('!#');?>">Dinning Room</a></li>
							<li><a class="block" href="<?= site_url('!#');?>">Bedroom</a></li>
							<li><a class="block" href="<?= site_url('!#');?>">Home Office</a></li>
						</ul>
					</div>
					<div class="col-md-4 col-4 pt-5">
						<h4 class="letter-spacing-1 footer-zero">ABOUT</h4>
						<ul class="list-unstyled footer-list half-paddings b-0">
							<li><a class="block" href="<?= site_url('!#');?>">How It Works</a></li>
							<li><a class="block" href="<?= site_url('!#');?>">Reviews</a></li>
							<li><a class="block" href="<?= site_url('!#');?>">About Us</a></li>
							<li><a class="block" href="<?= site_url('!#');?>">Careers</a></li>
						</ul>
					</div>
					<div class="col-md-4 col-4 pt-5">
						<h4 class="letter-spacing-1 footer-zero">HELP</h4>
						<ul class="list-unstyled footer-list half-paddings b-0">
							<li><a class="block" href="<?= site_url('!#');?>">Contact Us</a></li>
							<li><a class="block" href="<?= site_url('!#');?>">FAQ</a></li>
							<li><a class="block" href="<?= site_url('!#');?>">Terms & Conditions</a></li>
							<li><a class="block" href="<?= site_url('!#');?>">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /col #2 -->
		</div>
	</div>
	<div class="copyright">
		<div class="container text-center">
			&copy; All Rights Reserved, Hayabusa
		</div>
	</div>
</footer>
<!-- /FOOTER -->


		<div id="shopLoadModal" class="modal fade" data-autoload="true" data-autoload-delay="2000">
			<div class="modal-dialog modal-full">
				<div class="modal-content" style="background-image:url('<?= base_url('asset/content-images/shop_modal.jpg');?>');">

					<!-- header modal -->
					<div class="modal-header b-0 p-15">
						<button type="button" class="close pt-5" data-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- body modal -->
					<div class="modal-body">

						<div class="block-content">

							<img src="<?= base_url('asset/logo-agm/favicon.png');?>" alt="" />
							<p class="fs-13 mb-20 mt-30">Subscribe to get all new products and all new discounts.</p>

							<!-- newsletter -->
							<div class="inline-search clearfix mb-30">
								<form action="php/newsletter.php" method="post" class="validate m-0" data-success="Subscribed! Thank you!"
								 data-toastr-position="bottom-right" novalidate="novalidate">

									<input type="search" placeholder="Email Address" id="shop_email" name="shop_email" class="serch-input required">
									<button type="submit">
										<i class="fa fa-check"></i>
									</button>
								</form>
							</div>
							<!-- /newsletter -->

							<!-- Don't show this popup again -->
							<div class="fs-11 text-left">
								<label class="checkbox float-left">
									<input class="loadModalHide" type="checkbox" />
									<i></i> <span class="fw-300">Don't show this popup again</span>
								</label>

							</div>
							<!-- /Don't show this popup again -->

						</div>

					</div>

				</div>
			</div>
		</div>
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
