/* Code based on Google Map APIv3 Tutorials */
var gmapdata;
var gmapmarker;
var infoWindow;
var def_zoomval = 12;
var def_x = -7.697383;
var def_y = 110.602942;

function if_gmap_init()
{
	var curpoint = new google.maps.LatLng(def_x,def_y);

	gmapdata = new google.maps.Map(document.getElementById("mapitems"), {
		center: curpoint,
		zoom: def_zoomval,
		mapTypeId: 'hybrid'
		});

	gmapmarker = new google.maps.Marker({
					map: gmapdata,
					position: curpoint
				});

	infoWindow = new google.maps.InfoWindow;
	google.maps.event.addListener(gmapdata, 'click', function(event) {
		document.getElementById("y").value = event.latLng.lng().toFixed(6);
		document.getElementById("x").value = event.latLng.lat().toFixed(6);
		gmapmarker.setPosition(event.latLng);
		if_gmap_updateInfoWindow();
	});

	google.maps.event.addListener(gmapmarker, 'click', function() {
		if_gmap_updateInfoWindow();
		infoWindow.open(gmapdata, gmapmarker);
	});

	//document.getElementById("x").value = def_x;
	//document.getElementById("y").value = def_y;

	return false;
} // end of if_gmap_init

function if_gmap_loadpicker()
{
	var x = document.getElementById("x").value;
	var y = document.getElementById("y").value;

	if (x.length > 0) {
		if (isNaN(parseFloat(x)) == true) {
			x = def_x;
		} // end of if
	} else {
		x = def_x;
	} // end of if

	if (y.length > 0) {
		if (isNaN(parseFloat(y)) == true) {
			y = def_y;
		} // end of if
	} else {
		y = def_y;
	} // end of if

	var curpoint = new google.maps.LatLng(x,y);

	gmapmarker.setPosition(curpoint);
	gmapdata.setCenter(curpoint);
	//gmapdata.setZoom(zoomval);

	if_gmap_updateInfoWindow();
	return false;
} // end of if_gmap_loadpicker
function if_gmap_updateInfoWindow()
{
	infoWindow.setContent("Longitude: "+ gmapmarker.getPosition().lng().toFixed(6)+"<br>"+"Latitude: "+ gmapmarker.getPosition().lat().toFixed(6));
} // end of if_gmap_bindInfoWindow

