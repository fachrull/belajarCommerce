<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="page-header page-header-md">
	<div class="container">

		<h1>ONLINE PROMOTION</h1>

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
			<div class="pajinate col-md-12 col-sm-12" data-pajinante-items-per-page="4"
				data-pajinate-container=".pajinate-container">
				<!-- RIGHT -->
				<div class="col-md-12 col-sm-12">

					<div class="row">
						<ul class="pajinate-container shop-item-list row list-inline m-0">
							<?php foreach ($special_packages as $specialPackage): ?>
								<div class="col-md-4 col-sm-4">
									<div class="card ">
										<img src="<?= base_url('asset/upload/special-package/'.$specialPackage['image']);?>" class="card-img-top" alt="<?= $specialPackage['name']?>">
										<div class="card-body">
											<h4>
												<a href="<?= base_url('home/detailSpecial/'.$specialPackage['slugs']);?>"><?= $specialPackage['name']?></a>
											</h4>
											<a href="<?= base_url('home/detailSpecial/'.$specialPackage['slugs']);?>" class="btn btn-oldblue btn-block">View Detail</a>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
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
				<!-- /PAGINATION -->

			</div>

		</div>

	</div>
</section>
<!-- / -->
