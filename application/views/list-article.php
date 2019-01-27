<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
		
<section class="page-header page-header-md">
			<div class="container">

				<h1>ARCTILE</h1>

				<!-- breadcrumbs -->
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Something</a></li>
					<li><a href="#">Something</a></li>
					<li class="active">Article</li>
				</ol><!-- /breadcrumbs -->
			</div>
		</section>
		<!-- /PAGE HEADER -->


		<!-- -->
		<section>
			<div class="container">

				<div class="row">

					<!-- LEFT -->
					<div class="col-md-3 col-sm-3">

						<h2>Our Article</h2>

						<hr />

						<!-- side navigation -->
						<div class="side-nav mb-60 mt-30">

							<div class="side-nav-head" data-toggle="collapse" data-target="#rp">
								<button class="fa fa-bars btn btn-mobile"></button>
								<h4>RECENT POSTS</h4>
							</div>

							<ul id="rp" class="list-group list-group-bordered list-group-noicon">
								<li class="list-group-item">
									<a href="#">
										<span class="fs-13 text-muted float-right"></span> Title <br>
										<span class="font-lato fs-11">June 29, 2017</span>
									</a>

								</li>
								<li class="list-group-item">
									<a href="#">
										<span class="fs-13 text-muted float-right"></span> Title <br>
										<span class="font-lato fs-11">June 29, 2017</span>
									</a>

								</li>
							</ul>

							<div class="side-nav-head mt-30" data-toggle="collapse" data-target="#archieve">
								<button class="fa fa-bars btn btn-mobile"></button>
								<h4>ARCHIEVE</h4>
							</div>

							<ul id="archieve" class="list-group list-group-bordered list-group-noicon uppercase">
								<li class="list-group-item active">
									<a class="dropdown-toggle" href="#">2017</a>
									<ul>
										<li class="list-group-item active">
											<a class="dropdown-toggle" href="#">Dec (4)</a>
											<ul>
												<li class="bullet-bar"><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Title</a></li>
												<li><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Title</a></li>
												<li><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Title</a></li>
												<li><a href="#"><span class="fs-11 text-muted float-right">(10)</span> Title</a></li>
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

						<!-- POST ITEM -->
						<div class="blog-post-item">
							<!-- .blog-post-item-inverse = image right side [left on RTL] -->

							<!-- IMAGE -->
							<figure class="blog-item-small-image mb-20">
								<img class="img-fluid" src="<?= base_url('');?>asset/content-images/slider-1.jpg" alt="">
							</figure>

							<div class="blog-item-small-content">

								<h2><a href="blog-single-default.html">BLOG IMAGE POST</a></h2>

								<ul class="blog-post-info list-inline">
									<li>
										<a href="#">
											<i class="fa fa-clock-o"></i>
											<span class="font-lato">June 29, 2017</span>
										</a>
									</li>
								</ul>

								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
									in...</p>

								<a href="#" class="btn btn-reveal btn-oldblue b-0 mt-10">
									<i class="fa fa-eye"></i>
									<span>Read More</span>
								</a>

							</div>

						</div>
						<!-- /POST ITEM -->

						<!-- POST ITEM -->
						<div class="blog-post-item">
							<!-- .blog-post-item-inverse = image right side [left on RTL] -->

							<!-- IMAGE -->
							<figure class="blog-item-small-image mb-20">
								<img class="img-fluid" src="<?= base_url('');?>asset/content-images/slider-1.jpg" alt="">
							</figure>

							<div class="blog-item-small-content">

								<h2><a href="blog-single-default.html">BLOG IMAGE POST</a></h2>

								<ul class="blog-post-info list-inline">
									<li>
										<a href="#">
											<i class="fa fa-clock-o"></i>
											<span class="font-lato">June 29, 2017</span>
										</a>
									</li>
								</ul>

								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
									in...</p>

								<a href="#" class="btn btn-reveal btn-oldblue b-0 mt-10">
									<i class="fa fa-eye"></i>
									<span>Read More</span>
								</a>

							</div>

						</div>
						<!-- /POST ITEM -->

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