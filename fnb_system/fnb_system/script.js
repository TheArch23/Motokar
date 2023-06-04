function initMap() {
	const myLatLng = { lat: 3.835494698164611, lng: 103.30153448244816 };
	const map = new google.maps.Map(document.getElementById("map"), {
	  zoom: 18.5,
	  center: myLatLng,
	  styles: [
		{
		"featureType": "all",
		"elementType": "labels",
		"stylers": [
			{ "visibility": "off" }
		]
		}
	]
	});
	
	new google.maps.Marker({
		position: myLatLng,
		map,
		title: "Hello World!",
	  });
}

  
  window.initMap = initMap;

/*function initMap() {
	map = new google.maps.Map(document.getElementById("map"), {
	  center: {lat: 3.835494698164611, lng: 103.30153448244816}, 
	  zoom: 18.5,
	  
	  styles: [
		  {
			"featureType": "all",
			"elementType": "labels",
			"stylers": [
			  { "visibility": "off" }
			]
		  }
		]
	  
	});
}
// markers

    /*var marker = new google.maps.Marker({
      position: kuantan,
      map: map
    });

    var cdata = JSON.parse(document.getElementById('data').innerHTML);
    geocoder = new google.maps.Geocoder();  
    codeAddress(cdata);

    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    showAllColleges(allData)
}

function showAllColleges(allData) {
	var infoWind = new google.maps.InfoWindow;
	Array.prototype.forEach.call(allData, function(data){
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		
		strong.textContent = data.name;
		content.appendChild(strong);

		var img = document.createElement('img');
		img.src = 'img/Leopard.jpg';
		img.style.width = '100px';
		content.appendChild(img);

		var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.lat, data.lng),
	      map: map
	    });

	    marker.addListener('mouseover', function(){
	    	infoWind.setContent(content);
	    	infoWind.open(map, marker);
	    })
	})
}

function codeAddress(cdata) {
   Array.prototype.forEach.call(cdata, function(data){
    	var address = data.name + ' ' + data.address;
	    geocoder.geocode( { 'address': address}, function(results, status) {
	      if (status == 'OK') {
	        map.setCenter(results[0].geometry.location);
	        var points = {};
	        points.id = data.id;
	        points.lat = map.getCenter().lat();
	        points.lng = map.getCenter().lng();
	        updateCollegeWithLatLng(points);
	      } else {
	        alert('Geocode was not successful for the following reason: ' + status);
	      }
	    });
	});
}

function updateCollegeWithLatLng(points) {
	$.ajax({
		url:"action.php",
		method:"post",
		data: points,
		success: function(res) {
			console.log(res)
		}
	})
	
}*/