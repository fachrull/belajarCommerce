<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
		<!-- -->
		<section class="section-xs">
			<div class="container">
				<div class="row">

					<!-- RIGHT -->
					<div class="col-8 offset-2 mb-80">

						<ul class="nav nav-tabs nav-top-border">
							<li class="active"><a href="#info" data-toggle="tab">Personal Info</a></li>
							<li><a href="#password" data-toggle="tab">Password</a></li>
						</ul>

						<div class="tab-content mt-20">

							<!-- PERSONAL INFO TAB -->
							<div class="tab-pane active" id="info">
								<form action="#" method="post">
									<div class="form-group">
										<label class="form-control-label">First Name</label>
										<input type="text" placeholder="Sherlock" class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">Last Name</label>
										<input type="text" placeholder="Holmes" class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">Email</label>
										<input type="text" placeholder="email@email.com" class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">Phone Number</label>
										<input type="text" placeholder="+4482637176" class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">Birthday</label>
										<input type="text" class="form-control masked" data-format="99/99/9999" data-placeholder="_" placeholder="dd/mm/yyy">
									</div>
									<div class="form-group">
										<label class="form-control-label">Address</label>
										<textarea class="form-control" rows="3" placeholder=""></textarea>
									</div>
									<div class="margiv-top10">
										<a href="#" class="btn btn-oldblue"><i class="fa fa-check"></i> Save Changes </a>
										<a href="#" class="btn btn-default">Cancel </a>
									</div>
								</form>
							</div>
							<!-- /PERSONAL INFO TAB -->

							<!-- PASSWORD TAB -->
							<div class="tab-pane fade" id="password">

								<form action="#" method="post">

									<div class="form-group">
										<label class="form-control-label">Current Password</label>
										<input type="password" class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">New Password</label>
										<input type="password" class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">Re-type New Password</label>
										<input type="password" class="form-control">
									</div>

									<div class="margiv-top10">
										<a href="#" class="btn btn-oldblue"><i class="fa fa-check"></i> Change Password</a>
										<a href="#" class="btn btn-default">Cancel </a>
									</div>

								</form>

							</div>
							<!-- /PASSWORD TAB -->

						</div>

					</div>

				</div>
			</div>
		</section>
		<!-- / -->