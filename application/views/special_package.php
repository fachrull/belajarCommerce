<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="page-header page-header-md">
	<div class="container">

		<h1>SPECIAL PACKAGE</h1>

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
								<!-- POST ITEM -->
								<div class="blog-post-item col-md-6 col-sm-6">
									<!-- IMAGE -->
									<figure class="mb-20">
										<img class="img-fluid" style="height:300px !important;"
											src="<?= base_url('asset/upload/special-package/'.$specialPackage['image']);?>"
											alt="<?= $specialPackage['name']?>">
										<h4 class="text-center"><a href="<?= base_url('home/detailSpecial/'.$specialPackage['id']);?>"><?= $specialPackage['name']?></a></h4>
									</figure>
								</div>
								<!-- /POST ITEM -->
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
