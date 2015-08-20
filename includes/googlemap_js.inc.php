<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

    //<![CDATA[
    var Indirizzo="<div class='mapPop'><strong class=\"viola\"><?php echo WEBSITE_NAME?> [+]</strong><br><?php echo WEBSITE_ADDRESS?><br><?php echo WEBSITE_ADDRESS2?><br><?php echo WEBSITE_ADDRESS3?></div>"
    
    var point;
    var map;
    var gdir;
    var geocoder = null;
    var addressMarker;
	var lat='<?php echo GOOGLE_MAPS_API_LATITUDE?>'
	var long='<?php echo GOOGLE_MAPS_API_LONGITUDE?>';
	var id_page="<?php echo  $_GET['id_page']?>"
    var infowindow
   
    $(document).ready(function () { initialize();  });

    function initialize() {

        var centerMap = new google.maps.LatLng(lat, long);

        var myOptions = {
            zoom: <?php echo GOOGLE_MAPS_API_ZOOM_LEVEL?>,
            center: centerMap,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(document.getElementById("map"), myOptions);

        setMarkers(map, sites);
	    
	    infowindow = new google.maps.InfoWindow({
                content: "loading..."
        });

        var bikeLayer = new google.maps.BicyclingLayer();
		bikeLayer.setMap(map);
		
    }

    var sites = [
		 <?php echo  $objPage->gMapData?>
    ];



    function setMarkers(map, markers) {
    	// Add markers to the map

  // Marker sizes are expressed as a Size of X,Y
  // where the origin of the image (0,0) is located
  // in the top left of the image.

  // Origins, anchor positions and coordinates of the marker
  // increase in the X direction to the right and in
  // the Y direction down.
  var image = new google.maps.MarkerImage('<?php echo  DIR_WS_IMAGES?>pointer.png',
      // This marker is 20 pixels wide by 32 pixels tall.
      new google.maps.Size(50, 52),
      // The origin for this image is 0,0.
      new google.maps.Point(0,0),
      // The anchor for this image is the base of the flagpole at 0,32.
      new google.maps.Point(0, 32));
  var shadow = new google.maps.MarkerImage('<?php echo  DIR_WS_IMAGES?>pointer.png',
      // The shadow image is larger in the horizontal dimension
      // while the position and offset are the same as for the main image.
      new google.maps.Size(37, 32),
      new google.maps.Point(0,0),
      new google.maps.Point(0, 32));
      // Shapes define the clickable region of the icon.
      // The type defines an HTML &lt;area&gt; element 'poly' which
      // traces out a polygon as a series of X,Y points. The final
      // coordinate closes the poly by connecting to the first
      // coordinate.
  var shape = {
      coord: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };
  var curMarker='';
   var bounds = new google.maps.LatLngBounds();
        for (var i = 0; i < markers.length; i++) {
            var sites = markers[i];
            var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
            var marker = new google.maps.Marker({
                position: siteLatLng,
                map: map,
                animation: google.maps.Animation.DROP,
              
                icon: image,
                title: sites[0],
                zIndex: (sites[5]==id_page)?1000:sites[3],
                html: sites[4].replace(/\\/g,"")
            });
            

			 if(sites[5]==id_page){   
			 
			 	curMarker=marker;
			 }
			
			
            var contentString = "Some content";
             infowindow = new google.maps.InfoWindow({
                content: "loading..."
           });

            google.maps.event.addListener(marker, "click"
				, function () {
					infowindow.setContent(this.html);
					infowindow.open(map, this);
				});

				bounds.extend(siteLatLng);
				map.fitBounds(bounds);
				
                if(markers.length==1){
					zoomChangeBoundsListener = google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
						if (map.getZoom()) {
							map.setZoom(<?php echo GOOGLE_MAPS_API_ZOOM_LEVEL?>);
						}
					});
					setTimeout(function() {google.maps.event.removeListener(zoomChangeBoundsListener)}, 2000);
				}
	 }
	 
	 
		 if(curMarker!=''){
					 var infowindow = new google.maps.InfoWindow({
	       					 content: curMarker.html
	    				});
		 
		 			//infowindow.setContent(marker.html);
					infowindow.open(map, curMarker);
					map.panTo(curMarker.getPosition());
		}				//map.setCenter(marker.getPosition())
	}
//]]>
</script>