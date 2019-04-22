<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="page-header page-header-md">
			<div class="container">

				<h1>AGMPEDIA</h1>

				<!-- breadcrumbs -->
				<!-- <ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Something</a></li>
					<li><a href="#">Something</a></li>
					<li class="active">Article</li>
				</ol> -->
				<!-- /breadcrumbs -->
			</div>
		</section>
		<!-- /PAGE HEADER -->


		<!-- -->
		<section>
			<div class="container">

				<div class="row">

					<!-- LEFT -->
					<div class="col-md-3 col-sm-3">
						<!-- side navigation -->
						<div class="side-nav mb-60">

							<div class="side-nav-head" data-toggle="collapse" data-target="#rp">
								<button class="fa fa-bars btn btn-mobile"></button>
								<h4>RECENT POSTS</h4>
							</div>

							<ul id="rp" class="list-group list-group-bordered list-group-noicon">
								<?php foreach ($pedias as $pedia): ?>
									<li class="list-group-item">
										<a href="<?= site_url('home/fullArticle/'.$pedia['id']);?>">
											<span class="fs-13 text-muted float-right"></span> <?= $pedia['title'];?> <br>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>

							<div class="side-nav-head mt-30" data-toggle="collapse" data-target="#archieve">
								<button class="fa fa-bars btn btn-mobile"></button>
								<h4>ARCHIEVE</h4>
							</div>

							<ul id="archieve" class="list-group list-group-bordered list-group-noicon uppercase">
								<li class="list-group-item active">
									<a class="dropdown-toggle" href="#">2019</a>
									<ul>
										<li class="list-group-item active">
											<a class="dropdown-toggle" href="#">Jan (4)</a>
											<ul>
												<?php foreach ($pedias as $pedia): ?>
													<li class="bullet-bar"><a href="<?= site_url('home/fullArticle/'.$pedia['id']);?>"><span class="fs-11 text-muted float-right"></span> <?= $pedia['title'];?></a></li>
												<?php endforeach; ?>
											</ul>
										</li>
									</ul>
								</li>
							</ul>

							<!-- /side navigation -->
						</div>
					</div>

					<!-- RIGHT -->
					<div class="pajinate col-md-9 col-sm-9" data-pajinante-items-per-page="3"
					 data-pajinate-container=".pajinate-container">

					 <div class="pajinate-nav clearfix shop-list-options mb-20">

						<!-- Pagination Default -->
						<ul class="pagination m-0 float-right">
							<!-- pages added by pajinate plugin -->
						</ul>
						<!-- /Pagination Default -->

					</div>

						<ul class="pajinate-container pl-0">
						<?php foreach ($pedias as $pedia): ?>
							<!-- POST ITEM -->
							<div class="blog-post-item" style="height:220px">
								<!-- .blog-post-item-inverse = image right side [left on RTL] -->

								<!-- IMAGE -->
								<figure class="blog-item-small-image mb-20">
									<img class="img-fluid" src="<?= base_url('asset/upload/pedia/'.$pedia['thumbnail']);?>" style="height: 200px; width: 300px;">
								</figure>

								<div class="blog-item-small-content">

									<h2><a href="<?= site_url('home/fullArticle/'.$pedia['id']);?>"><?= $pedia['title'];?></a></h2>


									<p><?= $pedia['sub_content'];?>...</p>

								</div>

							</div>
							
							<!-- /POST ITEM -->
						<?php endforeach; ?>
						</ul>

						<!-- PAGINATION -->
						<div class="pajinate-nav text-center">
							<ul class="pagination">
								<!-- pages added by pajinate plugin -->
							</ul>
						</div>
						<!-- /PAGINATION -->

					</div>

				</div>


			</div>
		</section>
		<!-- / -->
