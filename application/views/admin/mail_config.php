<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
	<section class="content">
		<h1 class="text-center">MAIL CONFIGURATION</h1>
		<div class="container-fluid">
			<div class="register-box mt-0" style="width: auto !important">
				<div class="register-box-body">
					<div class="row">
						<div class="col-md-12 col-sm-6">
							<!-- ALERT -->
                            <?php if($this->session->has_userdata('error')): ?>
							<div class="alert alert-mini alert-danger mb-30">
								<strong>Oh snap!</strong>
								<?= $this->session->flashdata('error');?>
							</div>
                            <?php endif;?>

                            <?php if($this->session->has_userdata('success')): ?>
                                <div class="alert alert-mini alert-success mb-30">
                                    <strong>Congrats!</strong>
                                    <?= $this->session->flashdata('success');?>
                                </div>
							<?php endif;?>
							<!-- /ALERT -->
							<?= form_open_multipart('admin/mail', array('class' => 'm-0 sky-form', 'id' => 'mailConfig')); ?>
							<!-- <p class="register-box-msg">Add a new product</p> -->
							<div class="form-group">
                  				<label><strong>Email</strong></label>
                                <input type="hidden" name="id" value="<?= $mailConfig['id'] ?>">
                  				<input type="email" class="form-control" name="email" value="<?= $mailConfig['email'] ?>" placeholder="example@mail.com">
                			</div>
                            <div class="form-group">
                                <label><strong>Password</strong></label>
                                <input type="password" class="form-control" name="password" placeholder="Email Password">
                            </div>
                            <div class="form-group">
                                <label><strong>SMTP Host</strong></label>
                                <input type="text" class="form-control" name="host" value="<?= $mailConfig['host'] ?>" placeholder="mail.host.com">
                            </div>
                            <div class="form-group">
                                <label><strong>SMTP Port</strong></label>
                                <input type="text" class="form-control" name="port" value="<?= $mailConfig['port'] ?>" placeholder="465">
                            </div>
							<div class="row mt-10">
								<div class="col-md-6 text-left">
									<a href="<?=site_url('/')?>" class="btn btn-oldblue btn-default">Cancel</a>
									<!-- <button type="button" id="submit" name="button" class="btn btn-default">Test</button> -->
								</div>
                                <div class="col-md-6 text-right">
                                    <button id="submit" type="submit" class="btn btn-oldblue btn-default">Save</button>
                                    <!-- <button type="button" id="submit" name="button" class="btn btn-default">Test</button> -->
                                </div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
