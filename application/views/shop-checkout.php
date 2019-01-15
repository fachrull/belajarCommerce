<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="page-header page-header-md">
	<div class="container">

		<h1>CHECKOUT</h1>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li><a href="<?= site_url('#home');?>">Home</a></li>
			<li><a href="<?= site_url('home/shop');?>">Shop</a></li>
			<li class="active">Checkout</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>
<!-- /PAGE HEADER -->


<!-- CART -->
<section>
	<div class="container">


		<!-- NOT LOGGED IN -->
		<!-- <div class="card card-default">
					<div class="card-block">
						<strong>You are not logged in!</strong>
						Please, <a href="page-login-1.html">login</a> or <a href="javascript:;" onclick="jQuery('#accountswitch').trigger('click'); _scrollTo('#newaccount', 200);">create
							an account</a> for later use.
					</div>
				</div> -->
		<!-- /NOT LOGGED IN -->



		<!-- CHECKOUT -->
		<form class="row clearfix" method="post" action="<?= site_url('home/checkoutDone');?>">

			<div class="col-lg-7 col-sm-7">
				<div class="heading-title">
					<h4>Billing &amp; Shipping to</h4>
				</div>


				<!-- BILLING -->
				<div class="col-md-6 col-sm-6">
					<div class="block">Name: Sherlock Holmes </div>
					<div class="block">Company: Independent Consulting Detective</div>
					<div class="block">Street Address: 221B Baker Street</div>
					<div class="block">City, Zip Code: London, NW1 6XE</div>
					<div class="block">Phone: +4487536136</div>
					<hr>
				</div>

				<!-- /BILLING -->

				<div class="row">

					<div class="col-lg-12 m-0 clearfix">
						<label class="checkbox float-left">
							<!-- see assets/js/view/demo.shop.js - CHECKOUT section -->
							<input id="shipswitch" name="shipping[same_as_billing]" type="checkbox" value="1" checked="checked" />
							<i></i> <span class="fw-300">Ship to the same address</span>
						</label>
					</div>

				</div>

				<!-- SHIPPING -->
				<fieldset id="shipping" class="mt-80 hide">
					<h4>Shipping Address</h4>
					<hr />

					<div class="row">
						<div class="col-md-6 col-sm-6">
							<label for="billing_firstname">First Name *</label>
							<input id="billing_firstname" name="billing[firstname]" type="text" class="form-control required" />
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="billing_lastname">Last Name *</label>
							<input id="billing_lastname" name="billing[lastname]" type="text" class="form-control required" />
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<label for="billing_address1">Address *</label>
							<input id="billing_address1" name="billing[address][]" type="text" class="form-control required" />
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 col-sm-6">
							<label for="billing_city">City *</label>
							<input id="billing_city" name="billing[city]" type="text" class="form-control required" />
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="billing_city">State/Province *</label>
							<input id="billing_city" name="billing[state]" type="text" class="form-control required" />
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 col-sm-6">
							<label for="billing_zipcode">Sub District *</label>
							<input id="billing_zipcode" name="billing[subdistrict]" type="text" class="form-control required" />
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="billing_zipcode">Zip Code *</label>
							<input id="billing_zipcode" name="billing[zipcode]" type="text" class="form-control required" />
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 col-sm-6">
							<label for="billing_phone">Phone 1 *</label>
							<input id="billing_phone" name="billing[phone]" type="text" class="form-control required" />
						</div>
						<div class="col-md-6 col-sm-6">
							<label for="billing_fax">Phone 2</label>
							<input id="billing_fax" name="billing[phone]" type="text" class="form-control" />
						</div>
					</div>

				</fieldset>
				<!-- /SHIPPING -->

			</div>



			<div class="col-lg-5 col-sm-5">
				<div class="heading-title">
					<h4>Payment Method</h4>
				</div>

				<!-- PAYMENT METHOD -->
				<fieldset class="mt-60">
					<div class="toggle-transparent toggle-bordered-full clearfix">
						<div class="toggle active">
							<div class="toggle-content">

								<div class="row mb-0">
									<div class="col-lg-12 m-0 clearfix">
										<label class="radio float-left mt-0">
											<input id="payment_check" name="payment[method]" type="radio" value="1" checked="checked" />
											<i></i> <span class="fw-300">Check / Money order</span>
										</label>
									</div>
									<div class="col-lg-12 m-0 clearfix">
										<label class="radio float-left">
											<input id="payment_card" name="payment[method]" type="radio" value="2" />
											<i></i> <span class="fw-300">Credit Card</span>
										</label>
									</div>
								</div>

							</div>
						</div>
					</div>
				</fieldset>
				<!-- /PAYMENT METHOD -->


				<!-- CREDIT CARD PAYMENT -->
				<fieldset id="ccPayment" class="mt-30 hide">

					<div class="toggle-transparent toggle-bordered-full clearfix">
						<div class="toggle active">
							<div class="toggle-content">

								<div class="row">
									<div class="col-lg-12">
										<label for="payment:name">Name on Card *</label>
										<input id="payment:name" name="payment[name]" type="text" class="form-control required" autocomplete="off" />
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<label for="payment:name">Credit Card Type *</label>
										<select id="payment:state" name="payment[state]" class="form-control pointer required">
											<option value="">Select...</option>
											<option value="AE">American Express</option>
											<option value="VI">Visa</option>
											<option value="MC">Mastercard</option>
											<option value="DI">Discover</option>
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<label for="payment:cc_number">Credit Card Number *</label>
										<input id="payment:cc_number" name="payment[cc_number]" type="text" class="form-control required"
										 autocomplete="off" />
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<label for="payment:cc_exp_month">Card Expiration *</label>

										<div class="row mb-0">
											<div class="col-lg-6 col-sm-6">
												<select id="payment:cc_exp_month" name="payment[cc_exp_month]" class="form-control pointer required">
													<option value="0">Month</option>
													<option value="01">01 - January</option>
													<option value="02">02 - February</option>
													<option value="03">03 - March</option>
													<option value="04">04 - April</option>
													<option value="05">05 - May</option>
													<option value="06">06 - June</option>
													<option value="07">07 - July</option>
													<option value="08">08 - August</option>
													<option value="09">09 - September</option>
													<option value="10">10 - October</option>
													<option value="11">11 - November</option>
													<option value="12">12 - December</option>
												</select>
											</div>

											<div class="col-lg-6 col-sm-6">
												<select id="payment:cc_exp_year" name="payment[cc_exp_year]" class="form-control pointer required">
													<option value="0">Year</option>
													<option value="2015">2015</option>
													<option value="2016">2016</option>
													<option value="2017">2017</option>
													<option value="2018">2018</option>
													<option value="2019">2019</option>
													<option value="2020">2020</option>
													<option value="2021">2021</option>
													<option value="2022">2022</option>
													<option value="2023">2023</option>
													<option value="2024">2024</option>
													<option value="2025">2025</option>
												</select>
											</div>

										</div>

									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<label for="payment:cc_cvv">CVV2 *</label>
										<input id="payment:cc_cvv" name="payment[cc_cvv]" type="text" class="form-control required" autocomplete="off"
										 maxlength="4" />
									</div>
								</div>

							</div>
						</div>
					</div>

				</fieldset>
				<!-- /CREDIT CARD PAYMENT -->


				<!-- TOTAL / PLACE ORDER -->
				<div class="toggle-transparent toggle-bordered-full clearfix">
					<div class="toggle active">
						<div class="toggle-content">

							<span class="clearfix">
								<span class="float-right">Rp. 2,000,000</span>
								<strong class="float-left">Subtotal:</strong>
							</span>
							<span class="clearfix">
								<span class="float-right">Rp. 0</span>
								<span class="float-left">Discount:</span>
							</span>
							<span class="clearfix">
								<span class="float-right">Rp. 500,000</span>
								<span class="float-left">Shipping:</span>
							</span>

							<hr />

							<span class="clearfix">
								<span class="float-right fs-20">Rp. 2,500,000</span>
								<strong class="float-left">TOTAL:</strong>
							</span>

							<hr />

							<a href="<?= site_url('home/checkoutDone');?>">
							<button class="btn btn-oldblue btn-lg btn-block fs-15">
								<i class="fa fa-mail-forward"></i> 
								Place Order Now
							</button>
							</a>
						</div>
					</div>
				</div>
				<!-- /TOTAL / PLACE ORDER -->
			</div>
		</form>
		<!-- /CHECKOUT -->

	</div>
</section>
<!-- /CART -->
