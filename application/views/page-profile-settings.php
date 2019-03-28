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

						<div class="tab-content">
							<?php if ($this->session->has_userdata('error')): ?>
								<div class="text-center">
									<div class="container">
										<div class="container text-center" style="background: #ffcccc; border: 1px solid red;">
											<?= $this->session->userdata('error');?>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<!-- PERSONAL INFO TAB -->
							<div class="tab-pane active" id="info">
								<form action="<?= site_url('home/profileSetting')?>" method="post">
									<div class="form-group">
										<label class="form-control-label">First Name</label>
										<input type="text" name="firstname" value="<?= $profile['first_name'];?>" class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">Last Name</label>
										<input type="text" name="lastname" value="<?= $profile['last_name']?>" class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">Email</label>
										<input type="email" name="email" value="<?= $profile['email']?>" class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">Phone Number</label>
										<input type="text" name="phone" value="<?= $profile['phone']?>" class="form-control">
									</div>
									<div class="form-group">
										<label class="form-control-label">Province</label>
										<select id="province" name="province" class="form-control" name="">
											<option value="Select" selected disabled> Province </option>
											<?php foreach ($provinces as $province): ?>
												<option value="<?= $province['id_prov']?>"><?= $province['nama']?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<label class="form-control-label">City</label>
										<select class="form-control" name="city" id="city">
											<option value="Select" selected disabled> City </option>
										</select>
									</div>
									<div class="form-group">
										<label class="form-control-label">Sub District</label>
										<select class="form-control" name="sub_district" id="sub_district">
											<option value="Select" selected disabled> City </option>
										</select>
									</div>
									<div class="form-group">
										<label class="form-control-label">Address</label>
										<textarea class="form-control" name="address" rows="3" placeholder=""><?= $profile['address']?></textarea>
									</div>
									<div class="form-group">
										<label class="form-control-label">Postcode</label>
										<input type="text" name="postcode" value="<?= $profile['postcode']?>" class="form-control">
									</div>
									<div class="margiv-top10">
										<button type="submit" class="btn btn-oldblue"><i class="fa fa-check"></i> Save Changes </button>
										<a href="<?= site_url('home/profilePage');?>" class="btn btn-default">Cancel </a>
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
