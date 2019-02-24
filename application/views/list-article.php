<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="page-header page-header-md">
			<div class="container">

				<h1>ARTICLE</h1>

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
					<div class="col-md-9 col-sm-9">

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


						<!-- PAGINATION -->
						<div class="text-center">
							<!-- Pagination Default -->
							<ul class="pagination m-0">
								<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">4</a></li>
								<li class="page-item"><a class="page-link" href="#">5</a></li>
								<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
							</ul>
							<!-- /Pagination Default -->
						</div>
						<!-- /PAGINATION -->

					</div>

				</div>


			</div>
		</section>
		<!-- / -->
