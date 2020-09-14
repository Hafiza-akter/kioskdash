<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}" >
  {{-- <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> --}}

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

  <style>


  </style>

  <link rel="stylesheet" href="{{ asset('css/leaflet.css')}}"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="{{asset('js/leaflet.js')}}"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
{{-- 
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

 --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/rain_master_normalize.css')}}" />
<link href='{{asset('css/css.css')}}' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{asset('css/rain_master_demo.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/rain_master_style1.css')}}" />

</head>

<body>

  {{-- <div class="demo-1" style="position: fixed;top: 0;">
    <div class="image-preload">
      <img src="img/drop-color.png" alt="">
      <img src="img/drop-alpha.png" alt="">
      <img src="img/weather/texture-rain-fg.png" />
      <img src="img/weather/texture-rain-bg.png" />
      <img src="img/weather/texture-sun-fg.png" />
      <img src="img/weather/texture-sun-bg.png" />
      <img src="img/weather/texture-fallout-fg.png" />
      <img src="img/weather/texture-fallout-bg.png" />
      <img src="img/weather/texture-drizzle-fg.png" />
      <img src="img/weather/texture-drizzle-bg.png" />
    </div>
    <div class="">
      <header class="codrops-header">
              
      </header>
      <div class="slideshow">
        <canvas width="1" height="1" id="container" style="position:absolute"></canvas>
          <div class="slide" id="slide-2" data-weather="drizzle">
        </div>
        <nav class="slideshow__nav" style="display: none;">
          <a class="nav-item" href="#"></a>
          <a class="nav-item" href="#slide-2"><i class="icon icon--drizzle"></i><span>10/25</span></a>
          <a class="nav-item" href="#slide-3"><i class="icon icon--sun"></i><span>10/26</span></a>
          <a class="nav-item" href="#slide-5"><i class="icon icon--storm"></i><span>10/28</span></a>
          <a class="nav-item" href="#slide-4"><i class="icon icon--radioactive"></i><span>10/27</span></a>
        </nav>
      </div>
      <p class="nosupport">Sorry, but your browser does not support WebGL!</p>
    </div>

    <h6 class="text-uppercase mt-2" style=" font-size: 22px;color: white; text-align: left;margin-left:15px;position:absolute;top:2.9%">

    <i class="fa fa-clock mr-1 mt-2" style="text-shadow: 0px 1px 3px #000;"></i>
    <span id="forecast_detail_date_location_new_2" style="text-shadow: 0px 1px 3px #000;">
      <span class="clock"></span>
    </span>

    </h6>
  </div> --}}

<div class="container-fluid px-0"> <!-- data-interval="true" data-pause="hover"-->
    <div id="carouselExampleControls" class="carousel slide"  data-pause="hover"   data-ride="carousel" style="z-index: 19090909">
    {{-- <div id="carouselExampleControls" class="carousel slide"  data-interval="false"  data-ride="carousel"> --}}
        <div class="carousel-inner" role="listbox" >

          @if($slider && !empty($slider))

            @foreach($slider as $key=>$val)
              @include('dashboard.components.sliders.kiosk_slider_'.$slider[$key]['id'],['key' => $key, 'data' =>$val])
            @endforeach
          @else
            <h1>No slider assigned for the user</h1>
          @endif
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="pointer-events: all">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="pointer-events: all" >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


</div>

<div class="preloader-wrap" style="z-index: 9898989899;">
  <div class="percentage" id="precent"></div>
  <div class="loaders">
    <div class="trackbar">
      <div class="loadbar"></div>
    </div>
    <div class="glow"></div>
  </div>

</div>
  <script src="{{ asset('js/jquery.min.js')}}"></script>
  <script src="{{ asset('js/popper.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>

<script>
//  currentTime();
if ( $( "#mapid" ).length ) {

    var map = L.map('mapid').setView([23.777176,  90.3563], 7);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    // id: 'mapbox/streets-v11',
    id: 'mapbox/light-v10',
    tileSize: 512,
    // invalidateSize:false,
    zoomOffset: -1
  }).addTo(map);
  fetch('{{ asset("js/bgd_admbnda_adm3_bbs_s10p.geojson")}}')
  .then(function (response){
    return response.json();
  })
  .then(function (data){
    L.geoJSON(data).addTo(map);
  })
}else{
  var map = null;
}

var mymap = null;


$.fn.carousel.Constructor.prototype.cycle = function (event) {
    
    if (!event) {
        this._isPaused = false;
      }

      if (this._interval) {
        clearInterval(this._interval)
        this._interval = null;
      }

      if (this._config.interval && !this._isPaused) {
          
        var $ele = $('.carousel-item-next');
        var newInterval = $ele.data('interval') || this._config.interval;
        this._interval = setInterval(
          (document.visibilityState ? this.nextWhenVisible : this.next).bind(this),
          newInterval
        );
      }
};
function currentTime() {
  var date = new Date(); /* creating object of Date class */
  var hour = date.getHours();
  var min = date.getMinutes();
  var sec = date.getSeconds();


  var dd = "AM";
  var h = hour;
  if (h >= 12) {
    h = hour - 12;
    dd = "PM";
  }
  if (h == 0) {
    h = 12;
  }
  
  hour = updateTime(h);
  min = updateTime(min);
  sec = updateTime(sec);


  document.getElementsByClassName("clock")[0].innerText = hour + " : " + min + " : " + sec +" " + dd; /* adding time to the div */
    var t = setTimeout(function(){ currentTime() }, 1000); /* setting timer */
}

function updateTime(k) {

  if (k < 10) {
    k = "0" + k;
  }

  var engNumber = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
  var bangNumber = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০'];
  let val="";

  let string = k.toString();
  var ar=string.split('');

  for(var i=0;i<ar.length;i++){
      let index = engNumber.indexOf(ar[i]);
      if (index !== -1) {
          val += bangNumber[index];
      }
  }

  return val;


}
var width = 100,
    perfData = window.performance.timing, // The PerformanceTiming interface represents timing-related performance information for the given page.
    EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
    time = parseInt((EstimatedTime/1000)%60)*100;

// Loadbar Animation
$(".loadbar").animate({
  width: width + "%"
}, time);

// Loadbar Glow Animation
$(".glow").animate({
  width: width + "%"
}, time);

// Percentage Increment Animation
var PercentageID = $("#precent"),
    start = 0,
    end = 100,
    durataion = time;
    animateValue(PercentageID, start, end, durataion,mymap);
    
function animateValue(id, start, end, duration,mymap) {
  
  var range = end - start,
      current = start,
      increment = end > start? 1 : -1,
      stepTime = Math.abs(Math.floor(duration / range)),
      obj = $(id);
    
  var timer = setInterval(function() {
    current += increment;
    $(obj).text(current + "%");
      //obj.innerHTML = current;
    if (current == end) {

      if(mymap != null ){
              mymap.invalidateSize();
      }
      clearInterval(timer);
    }
  }, stepTime);
}

// Fading Out Loadbar on Finised
setTimeout(function(){
  $('.preloader-wrap').fadeOut(300);
}, time);

</script>

  {{-- <script src="{{asset('js/index.min.js')}}"></script> --}}

</body>
</html> 