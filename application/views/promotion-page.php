<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="page-header page-header-md">
	<div class="container">

		<h1>PROMOTION</h1>

		<!-- breadcrumbs -->
		<!-- <ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Something</a></li>
					<li><a href="#">Something</a></li>
					<li class="active">Promotion</li>
				</ol> -->
		<!-- /breadcrumbs -->
	</div>
</section>
<!-- /PAGE HEADER -->

<!-- -->
<section>
	<div class="container">

		<div class="row">

			<!-- RIGHT -->
			<div class="pajinate col-md-12 col-sm-12" data-pajinante-items-per-page="3"
				data-pajinate-container=".pajinate-container">

				<div class="row">
					<ul class="pajinate-container shop-item-list row list-inline m-0">
						<?php foreach ($promotions as $promotion) { ?>
						<!-- POST ITEM -->
							<div class="col-md-6 col-sm-6">
								<div class="card " style="width: 18rem;">
									<img src="<?= base_url('asset/upload/'.$promotion['image']);?>" class="card-img-top" alt="promotion image">
									<div class="card-body">
										<h4>
											<a href="<?=site_url('home/promotionDetail/'.$promotion['slugs'])?>"><?=$promotion['name']?></a>
										</h4>
										<table>
											<tr>
												<td>
													<small class="text-muted">Promotion Period</small>
													<br />
													<?php $start_date = date_create($promotion['start_date']);
													$end_date = date_create($promotion['end_date']);
													echo date_format($start_date, "d M Y"). " - ". date_format($end_date, "d M Y"); ?>
												</td>
											</tr>
											<tr>
												<td>
													<small class="text-muted">Voucher Code</small>
													<br />
													<p><?=$promotion['kode_voucher']?></p>
												</td>
											</tr>
										</table>
										<a href="<?=site_url('home/promotionDetail/'.$promotion['slugs'])?>" class="btn btn-oldblue btn-block">View Detail</a>
									</div>
								</div>
							</div>
						<!-- /POST ITEM -->
						<?php } ?>
					</ul>
				</div>

				<!-- Pagination Default -->
				<div class="pajinate-nav text-center">
					<ul class="pagination">
						<!-- pages added by pajinate plugin -->
					</ul>
				</div>
				<!-- /Pagination Default -->

			</div>

		</div>

	</div>
</section>
<!-- / -->
