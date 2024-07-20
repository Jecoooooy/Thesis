
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.1.min.js"><\\/script>')</script>
<script>
var swiper = new Swiper('#tourism .swiper-container', {
  effect: 'coverflow',
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: 'auto',
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows : true,
  },
  pagination: {
    el: '.swiper-pagination',
  },
});
</script>
<script>
  $(document).ready(function(){
    $(".project").hover3d({
      selector: ".project__card"
    });

    $(".movie").hover3d({
      selector: ".movie__card",
      shine: true,
      sensitivity: 20,
    });
  });

</script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("year");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>



<script>


function modalplaces(PL_ID){
  var data = {"PL_ID" : PL_ID};
  jQuery.ajax({
    url : <?=BASEURL;?>+'include/modal-places.php',
    method : "post",
    data : data,
    success: function(data){
      jQuery('body').append(data);
      jQuery('#modalplaces').modal('toggle');
    },
    error: function(){
      alert("something went wrong!");
    },

  });
}

function modallatestnews(LN_ID){
  var data = {"LN_ID" : LN_ID};
  jQuery.ajax({
    url : <?=BASEURL;?>+'include/modal-latest-news.php',
    method : "post",
    data : data,
    success: function(data){
      jQuery('body').append(data);
      jQuery('#modallatestnews').modal('toggle');
    },
    error: function(){
      alert("something went wrong!");
    },

  });
}
function modalproduct(PROD_ID){
  var data = {"PROD_ID" : PROD_ID};
  jQuery.ajax({
    url : <?=BASEURL;?>+'include/modal-products.php',
    method : "post",
    data : data,
    success: function(data){
      jQuery('body').append(data);
      jQuery('#modalproduct').modal('toggle');
    },
    error: function(){
      alert("something went wrong!");
    },
  });
}
function modalrequirements(){
  var data;
  jQuery.ajax({
    url : <?=BASEURL;?>+'admin/include/modal-requirements.php',
    method : "post",
    data : data,
    success: function(data){
      jQuery('body').append(data);
      jQuery('#modalrequirements').modal('toggle');
    },
    error: function(){
      alert("something went wrong!");
    },
  });
}

</script>
<script>
 $(document).ready(function(){
      var i=1;
      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="new[]" placeholder="Enter Requirement" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger pull-right btn_remove">X</button></td></tr>');

      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });

 });
 </script>
 <script>
  $(document).ready(function(){
       var i=1;
       $('#add1').click(function(){
            i++;
            $('#dynamic_field1').append('<tr id="row1'+i+'"><td><input type="text" name="old[]" placeholder="Enter Requirement" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger pull-right btn_remove1">X</button></td></tr>');

       });
       $(document).on('click', '.btn_remove1', function(){
            var button_id = $(this).attr("id");
            $('#row1'+button_id+'').remove();
       });

  });
  </script>
  <script>
   $(document).ready(function(){
        var i=1;
        var jec = '<tr id="row2'+i+'"><td><textarea rows="5" class = "form-control name_list" name="applicant[]" id ="applicant" placeholder="Applicant/Client"></textarea></td><td><textarea rows="5" class = "form-control name_list" name="activity[]" id ="activity" placeholder="Administration Office Activity"></textarea></td><td><input type="number" name="num[]" placeholder="DURATION" class="form-control name_list" /></td><td><input type="type" name="person[]" placeholder="Employee" class="form-control name_list" ></td><td><button type="button" name="remove2" id="'+i+'" class="btn btn-danger pull-right btn_remove2">X</button></td></tr>';
        $('#add2').click(function(){
             i++;
             $('#dynamic_field2').append(jec);

        });
        $(document).on('click', '.btn_remove2', function(){
             var button_id = $(this).attr("id");
             $('#row2'+button_id+'').remove();
        });

   });
   </script>
   <script>
     function initMap(){
       // Map options
       var options = {
         zoom:15,
         center:{lat:14.1931,lng:120.7925}
       }

       // New map
       var map = new google.maps.Map(document.getElementById('map'), options);
       // Listen for click on map
       google.maps.event.addListener(map, 'click', function(event){
         // Add marker
         addMarker({coords:event.latLng});
       });

       /*
       // Add marker
       var marker = new google.maps.Marker({
         position:{lat:42.4668,lng:-70.9495},
         map:map,
         icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
       });

       var infoWindow = new google.maps.InfoWindow({
         content:'<h1>Lynn MA</h1>'
       });

       marker.addListener('click', function(){
         infoWindow.open(map, marker);
       });
       */

       // Array of markers
       var markers = [
         {
           coords:{lat:42.4668,lng:-70.9495},
           iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
           content:'<h1>Lynn MA</h1>'
         },
         {
           coords:{lat:42.8584,lng:-70.9300},
           content:'<h1>Amesbury MA</h1>'
         },
         {
           coords:{lat:42.7762,lng:-71.0773}
         }
       ];

       // Loop through markers
       for(var i = 0;i < markers.length;i++){
         // Add marker
         addMarker(markers[i]);
       }

       // Add Marker Function
       function addMarker(props){
         var marker = new google.maps.Marker({
           position:props.coords,
           map:map,
           //icon:props.iconImage
         });

         // Check for customicon
         if(props.iconImage){
           // Set icon image
           marker.setIcon(props.iconImage);
         }

         // Check content
         if(props.content){
           var infoWindow = new google.maps.InfoWindow({
             content:props.content
           });

           marker.addListener('click', function(){
             infoWindow.open(map, marker);
           });
         }
       }
     }
   </script>
   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQJ__EGodrZhXReYQMbsJtYKSbm42qvnw&callback=initMap"></script>
</body>
</html>
