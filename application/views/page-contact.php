<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script src="https://www.google.com/recaptcha/api.js?render=6Lcxm5wUAAAAAEhnAdo5xeknvh7RXGpTqWq5XDTO"></script>

<section class="page-header page-header-md">
	<div class="container">

		<h1>CONTACT US</h1>

		<!-- breadcrumbs -->
		<!--<ol class="breadcrumb  breadcrumb">-->
		<!--	<li><a href="#">Home</a></li>-->
		<!--	<li><a href="#">Pages</a></li>-->
		<!--	<li class="active">Contact</li>-->
		<!--</ol>-->
		<!-- /breadcrumbs -->

	</div>
</section>
<!-- /PAGE HEADER -->



<!-- -->
<section class="page-header page-header-md">
	<div class="container">

		<div class="row">

			<!-- FORM -->
			<div class="col-md-9 col-sm-9">

				<h3 class="pb-30">Drop us a line or just say <strong><em>Hello!</em></strong></h3>


				<!--
								MESSAGES
								
									How it works?
									The form data is posted to php/contact.php where the fields are verified!
									php.contact.php will redirect back here and will add a hash to the end of the URL:
										#alert_success 		= email sent
										#alert_failed		= email not sent - internal server error (404 error or SMTP problem)
										#alert_mandatory	= email not sent - required fields empty
										Hashes are handled by assets/js/contact.js

									Form data: required to be an array. Example:
										contact[email][required]  WHERE: [email] = field name, [required] = only if this field is required (PHP will check this)
										Also, add `required` to input fields if is a mandatory field. 
										Example: <input required type="email" value="" class="form-control" name="contact[email][required]">

									PLEASE NOTE: IF YOU WANT TO ADD OR REMOVE FIELDS (EXCEPT CAPTCHA), JUST EDIT THE HTML CODE, NO NEED TO EDIT php/contact.php or javascript
												 ALL FIELDS ARE DETECTED DINAMICALY BY THE PHP

									WARNING! Do not change the `email` and `name`!
												contact[name][required] 	- should stay as it is because PHP is using it for AddReplyTo (phpmailer)
												contact[email][required] 	- should stay as it is because PHP is using it for AddReplyTo (phpmailer)
							-->

				<!-- Alert Success -->
				<div id="alert_success" class="alert alert-success margin-bottom-30">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thank You!</strong> Your message successfully sent!
				</div><!-- /Alert Success -->


				<!-- Alert Failed -->
				<div id="alert_failed" class="alert alert-danger margin-bottom-30">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>[SMTP] Error!</strong> Internal server error!
				</div><!-- /Alert Failed -->


				<!-- Alert Mandatory -->
				<div id="alert_mandatory" class="alert alert-danger margin-bottom-30">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Sorry!</strong> You need to complete all mandatory (*) fields!
				</div><!-- /Alert Mandatory -->


				<form action="php/contact.php" method="post" enctype="multipart/form-data">
					<fieldset>
						<input type="hidden" name="action" value="contact_send" />

						<div class="row">
							<div class="col-md-4">
								<label for="contact:name">Full Name *</label>
								<input required type="text" value="" class="form-control" name="contact[name][required]" id="contact:name">
							</div>
							<div class="col-md-4">
								<label for="contact:email">E-mail Address *</label>
								<input required type="email" value="" class="form-control" name="contact[email][required]" id="contact:email">
							</div>
							<div class="col-md-4">
								<label for="contact:phone">Phone</label>
								<input type="text" value="" class="form-control" name="contact[phone]" id="contact:phone">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="contact:subject">Subject *</label>
								<input required type="text" value="" class="form-control" name="contact[subject][required]" id="contact:subject">
							</div>

						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="contact:message">Message *</label>
								<textarea required maxlength="10000" rows="8" class="form-control" name="contact[message]" id="contact:message"></textarea>
							</div>
                            <input type="hidden" name="token" id="token">

                        </div>

					</fieldset>

					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-oldblue"><i class="fa fa-check"></i> SEND MESSAGE</button>
						</div>
					</div>
				</form>

			</div>
			<!-- /FORM -->


			<!-- INFO -->
			<div class="col-md-3 col-sm-3">

				<h2>Visit Us</h2>

				<p>
					&nbsp;
				</p>

				<hr />

				<p>
					<span class="block"><strong><i class="fa fa-whatsapp"></i> Whatsapp:</strong> <a href="https://wa.me/15551234567" target="_blank">15551234567</a></span>
					<span class="block"><strong><i class="fa fa-envelope"></i> Email:</strong> <a href="mailto:mail@yourdomain.com">mail@yourdomain.com</a></span>
				</p>
                <p>
                    <span class="block"><strong>Operation Hours:</strong> Monday - Friday, 9 AM - 6 PM</span>
                </p>

				<hr />


			</div>
			<!-- /INFO -->

		</div>

	</div>
</section>
<!-- / -->
