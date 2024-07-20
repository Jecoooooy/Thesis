
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
  tabcontent = document.getElementsByClassName("tabcontent1");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("category");
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
    url :'/thesis/include/modal-places.php',
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
    url : '/thesis/include/modal-latest-news.php',
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
    url :'/thesis/include/modal-products.php',
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
function modalfestivities(F_ID){
  var data = {"F_ID" : F_ID};
  jQuery.ajax({
    url : '/thesis/include/modal-festivities.php',
    method : "post",
    data : data,
    success: function(data){
      jQuery('body').append(data);
      jQuery('#modalfestivities').modal('toggle');
    },
    error: function(){
      alert("something went wrong!");
    },
  });
}
function modalprocurement(PROC_ID){
  var data = {"PROC_ID" : PROC_ID};
  jQuery.ajax({
    url : '/thesis/include/modal-procurement.php',
    method : "post",
    data : data,
    success: function(data){
      jQuery('body').append(data);
      jQuery('#modalprocurement').modal('toggle');
    },
    error: function(){
      alert("something went wrong!");
    },
  });
}
function modalservice(S_ID){
  var data = {"S_ID" : S_ID};
  jQuery.ajax({
    url : '/thesis/include/modal-services.php',
    method : "post",
    data : data,
    success: function(data){
      jQuery('body').append(data);
      jQuery('#modalservice').modal('toggle');
    },
    error: function(){
      alert("something went wrong!");
    },
  });
}
function modalordinance(id){
  var data = {"id" : id};
  jQuery.ajax({
    url : '/thesis/include/modal-ordinance.php',
    method : "post",
    data : data,
    success: function(data){
      jQuery('body').append(data);
      jQuery('#modalordinance').modal('toggle');
    },
    error: function(){
      alert("something went wrong!");
    },
  });
}
</script>
</body>
</html>
