<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/loading-indicator.css'); ?>">
<style type="text/css">
	#store-lookup-result {
		min-height: 230px;
	}
	#lookup-loading-indicator {
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 999;
		background: transparent;
	}
	#lookup-loading-indicator .loading-effect {
		left: 50%;
        top: 50%;
        margin-left: -32px;
        margin-top: -32px;
        color: #DAD8DC;
	}
	#infowindow-content .title {
		font-weight: bold;
	}

	#infowindow-content {
		display: none;
		max-width: 320px;
		word-wrap: break-word;
	}

	#infowindow-content #place-address,
	#infowindow-content #place-direction {
		margin-top: 10px;
		display: block;
	}

	#map-object #infowindow-content {
		display: inline;
	}

	.clickable {
		cursor: pointer;
	}
</style>
<div class="location-form">
	<div class="row location-form-small float-right">
		<div class="col-12 location-form-small">
			<div class="modal-dialog w-350 mr-60 absolute" style="z-index:1;">
				<div class="modal-content">
					<div class="modal-header">
						<p>
						Cari Lokasi Agen
						</p>
						<div class="input-group mt-0">
							<div class="input-group-addon">
							<i class="fa fa-search"></i>
							</div>
							<input id="search-location" type="text" class="form-control" placeholder="Search">
						</div>
						<br/>
						<button id="use-my-location" class="btn btn-default"><i class="fa fa-map-marker"></i> My Location</button>	
					</div>
					<div id="store-lookup-result" class="modal-body">
						<div id="lookup-loading-indicator" style="display: none">
							<div class="loading-effect lds-ripple"><div></div><div></div></div>
						</div>
						<div id="lookup-alert" class="alert alert-info" style="display: none"></div>
						<div id="list-of-store" class="list-group margin-bottom-0 list-height"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12 pb-30">
		<div class="form-group h-500">
			<div class="absolute" id="map-object" ></div>
			<div id="infowindow-content">
				<img src="" width="16" height="16" id="place-icon">
				<span id="place-name"  class="title"></span><br>
				<span id="place-address"></span>
				<br/>
				<a id="place-direction" href="#" class="btn btn-default" target="_blank">Get Direction</a>
			</div>
		</div>
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDF2j6e5Glf3NYC_7dF0YRKB2fvI0KPxiw&libraries=places&callback=initMap"" type="text/javascript"></script>
<script type="text/javascript">
	let infoWindow, infowindowContent, myMarker;

	function initMap() {
		infoWindow = new google.maps.InfoWindow();
		infoWindowContent = $('#infowindow-content').get(0);
		infoWindow.setContent(infoWindowContent);

		const mapOption =  {
			center: {lat: -2.0372851958986224, lng: 117.06773251302911},
			zoom: 5,
			mapTypeId: 'roadmap'
		}
		// init map
		const map = new google.maps.Map(document.getElementById('map-object'), mapOption);
		// attach search autocompletion
		attachAutoCompleteSearch(map);

		registerFindMyLocationEvent(map);
	};

	function attachAutoCompleteSearch(mapObj) {
		const input = $('#search-location').get(0);
		var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', mapObj);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);
        myMarker = new google.maps.Marker({
			map: mapObj,
			anchorPoint: new google.maps.Point(0, -29)
		});
		autocomplete.addListener('place_changed', function() {
			myMarker.setVisible(false);
			clearSearchResult();

			const place = autocomplete.getPlace();
			if (!place.geometry) {
				// User entered the name of a Place that was not suggested and
				// pressed the Enter key, or the Place Details request failed.
				window.alert("No details available for input: '" + place.name + "'");
				return;
			}

			const location = place.geometry.location;

			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				mapObj.fitBounds(place.geometry.viewport);
			} else {
				mapObj.setCenter(location);
				mapObj.setZoom(10);  // Why 10? Because it looks good.
			}

			// show marker
			showMyMarker(myMarker, location);

			// request nearest stores in current location
			findNearestStoreBasedLocation(mapObj, location.lat(), location.lng());

		});
	}

	function showMyMarker(markerObj, location) {
		markerObj.setPosition(location);
        markerObj.setVisible(true);
	}

	function clearSearchResult() {
		$('#list-of-store').html('');
		hideAlert();
	}

	function findNearestStoreBasedLocation(mapObj, lat, lng) {
		console.log(`finding store for location (${lat}, ${lng})...`);

		// inform user that request is being in process
		showLoading();

		const req = { // let server know which location we've needed
			lat: lat,
			lng: lng
		};
		const url = '<?php echo base_url('home/store-lookup'); ?>';

		const ms1 = (new Date()).getTime();
		
		$.get(url, req, function(data) {

			const ms2 = (new Date()).getTime();
			console.log(`lookup finish in ${ms2 - ms1}ms`);
			
			data = $.parseJSON(data);
			console.log('data from response: ', data);

			if (!Array.isArray(data)) {
				showAlert('Invalid data received from server: <i>' + (typeof data) + '</i>');
				return;
			}

			if (data.length > 0) {
				console.log('store found: ', data);

				try {
					displayLookupResult(mapObj, data);
				} catch (e) {
					console.error(e);
				}
			} else {
				showAlert('No store found in this area');
			}
		}).fail(e => {
			console.log('request failed');
			showAlert('There is a problem while requesting the data from the server');
		}).always(e => {
			hideLoading(); // it indicating that the process is finish
		});
	}

	function showLoading() {
		$('#lookup-loading-indicator').css('display', 'block');
	}

	function hideLoading() {
		$('#lookup-loading-indicator').css('display', 'none');
	}

	function showAlert(message) {
		const el = $('#lookup-alert');
		el.html(message);
		el.show('fast');
	}

	function hideAlert() {
		const el = $('#lookup-alert');
		el.html('');
		el.hide('fast');
	}

	function displayLookupResult(mapObj, arr) {
		const listContainer = $('#list-of-store');
		listContainer.append('<p>Availbale Store:</p>');

		const bounds = new google.maps.LatLngBounds()
		const markers = [];
		
		// loop through given array
		for (var i = 0; i < arr.length; i++) {
			const obj = arr[i];

			const listItemHeader = $('<h4></h4>');
			listItemHeader.addClass('list-group-item-heading');
			listItemHeader.text(obj.company_name);

			const listItemContent = $('<p></p>');
			listItemContent.addClass('list-group-item-text');
			listItemContent.text(obj.address);

			const listItem = $('<li></li>');
			listItem.addClass('list-group-item');
			listItem.addClass('clickable');
			listItem.append(listItemHeader);
			listItem.append(listItemContent);

			listContainer.append(listItem)

			const marker = generateMarkerForItem(listItem, obj, mapObj, infoWindow);
			bounds.extend(marker.position);

			markers.push(marker);
		}

		// set camera to fit bound
		mapObj.fitBounds(bounds);

		mapObj.panTo(myMarker.getPosition());  //change map center

	    google.maps.event.addListenerOnce(mapObj, 'idle', () => {
	        resizeMapView(mapObj, markers); //adjust viewport
	    });
	}
	function generateMarkerForItem(listItem, obj, mapObj, infoWindow) {
		const icon = '<?= base_url('asset/logo-agm/favicon.png');?>';
		// init object
		const marker = new google.maps.Marker({
			map: mapObj,
			anchorPoint: new google.maps.Point(0, -29),
			position: new google.maps.LatLng(obj.latitude, obj.longitude),
			icon: icon,
			animation: google.maps.Animation.BOUNCE
		});

		// add event listener
		google.maps.event.addListener(marker, 'click', ((m, mObj) => {
			return () => {
				infoWindowContent.children['place-icon'].src = icon;
				infoWindowContent.children['place-name'].textContent = mObj.company_name;
				infoWindowContent.children['place-address'].textContent = mObj.address;

				const myPosition = myMarker.getPosition();
				const myLatLng = `${myPosition.lat()},${myPosition.lng()}`;

				const destPosition = m.getPosition();
				const destLatLng = `${destPosition.lat()},${destPosition.lng()}`;

				const link = `https://www.google.com/maps/dir/${myLatLng}/${destLatLng}`;

				infoWindowContent.children['place-direction'].href = link;

				// [optional] auto center
				// mapObj.panTo(destPosition);

      			infoWindow.open(mapObj, m);
			}
		})(marker, obj));

		listItem.on('click', (event) => {
			mapObj.setCenter(marker.location);
			mapObj.setZoom(10);
			new google.maps.event.trigger( marker, 'click' );
		});

		return marker;
	}

	function resizeMapView(map, markers) {
		const mapBounds = map.getBounds(); // get bounds of the map object's viewport

		var result = markers.filter(marker => {  //determine wether map contains all the markers
		    if (!mapBounds.contains(marker.getPosition())) {
		        return true;
		    }
		});
		if (result.length > 0) {
		    var zoom = map.getZoom();
		    map.setZoom(zoom - 1);
		    resizeMapView(map, markers);
		}
	}

	function registerFindMyLocationEvent(mapObj) {
		$('#use-my-location').on('click', (e) => {
			if (navigator.geolocation) {

				navigator.geolocation.getCurrentPosition(position => {

					const pos = {
	                    lat: position.coords.latitude,
	                    lng: position.coords.longitude,
	                };
					myMarker.setPosition(new google.maps.LatLng(pos));
					clearSearchResult();
					$('#search-location').val('');
					findNearestStoreBasedLocation(mapObj, pos.lat, pos.lng);

				}, err => {

            		handleFindMyLocationError(true, err);

				});

            } else {
            	handleFindMyLocationError(false);
            }
		});
	}

	function handleFindMyLocationError(browserHasGeolocation, error) {
		const errorMessage = browserHasGeolocation ?
		            'Error! Denied by user. Please allow location access to use find my location feature' :
		            'Error! Browser doesn\'t support find current location.';
        showAlert(errorMessage);
	}
</script>
