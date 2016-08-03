<h1>Orders Fulfilled Today WorldWide</h1>

<div align="center">
  <div style='overflow:hidden;height:440px;width:700px;'>
    <div id='gmap_canvas' style='height:440px;width:700px;'></div>
  </div>
</div>

<script type='text/javascript'>
/* global google */
/* global _ */
/* global navigator */


    var map;
    var shoppingLists = new Array();
    
    // initiates map centered at location of user
    function initMap() {
      var map = new google.maps.Map(document.getElementById('gmap_canvas'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 2
      });

      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          map.setCenter(pos);
        });
      }
      
      // gets locations from locations.php
      $.getJSON("locations.php")
        
        // when done fetching locations, store locations
        .done(function(data, textStatus, jqXHR) 
        {
            data = JSON.parse(data);
          
            // loops through locations array
            for(var i = 0; i < data.length; i++) {
              
              var obj = data[i];
              
              var LatLng = new google.maps.LatLng(obj["latitude"], obj["longitude"]);
              
              // creates marker for location
              var marker = new google.maps.Marker({
                  position: LatLng,
                  title:"Order",
                  visible: true
              });
              
              marker.setMap(map);

              // adds shoppingList to associative array
              shoppingLists[LatLng] = obj["shoppingList"];
              
              // creates click event listener for infowindow
              marker.addListener("click", function() {

                var infowindow = new google.maps.InfoWindow({
                  content: "<h5>Shopping List:</h5><p>" + shoppingLists[this.position] + "</p>",
                  position: this.position
                });
                
                infowindow.open(map);
              });
            }   
        });
    }

    google.maps.event.addDomListener(window, 'load', initMap);
    </script>
    
    
              
              