<?php defined('BASEPATH') or Exit('No direct script access allowed');?>
<!-- FOOTER -->
<footer id="footer">
	<div class="container footer-zero">
		<div class="row mb-40 fs-13 footer-zero">
			<!-- col #1 -->
			<div class="col-12 col-md-7 pb-10 footer-zero">
				<h2 class="pt-10">
					Stay in the know
				</h2>
				<h6>Be the first to hear about new inventory and offers.</h6>
				<div class="input-email">
					<input type="text" class="form-control form-control-footer" placeholder="Your Mail" aria-label="Your Mail"
					 aria-describedby="basic-addon2">
					<div>
						<button class="email-button eyebrow">SUBMIT<i class="pl-5 fa fa-chevron-right"></i></button>
					</div>
				</div>

				<!-- Social Icons -->
				<div class="pt-15">
					<div class="clearfix">
						<a href="<?= site_url('!#');?>" class="social-icon social-icon-border social-icon-round social-facebook float-left" data-toggle="tooltip"
						 data-placement="top" title="Facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>
						<a href="<?= site_url('!#');?>" class="social-icon social-icon-border social-icon-round social-twitter float-left" data-toggle="tooltip"
						 data-placement="top" title="Twitter">
							<i class="icon-twitter"></i>
							<i class="icon-twitter"></i>
						</a>
						<a href="<?= site_url('!#');?>" class="social-icon social-icon-border social-icon-round social-instagram float-left" data-toggle="tooltip"
						 data-placement="top" title="Instagram">
							<i class="icon-instagram2"></i>
							<i class="icon-instagram2"></i>
						</a>
						<a href="<?= site_url('!#');?>" class="social-icon social-icon-border social-icon-round social-whatsapp float-left" data-toggle="tooltip"
						 data-placement="top" title="Whatsapp">
							<i class="icon-call"></i>
							<i class="icon-call"></i>
						</a>
					</div>
				</div>
				<!-- /Social Icons -->
			</div>
			<!-- /col #1 -->

			<!-- col #2 -->
			<div class="col-sm-12 col-md-5 pt-10 footer-zero">
				<div class="row">
					<div class="col-md-4 col-4 pt-5">
						<h4 class="letter-spacing-1 footer-zero">SHOP</h4>
						<ul class="list-unstyled footer-list half-paddings b-0">
							<li><a class="block" href="<?= site_url('');?>home/Shop">Aireloom</a></li>
							<li><a class="block" href="<?= site_url('');?>home/Shop">Serta</a></li>
							<li><a class="block" href="<?= site_url('');?>home/Shop">Florence</a></li>
							<li><a class="block" href="<?= site_url('');?>home/Shop">Kingkoil</a></li>
							<li><a class="block" href="<?= site_url('');?>home/Shop">Tempur</a></li>
							<li><a class="block" href="<?= site_url('');?>home/Shop">Stressless</a></li>
						</ul>
					</div>
					<div class="col-md-4 col-4 pt-5">
						<h4 class="letter-spacing-1 footer-zero">ABOUT</h4>
						<ul class="list-unstyled footer-list half-paddings b-0">
							<li><a class="block" href="<?= site_url('');?>home/pageAbout">About Us</a></li>
							<li><a class="block" href="<?= site_url('');?>home/pageContact">Contact Us</a></li>
							<li><a class="block" href="<?= site_url('');?>home/pageFaq">FAQ</a></li>
						</ul>
					</div>
					<div class="col-md-4 col-4 pt-5">
						<h4 class="letter-spacing-1 footer-zero">HELP</h4>
						<ul class="list-unstyled footer-list half-paddings b-0">
							<li><a class="block" href="<?= site_url('');?>home/termCondition">Terms & Conditions</a></li>
							<li><a class="block" href="<?= site_url('');?>home/privacyPolicy">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /col #2 -->
		</div>
	</div>
	<div class="copyright">
		<div class="container text-center">
			&copy; All Rights Reserved, <b>AGM - American Giant Mattress</b>
		</div>
	</div>
</footer>
<!-- /FOOTER -->
	</div>
	<!-- SCROLL TO TOP -->
	<a href="<?= site_url('#');?>" id="toTop"></a>
<!-- JAVASCRIPT FILES -->
<script>
	var plugin_path = "<?= base_url('asset/plugins/');?>";
</script>
<script src="<?= base_url('asset/plugins/jquery/jquery-3.3.1.min.js');?>"></script>

<script src="<?= base_url('asset/javascript/scripts.js');?>"></script>
<script src="<?= base_url('asset/javascript/scrollAnimated.js');?>"></script>

<!-- STYLESWITCHER - REMOVE -->
<!-- <script async type="text/javascript" src="demo_files/styleswitcher/styleswitcher.js"></script> -->

<!-- PAGE LEVEL SCRIPTS -->
<script src="<?= base_url('asset/javascript/demo.shop.js');?>"></script>
<script>
var stores = <?= $stores?>;
var lat = document.getElementById('lat');
var lng = document.getElementById('lng');
var km = 30;
var map;
var markers = [];
var infoWindow; // markers information
var locationSelect;
var mapOption = {
	center: {lat: -2.0372851958986224, lng: 117.06773251302911},
	zoom: 5,
	mapTypeId: 'roadmap'
}

function initMap() {
	var indonesia = {lat: -2.0372851958986224, lng: 117.06773251302911};
	map = new google.maps.Map(document.getElementById('maps'),mapOption);
	infoWindow = new google.maps.InfoWindow({map: map});

	map.data.addGeoJson(stores);

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position){
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude,
			};
			lat.value = position.coords.latitude;
			lng.value = position.coords.longitude;
			// info.nodeValue = position.coords.longitude;

			infoWindow.setPosition(pos);
			infoWindow.setContent('I\'m here.');

			map.setCenter(pos);
			map.setZoom(12);

			showLocation(mapOption, map, pos, km);
		}, function(){
			handleLocationError(true, map.getCenter());
		});
	}else{
		handleLocationError(false, map.getCenter());
	}
}

function handleLocationError(browserHasGeolocation, infoWindow, pos){
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
	'Error: Browser hasn\'t have location.':
	'Error: Browser doesn\'t support.');
}

function showLocation(mapOption, map, pos, km) {
	var populationOption = {
		strokeOpacity: 0,
		strokeWeight: 2,
		fillOpacity: 0,
		map: map,
		center: pos,
		radius: Math.sqrt(km*500) * 100
	};
	this.Crcl = new google.maps.Circle(populationOption);
}

$.each(stores.features, function(index, store){
	item = '<a href="#" class="list-group-item" data-toggle="outlet-item" data-target='+store.id+'>'+
								'<h4 class="list-group-item-heading">'+store.properties.company_name+'</h4>'+
									'<p class="list-group-item-heading">'+
										'<strong>Address : </strong>'+store.properties.address+
									'</p>'+
									'<p class="list-group-item-heading">'+
										'<strong>Phone : </strong>'+store.properties.phone+
									'</p>'
				 '</a>';
	$('#store').append(item);
});

$(document).on('click', 'a[data-toggle="outlet-item"]', function(e){
	e.preventDefault();
	var target = $(this).data('target');
	var marker = NULL;
	$.each()
});
</script>
<script async defer type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyD7Bogq9RONZQpDo-E2gU37FsnQUSSRIFs&callback=initMap"></script>
</body>

</html>
