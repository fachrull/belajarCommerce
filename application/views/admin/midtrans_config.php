<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
	<section class="content">
		<h1 class="text-center">MIDTRANS CONFIGURATION</h1>
		<div class="container-fluid">
			<div class="register-box mt-0" style="width: auto !important">
				<div class="register-box-body">
					<div class="row">
						<div class="col-md-12 col-sm-6">
                            <?php if($this->input->post('serverkey') == NULL): ?>
                            <?= validation_errors('<div class="alert alert-mini alert-danger mb-30">', '</div>');?>
                            <?php endif; ?>
							<!-- ALERT -->
                            <?php if($this->session->has_userdata('success')): ?>
                                <div class="alert alert-mini alert-success mb-30">
                                    <strong>Congrats!</strong>
                                    <?= $this->session->flashdata('success');?>
                                </div>
							<?php endif;?>
							<!-- /ALERT -->
							<?= form_open_multipart('admin/midtrans', array('class' => 'm-0 sky-form', 'id' => 'midtransConfig')); ?>
							<!-- <p class="register-box-msg">Add a new product</p> -->
							<div class="form-group">
                  				<label><strong>Server Key</strong></label>
                                <input type="hidden" name="id" value="<?= $midtransConfig['id'] ?>">
                  				<input type="text" class="form-control" name="serverkey" value="<?= $midtransConfig['server_key'] ?>">
                			</div>
                            <div class="form-group">
                                <label><strong>Client Key</strong></label>
                                <input type="text" class="form-control" name="clientkey" value="<?= $midtransConfig['client_key'] ?>">
							</div>
							<div class="form-group">
								<label>Production</label>
								<br>
              				  	<label><input type="radio" name="r1" class="minimal" checked></label>
              				  	<label>Yes</label>
								<br>
								<label><input type="radio" name="r1" class="minimal"></label>
								<label>No</label>
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
