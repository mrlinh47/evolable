function initMap() {
	var locationRio = {lat: 35.6586299, lng: 139.7531492};
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 18,
		center: locationRio,
		gestureHandling: 'cooperative',
		scrollwheel: false
	});
	var marker = new google.maps.Marker({
		position: locationRio,
		map: map,
		title: 'Hello World!'
	});
}
