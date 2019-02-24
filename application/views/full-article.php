<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="page-header page-header-xs">
			<div class="container">

				<h1>AGMPEDIA</h1>

			</div>
		</section>
		<!-- /PAGE HEADER -->

		<!-- -->
		<section class="page-header page-header-md">
			<div class="container">

				<div class="row">

					<!-- LEFT -->
					<div class="col-md-3 col-sm-3">
						<!-- side navigation -->
						<div class="side-nav mb-60 mt-5">

							<div class="side-nav-head" data-toggle="collapse" data-target="#rp">
								<button class="fa fa-bars btn btn-mobile"></button>
								<h4>RECENT POSTS</h4>
							</div>

							<ul id="rp" class="list-group list-group-bordered list-group-noicon">
							    <?php foreach($pedias as $pedia): ?>
								<li class="list-group-item">
									<a href="<?= site_url('home/fullArticle/'.$pedia['id']);?>">
										<span class="fs-13 text-muted float-right"></span> <?= $pedia['title'];?> <br>
									</a>
								</li>
								<?php endforeach;?>
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
											<a class="dropdown-toggle" href="#">Jan</a>
											<ul>
											    <?php foreach($pedias as $pedia): ?>
												<li class="bullet-bar"><a href="<?= site_url('home/fullArticle/'.$pedia['id']);?>"><span class="fs-11 text-muted float-right"></span> <?= $pedia['title'];?></a></li>
												<?php endforeach;?>
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

						<h1 class="blog-post-title"><?= strtoupper($pedia['title']);?></h1>
                        <hr></br>
						<!-- IMAGE -->
						<figure class="mb-20">
							<img class="img-fluid" src="<?= site_url('asset/upload/pedia/'.$article['photo']);?>" alt="img" />
						</figure>
						<!-- /IMAGE -->

						<!-- VIDEO -->
						<!--
							<div class="mb-20 embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="http://player.vimeo.com/video/8408210" width="800" height="450"></iframe>
							</div>
							-->
						<!-- /VIDEO -->


						<!-- article content -->
						<p class="dropcap left">
							<?= $article['content']?>
						</p>
						<!-- /article content -->


						<div class="divider divider-dotted">
							<!-- divider -->
						</div>

						<!-- SHARE POST -->
						<div class="clearfix mt-30">


							<span class="float-left mt-6 bold hidden-xs-down">
								Share Post :
							</span>

							<a href="#" class="social-icon social-icon-sm social-icon-transparent social-facebook float-left" data-toggle="tooltip"
							 data-placement="top" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon social-icon-sm social-icon-transparent social-twitter float-left" data-toggle="tooltip"
							 data-placement="top" title="Twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon social-icon-sm social-icon-transparent social-instagram float-left" data-toggle="tooltip"
							 data-placement="top" title="Instagram">
								<i class="icon-instagram2"></i>
								<i class="icon-instagram2"></i>
							</a>

							<a href="#" class="social-icon social-icon-sm social-icon-transparent social-pinterest float-left" data-toggle="tooltip"
							 data-placement="top" title="Pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon social-icon-sm social-icon-transparent social-call float-left" data-toggle="tooltip"
							 data-placement="top" title="Email">
								<i class="icon-email3"></i>
								<i class="icon-email3"></i>
							</a>

						</div>
						<!-- /SHARE POST -->


						<?php if(count($pedias) > 1) { ?>
							<div class="divider">
							<!-- divider -->
							</div>
							<ul class="pager">
								<li class="previous"><a class="b-0" href="#">&larr; Previous Post</a></li>
								<li class="next"><a class="b-0" href="#">Next Post &rarr;</a></li>
							</ul>
							<div class="divider">
								<!-- divider -->
							</div>
						<?php } ?>

					</div>

				</div>


			</div>
		</section>
		<!-- / -->
