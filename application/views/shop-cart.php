<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="page-header page-header-md">
	<div class="container">

		<h1>SHOP CART</h1>

		<!-- breadcrumbs -->
		<!--<ol class="breadcrumb">-->
		<!--	<li><a href="<?= site_url('#home');?>">Home</a></li>-->
		<!--	<li><a href="<?= site_url('home/shop');?>">Shop</a></li>-->
		<!--	<li class="active">Cart</li>-->
		<!--</ol>-->
		<!-- /breadcrumbs -->

	</div>
</section>
<!-- /PAGE HEADER -->




<!-- CART -->
<section>
	<div class="container">
	<?php
		if(!$cart) {
	?>

		<!-- EMPTY CART -->
		<div class="card card-default">
			<div class="card-block">
				<strong>Shopping cart is empty!</strong><br />
				You have no items in your shopping cart.<br />
				Click <a href="shop-2col-left.html">here</a> to continue shopping. <br />
				<span class="badge badge-warning">this is just an empty cart example</span>
			</div>
		</div>
		<!-- /EMPTY CART -->

	<?php
		}
		else {

	?>

		<!-- CART -->
		<div class="row">

			<!-- LEFT -->
			<div class="col-lg-9 col-sm-8">

				<!-- CART -->
				<form class="cartContent clearfix" method="post" action="<?= site_url('home/updateCart')?>">

					<!-- cart content -->
					<div id="cartContent">
						<!-- cart header -->
						<div class="item head clearfix">
							<span class="cart_img"></span>
							<span class="product_name fs-13 bold">PRODUCT NAME</span>
							<span class="remove_item fs-13 bold"></span>
							<span class="total_price fs-13 bold" style="padding-top:4px">TOTAL</span>
							<span class="qty fs-13 bold" style="margin-right:13px">QUANTITY</span>
						</div>
						<!-- /cart header -->
						<?php foreach ($cart as $item) :?>
						<!-- cart item -->
						<?php if ($item['type'] == 'special'): ?>
							<div class="item">
								<div class="cart_img float-left fw-100 p-10 text-left"><img src="<?= site_url('asset/upload/special-package/'.$item['image']);?>" alt="<?= $item['name'];?>"
									width="80" /></div>
									<a href="<?= site_url('home/detailSpecial/'.$item['id'])?>" class="product_name">
										<span><?=$item['name']?></span></br>
										<small>Products :
											<ul>
												<?php foreach ($item['option'] as $option): ?>
													<li><?= $option['name'].' - '.$option['nameSize']?> × <?= $option['quantity']?></li>
												<?php endforeach; ?>
											</ul>
										</small>
									</a>
									<a href="<?= site_url('home/removeCart_item/'.$item['rowid']);?>" class="remove_item"><i class="fa fa-times"></i></a>
									<div class="total_price">Rp. <span><?= number_format($item['subtotal'],0,',','.')?></span></div>
									<div class="qty" style="width:200px !important;"><input type="number" value="<?=$item['qty']?>" name="qty[]" maxlength="3" max="999" min="1" /> &times; Rp.
										<?=number_format($item['price'],0,',','.')?></div>
										<div class="clearfix"></div>
									</div>
						<?php else: ?>
							<div class="item">
								<div class="cart_img float-left fw-100 p-10 text-left"><img src="<?= site_url('asset/upload/'.$item['image']);?>" alt="<?= $item['name'];?>"
									width="80" /></div>
									<a href="<?= site_url('home/detailProduct/'.$item['id'])?>" class="product_name">
										<span><?=$item['name']?></span>
										<small>Size: <?= $item['sizeName']?> (<?= $item['detailSize']?>)</small>
									</a>
									<a href="<?= site_url('home/removeCart_item/'.$item['rowid']);?>" class="remove_item"><i class="fa fa-times"></i></a>
									<div class="total_price">Rp. <span><?= number_format($item['subtotal'],0,',','.')?></span></div>
									<div class="qty" style="width:200px !important;"><input type="number" value="<?=$item['qty']?>" name="qty[]" maxlength="3" max="999" min="1" /> &times; Rp.
										<?=number_format($item['price'],0,',','.')?></div>
										<div class="clearfix"></div>
									</div>
						<?php endif; ?>
						<!-- /cart item -->

					<?php endforeach;?>

						<!-- update cart -->
						<button class="btn btn-oldblue mt-20 mr-10 float-right"><i class="glyphicon glyphicon-ok"></i> UPDATE CART</button>
						<a href="<?= site_url('home/deleteCart');?>" class="btn btn-quitered mt-20 mr-10 float-right"><i class="fa fa-remove"></i> CLEAR CART</a>
						<!-- /update cart -->

						<div class="clearfix"></div>
					</div>
					<!-- /cart content -->

				</form>
				<!-- /CART -->

			</div>


			<!-- RIGHT -->
			<div class="col-lg-3 col-sm-4">

				<!-- TOGGLE -->
				<div class="toggle-transparent toggle-bordered-full clearfix">

					<div class="toggle mt-0">
						<label>Voucher</label>

						<div class="toggle-content">
							<p class="mb-20">Enter your discount voucher code.</p>
                            <span id="voucher-label"></span>
                            <?php
                            if($cart) {
                                $keys = array_keys($cart);
                                $voucher = $cart[$keys[0]]["voucher"];
                            }
                            if ($voucher === "") {
                            ?>
							<form id="voucher-input" action="<?= site_url('home/addVoucher')?>" method="post" class="m-0">
								<div class="row">
                                    <div class="col-12">
                                        <input type="text" id="cart-code" name="voucher" class="form-control text-center mb-10" placeholder="Voucher Code" required="required">
                                        <button id="btn-voucher" class="btn btn-oldblue btn-block" type="button">APPLY</button>
                                    </div>
                                </div>
							</form>
                            <?php } else { ?>
                            <div id="voucher-detail" class="row">
                                <div class="col-6">
                                    <p><?=$voucher?></p>
                                </div>
                                <div class="col-6">
                                    <a href="<?= site_url('home/removeVoucher')?>" class="float-right" id="remove-voucher" >remove</a>
                                </div>
                            </div>
                            <?php } ?>
						</div>
					</div>

					<!-- <div class="toggle">
								<label>Shipping tax calculator</label>

								<div class="toggle-content">
									<p class="pb-10">To get a shipping estimate, please enter your destination.</p>

									<form action="#" method="post" class="m-0">
										<label>Country*</label>
										<select id="cart-tax-country" name="cart-tax-country" class="form-control pointer mb-20">
											<option value="1">United States</option>
											<option value="2">United Kingdom</option>
											<option value="2">...........</option>
											add all here
										</select>

										<label>State/Province</label>
										<select id="cart-tax-state" name="cart-tax-state" class="form-control pointer mb-20">
											<option value="1">Alabama</option>
											<option value="2">Alaska</option>
											<option value="2">...........</option>
											add all here
										</select>

										<label>Zip/Postal Code</label>
										<input type="text" id="cart-tax-postal" name="cart-tax-postal" class="form-control mb-20">

										<button class="btn btn-oldblue btn-block" type="submit">SUBMIT</button>
									</form>
								</div>
							</div> -->

				</div>
				<!-- /TOGGLE -->

				<div class="toggle-transparent toggle-bordered-full clearfix">
					<div class="toggle active">
						<div class="toggle-content">

							<span class="clearfix">
								<span class="float-right">Rp. <?=number_format($this->cart->total(),0,',','.')?></span>
								<strong class="float-left">Subtotal:</strong>
							</span>
							<span class="clearfix">
								<span class="float-right">Rp. <?=number_format($discount,0,',','.')?></span>
								<span class="float-left">Discount:</span>
							</span>
							<!-- <span class="clearfix">
								<span class="float-right">Rp. 0</span>
								<span class="float-left">Shipping:</span>
							</span> -->

							<hr />

							<span class="clearfix">
								<span class="float-right fs-20">Rp. <?=number_format(($this->cart->total() - $discount),0,',','.')?></span>
								<strong class="float-left">TOTAL:</strong>
							</span>

							<hr />

							<?php if ($add == 1): ?>
								<a href="<?= site_url('home/shop_summary');?>" class="btn btn-oldblue btn-lg btn-block"><i class="fa fa-mail-forward"></i>
									Check Out</a>
							<?php else: ?>
								<a href="<?= site_url('home/shopCheckout');?>" class="btn btn-oldblue btn-lg btn-block"><i class="fa fa-mail-forward"></i>
									Check Out</a>
							<?php endif; ?>
						</div>
					</div>
				</div>

			</div>

		</div>
		<!-- /CART -->
	<?php
		}
	?>
	</div>
</section>
<!-- /CART -->
