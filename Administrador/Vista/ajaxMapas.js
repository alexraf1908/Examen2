/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
   function initialize(latitud,longitug) {
        var latlng = new google.maps.LatLng(latitud,longitug);
        var settings = {
            zoom: 15,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
            mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
	var companyPos = new google.maps.LatLng(latitud,longitug);
	
  var companyMarker = new google.maps.Marker({
      position: companyPos,
      map: map,
      title:"Some title"
  });
  var companyLogo = new google.maps.MarkerImage('image/camion.png',
    new google.maps.Size(100,50),
    new google.maps.Point(0,0),
    new google.maps.Point(50,50)
);
var companyShadow = new google.maps.MarkerImage('image/camion.png',
    new google.maps.Size(130,50),
    new google.maps.Point(0,0),
    new google.maps.Point(65, 50)
);
var companyPos = new google.maps.LatLng(latitud,longitug);
var companyMarker = new google.maps.Marker({
    position: companyPos,
    map: map,
    icon: companyLogo,
    shadow: companyShadow,
    title:"Company Title"
});
	}

