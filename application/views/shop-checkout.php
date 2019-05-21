<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="page-header page-header-md">
	<div class="container">

		<h1>CHECKOUT</h1>

		<!-- breadcrumbs -->
		<!--<ol class="breadcrumb">-->
		<!--	<li><a href="<?= site_url('#home');?>">Home</a></li>-->
		<!--	<li><a href="<?= site_url('home/shop');?>">Shop</a></li>-->
		<!--	<li class="active">Checkout</li>-->
		<!--</ol>-->
		<!-- /breadcrumbs -->

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
		<?php if (validation_errors() != NULL): ?>
			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<div class="container text-center" style="background: #ffcccc; border: 1px solid red;">
						<?= validation_errors();?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<form class="row clearfix" method="post" action="<?= site_url('home/shopCheckout');?>">

			<div class="col-lg-5 col-sm-5">

				<?php if ($alamat_default['sub_district'] == $addressCart['id_kec']): ?>
					<div class="heading-title" style="margin-bottom:0;">
						<h4>Shipping Address</h4>
						<!-- <h4>Billing &amp; Shipping to</h4> -->
					</div>

					<div class="col-lg-12 col-sm-12">
						<hr />

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<label for="billing_firstname">First Name</label>
								<input id="billing_firstname" name="first_name" value="<?= $alamat_default['first_name']?>" type="text" class="form-control" disabled />
								<input type="hidden" name="firstname" value="<?= $alamat_default['first_name']?>">
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="billing_lastname">Last Name</label>
								<input id="billing_lastname" name="last_name" value="<?= $alamat_default['last_name']?>" type="text" class="form-control required" disabled/>
								<input type="hidden" name="lastname" value="<?= $alamat_default['last_name']?>">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<label for="billing_address1">Address</label>
                                <input id="billing_address1" name="add" value="<?= $alamat_default['address']?>" type="text" class="form-control required" disabled/>
								<input type="hidden" name="address" value="<?= $alamat_default['address']?>">
							</div>
						</div>

						<div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label>Province</label>
                                <input type="text" name="prov" value="<?= $addressCart['provinsi']?>" class="form-control" disabled>
                                <input type="hidden" name="provinsi" value="<?= $addressCart['id_prov']?>">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label>City</label>
                                <input type="text" name="kab" value="<?= $addressCart['kabupaten']?>" class="form-control" disabled>
                                <input type="hidden" name="kabupaten" value="<?= $addressCart['id_kab']?>">
                            </div>
                        </div>

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<label>District</label>
								<input type="text" name="kec" value="<?= $addressCart['kecamatan']?>" class="form-control" disabled>
								<input type="hidden" name="kecamatan" value="<?= $addressCart['id_kec']?>">
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="billing_zipcode">Postcode</label>
								<input id="billing_zipcode" name="pcode" value="<?= $alamat_default['postcode']?>" type="text" class="form-control required" disabled/>
								<input type="hidden" name="postcode" value="<?= $alamat_default['postcode']?>">
							</div>
						</div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label for="billing_note">Note</label>
                                <textarea name="note" id="note" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<label for="billing_phone">Email</label>
								<input id="billing_phone" name="email" value="<?= $alamat_default['email']?>" type="email" class="form-control required" disabled/>
								<input type="hidden" name="email" value="<?= $alamat_default['email']?>">
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="billing_fax">Phone</label>
								<input id="billing_fax" name="hp" value="<?= $alamat_default['phone']?>" type="text" class="form-control" disabled/>
								<input type="hidden" name="phone" value="<?= $alamat_default['phone']?>">
							</div>
						</div>
					</fieldset>
				</div>

				<?php else: ?>
					<div class="heading-title mb-0 pl-15">
						<h4>Shipping Address</h4>
						<!-- <h4>Billing &amp; Shipping to</h4> -->
					</div>

					<div class="col-lg-12 col-sm-12">
						<hr />

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<label for="billing_firstname">First Name</label>
								<input id="billing_firstname" name="firstname" type="text" class="form-control required" />
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="billing_lastname">Last Name</label>
								<input id="billing_lastname" name="lastname" type="text" class="form-control required" />
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<label for="billing_address1">Address</label>
                                <p style="color:gray;font-size:11px;">(Alamat pengiriman harus sesuai dengan kecamatan yang dipilih).</p>
                                <input id="billing_address1" name="address" type="text" class="form-control required" />
                            </div>
						</div>

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<label>Province</label>
								<input type="text" name="prov" value="<?= $addressCart['provinsi']?>" class="form-control" disabled>
								<input type="hidden" name="provinsi" value="<?= $addressCart['id_prov']?>">
							</div>
							<div class="col-md-6 col-sm-6">
								<label>City</label>
								<input type="text" name="kab" value="<?= $addressCart['kabupaten']?>" class="form-control" disabled>
								<input type="hidden" name="kabupaten" value="<?= $addressCart['id_kab']?>">
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<label>District</label>
								<input type="text" name="kec" value="<?= $addressCart['kecamatan']?>" class="form-control" disabled>
								<input type="hidden" name="kecamatan" value="<?= $addressCart['id_kec']?>">
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="billing_zipcode">Postcode *</label>
								<input id="billing_zipcode" name="postcode" type="text" class="form-control required" />
							</div>
						</div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label for="billing_note">Note</label>
                                <textarea name="note" id="note" placeholder="Note" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<label for="billing_phone">Email *</label>
								<input id="billing_phone" name="email" type="email" class="form-control required" />
							</div>
							<div class="col-md-6 col-sm-6">
								<label for="billing_fax">Phone *</label>
								<input id="billing_fax" name="phone" type="text" class="form-control" />
							</div>
						</div>
					</fieldset>
				</div>

				<?php endif; ?>

			</div>



			<div class="col-lg-7 col-sm-7">
				<div class="heading-title mb-0">
					<h4>Summary</h4>
				</div>

				<!-- PAYMENT METHOD -->
				<!-- <fieldset class="mt-30">
					<div class="toggle-transparent toggle-bordered-full clearfix">
						<div class="toggle active">
							<div class="toggle-content">

								<div class="row mb-0"> -->
									<!-- <div class="col-lg-12 m-0 clearfix">
										<label class="radio float-left mt-0">
											<input id="payment_check" name="payment[method]" type="radio" value="1" checked="checked" />
											<i></i> <span class="fw-300">Check / Money order</span>
										</label>
									</div> -->
									<!-- <div class="col-lg-12 m-0 clearfix">
										<label class="radio float-left">
											<input id="payment_card" name="payment[method]" type="radio" value="2" />
											<i></i> <span class="fw-300">Credit Card</span>
										</label>
									</div> -->
								<!-- </div>

							</div>
						</div>
					</div>
				</fieldset> -->
				<!-- /PAYMENT METHOD -->


				<!-- CREDIT CARD PAYMENT -->
				<!-- <fieldset id="ccPayment" class="mt-30 hide">

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

				</fieldset> -->
				<!-- /CREDIT CARD PAYMENT -->
				<!-- PRODUCT -->
				<!-- <div class="toggle-transparent toggle-bordered-full clearfix">
					<div class="toggle active">
						<div class="toggle-content">
						<div class="row">
							<div class="col-6 text-center">
								<strong>Product</strong>
							</div>
							<div class="col-2 text-center">
								<strong>Qty</strong>
							</div>
							<div class="col-4 text-center">
								<strong>Price</strong>
							</div>
						</div>
						<div class="row">
							<?php foreach ($carts as $cart): ?>
								<?php if ($cart['available'] == TRUE): ?>
										<?php if ($cart['type'] == 'special'): ?>
											<div class="col-2 p-0">
												<div class="testimonial">
													<figure class="text-center">
														<img class="square" src="<?= site_url('asset/upload/'.$cart['image']);?>" alt="">
				                  </figure>
												</div>
											</div>
											<div class="col-4 pl-0">
												<span class="clearfix">
													<span class="float-left"><?= $cart['name']?></span>
													<br>
													<ul>
														<?php foreach ($cart['option'] as $option): ?>
															<li>
																<small><?= $option['prod']?> × <?= $option['quantity']?></small>
															</li>
														<?php endforeach; ?>
													</ul>
												</span>
											</div>
											<div class="col-2 text-center">
												<span><?= $cart['qty']?></span>
											</div>
											<div class="col-4">
												<span class="float-left">Rp <?= number_format($cart['subtotal'],0,',','.')?></span>
											</div>
											<div class="col-12" style="margin-left:1px;">
											<font color="green">Status: <span><?= $cart['comment']?></span></font>
											</div>
										<?php else: ?>
											<div class="col-2 p-0">
												<div class="testimonial">
													<figure class="text-center">
														<img class="square" src="<?= site_url('asset/upload/'.$cart['image']);?>" alt="">
				                  </figure>
												</div>
											</div>
											<div class="col-4 pl-0">
												<span class="clearfix">
													<span class="float-left"><?= $cart['name']?></span>
													<br>
													<span class="float-left"><?= $cart['sizeName'].' ('.$cart['detailSize'].')'?></span>
												</span>
											</div>
											<div class="col-2 text-center">
												<span><?= $cart['qty']?></span>
											</div>
											<div class="col-4">
												<span class="float-left">Rp <?= number_format($cart['subtotal'],0,',','.')?></span>
											</div>
											<div class="col-12" style="margin-left:1px;">
											<font color="green">Status: <span><?= $cart['comment']?></span></font>
											</div>
										<?php endif; ?>
								<?php else: ?>
									<?php if ($cart['type'] == 'special'): ?>
										<div class="col-2 p-0">
											<div class="testimonial">
												<figure class="text-center">
													<img class="square" src="<?= site_url('asset/upload/'.$cart['image']);?>" alt="">
												</figure>
											</div>
										</div>
										<div class="col-4 pl-0">
											<span class="clearfix">
												<span class="float-left"><?= $cart['name']?></span>
												<br>
												<ul>
													<?php foreach ($cart['option'] as $option): ?>
														<li>
															<small><?= $option['name']?> × <?= $option['quantity']?></small>
														</li>
													<?php endforeach; ?>
												</ul>
											</span>
										</div>
										<div class="col-2 text-center">
											<span><?= $cart['qty']?></span>
										</div>
										<div class="col-4">
											<span class="float-left">Rp <?= number_format($cart['subtotal'],0,',','.')?></span>
										</div>
										<div class="col-12" style="margin-left:1px;">
										<font color="green">Status: <span><?= $cart['comment']?></span></font>
										</div>
									<?php else: ?>
										<div class="col-2 p-0">
											<div class="testimonial">
												<figure class="text-center">
													<img class="square" src="<?= site_url('asset/upload/'.$cart['image']);?>" alt="">
												</figure>
											</div>
										</div>
										<div class="col-4 pl-0">
											<span class="clearfix">
												<span class="float-left"><?= $cart['name']?></span>
												<br>
												<span class="float-left"><?= $cart['sizeName'].' ('.$cart['detailSize'].')'?></span>
											</span>
										</div>
										<div class="col-2 text-center">
											<span><?= $cart['qty']?></span>
										</div>
										<div class="col-4">
											<span class="float-left">Rp <?= number_format($cart['subtotal'],0,',','.')?></span>
										</div>
										<div class="col-12" style="margin-left:1px;">
										<font color="green">Status: <span><?= $cart['comment']?></span></font>
										</div>
									<?php endif; ?>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div> -->
		<table class="table toggle-transparent toggle-bordered-full clearfix" style="background-color: rgba(0, 0, 0, 0.03);">
          <thead>
            <tr class="toggle active">
              <div class="toggle-content">
                <th style="border-top:0; border-bottom:0;"></th>
                <th style="border-top:0; border-bottom:0;">Product</th>
                <th style="border-top:0; border-bottom:0;">Qty</th>
                <th style="border-top:0; border-bottom:0;">Price</th>
				<th style="border-top:0; border-bottom:0;">Status</th>
				<hr>
			  </div>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($carts as $cart): ?>
              <?php if ($cart['available'] == TRUE): ?>
                <?php if ($cart['type'] == 'special'): ?>
                  <tr class="testimonial">
                    <td>
                      <img class="square" src="<?= site_url('asset/upload/'.$cart['image']);?>" height="60" alt="<?= $cart['name']?>">
                    </td>
                    <td>
                      <span class="clearfix">
                        <span class="float-left"><?= $cart['name']?></span>
												<br>
                        <small class="float-left"><?= $cart['sizeName']?> (<?= $cart['detailSize']?>)</small>
												<br>
                        <ul>
                          <?php foreach ($cart['option'] as $option): ?>
                            <li>
                              <small><?= $option['prod']?> - <?=$option['sizeName']?> × <?= $option['quantity']?></small>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      </span>
                    </td>
                    <td><span><?= $cart['qty']?></span></td>
                    <td><span class="float-left">Rp <?= number_format($cart['subtotal'], 0,',','.')?></span></td>
                    <td><font color="green"><?= $cart['comment']?></font></td>
                  </tr>
                <?php else: ?>
                  <tr class="testimonial">
                    <td>
                      <img class="square" src="<?= site_url('asset/upload/'.$cart['image']);?>" height="60" alt="<?= $cart['name']?>">
                    </td>
                    <td>
                      <span class="clearfix">
                        <span class="float-left"><?= $cart['name']?></span>
                        <br>
                        <span class="float-left"><?= $cart['sizeName']?> (<?= $cart['detailSize']?>)</span>
                      </span>
                    </td>
                    <td><span><?= $cart['qty']?></span></td>
                    <td><span class="float-left">Rp <?= number_format($cart['subtotal'],0,',','.')?></span></td>
                    <td><font color="green"><b><?= $cart['comment']?></b></font></td>
                  </tr>
                <?php endif; ?>
              <?php else: ?>
                <?php if ($cart['type'] == 'special'): ?>
                  <tr class="testimonial">
                    <td>
                      <img class="square" src="<?= site_url('asset/upload/'.$cart['image']);?>" height="60" alt="<?= $cart['name']?>">
                    </td>
                    <td>
                      <span class="clearfix">
                        <span class="float-left"><?= $cart['name']?></span>
												<br>
                        <small class="float-left"><?= $cart['sizeName']?> (<?= $cart['detailSize']?>)</small>
												<br>
                        <ul>
                          <?php foreach ($cart['option'] as $option): ?>
                            <li>
                              <small><?= $option['prod']?> × <?= $option['quantity']?></small>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      </span>
                    </td>
                    <td><span><?= $cart['qty']?></span></td>
                    <td><span class="float-left">Rp <?= number_format($cart['subtotal'], 0,',','.')?></span></td>
                    <td><font color="green"><?= $cart['comment']?></font></td>
                  </tr>
                <?php else: ?>
                  <tr class="testimonial" style="background: #ffcccc;">
                    <td>
                      <img class="square" src="<?= site_url('asset/upload/'.$cart['image']);?>" height="60" alt="<?= $cart['name']?>">
                    </td>
                    <td>
                      <span class="clearfix">
                        <span class="float-left"><?= $cart['name']?></span>
                        <br>
                        <span class="float-left"><?= $cart['sizeName']?> (<?= $cart['detailSize']?>)</span>
                      </span>
                    </td>
                    <td><span><?= $cart['qty']?></span></td>
                    <td><span class="float-left">Rp <?= number_format($cart['subtotal'],0,',','.')?></span></td>
                    <td><font color="red"><b><?= $cart['comment']?></b></font></td>
                  </tr>
                <?php endif; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </tbody>
        </table>

				<!-- /PRODUCT -->
				<!-- TOTAL / PLACE ORDER -->
				<div class="toggle-transparent toggle-bordered-full clearfix">
					<div class="toggle active">
						<div class="toggle-content">

							<span class="clearfix">
								<span class="float-right">Rp. <?= number_format($this->cart->total(),0,',','.');?></span>
								<strong class="float-left">Subtotal:</strong>
							</span>
							<span class="clearfix">
								<span class="float-right">Rp. <?=number_format($discount,0,',','.')?></span>
								<span class="float-left">Discount:</span>
							</span>
							<!-- <span class="clearfix">
								<span class="float-right">Rp. 500,000</span>
								<span class="float-left">Shipping:</span>
							</span> -->

							<hr />

							<span class="clearfix">
								<span class="float-right fs-20">Rp. <?=number_format(($this->cart->total() - $discount),0,',','.')?></span>
								<strong class="float-left">TOTAL:</strong>
							</span>

							<hr />

							<!-- <a class="btn btn-oldblue btn-lg btn-block fs-15" href="<?= site_url('home/checkout');?>"> -->
							<?php if ($available == TRUE): ?>
								<a href="<?= site_url('home/shopCart')?>" class="btn btn-default btn-lg btn-block fs-15">
									Back to Cart
								</a>
								<button class="btn btn-oldblue btn-lg btn-block fs-15">
									<i class="fa fa-mail-forward"></i>
									Place Order Now
								</button>
							<?php else: ?>
								<a href="<?= site_url('home/shopCart')?>" class="btn btn-default btn-lg btn-block fs-15">
									Back to Cart
								</a>
								<a href="<?= site_url('home/shopCart')?>" class="btn btn-danger btn-lg btn-block fs-15">
									Cancel Order
								</a>
							<?php endif; ?>
							<!-- </a> -->
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
