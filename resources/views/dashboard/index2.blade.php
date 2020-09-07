<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



<link rel="stylesheet" type="text/css" href="{{asset('css/rain_master_normalize.css')}}" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{asset('css/rain_master_demo.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/rain_master_style1.css')}}" />


 <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}" >
  {{-- <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"> --}}

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

  <style>
/*  .carousel-inner img {
    width: 100%;
    height: 100%;
  }*/
  body{
    /*color:white !important;*/
  }
.card-header{
  background-color: #563d7c;
  color:white;
  /*box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .05), inset 0 -1px 0 rgba(0, 0, 0, .1);*/

}
.card-footer{
  background-color: #563d7c;z-index: 1422;
  border:none !important;
  /*box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .05), inset 0 -1px 0 rgba(0, 0, 0, .1);*/

}
.carousel-control-next,
.carousel-control-prev {
    filter: invert(100%);
}
.sl-title{
  position: absolute;
    top: 0;
    left: 25%;
    font-size: 31px;
    background: #343a408a;
    color: white;
    font-weight: bolder;
    width: 50%;
    z-index: 1245;
}
.sl-content{
position: absolute;
    right: -1%;
    width: 20%;
    top: 10%;
    z-index: 1234;
    height: 50vh;
    background: #563e7b8c;
    border: 5px solid #563e7b;
    border-radius: 5px;
    color: white;
}
.sl-foo{
  position: absolute;
    bottom: 14px;
    left: 0px;
    width: 100%;
    z-index: 1234;
   background-color: #563d7c;
    color: white;
    font-size: 1.4rem;
}
video {
  object-fit: cover;
  width: 100vw;
  height: 93vh;
  position: fixed;
  top: 0;
  left: 0;

}


  </style>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
</head>
<body class="">

  <div class="demo-1" style="position: fixed;top: 0;">
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
        <!-- Heavy Rain -->
        
        <!-- Drizzle -->
        <div class="slide" id="slide-2" data-weather="drizzle">
          <div class="slide__element slide__element--date">Saturday, 25<sup>th</sup> of October 2043</div>
          <div class="slide__element slide__element--temp">18°<small>C</small></div>
        </div>
        <!-- Sunny -->
        
        <!-- Heavy rain -->
        
        <!-- Fallout (greenish overlay with slightly greenish/yellowish drops) -->
      
        <nav class="slideshow__nav">
          <a class="nav-item" href="#slide-1"><i class="icon icon--rainy"></i><span>10/24</span></a>
          <a class="nav-item" href="#slide-2"><i class="icon icon--drizzle"></i><span>10/25</span></a>
          <a class="nav-item" href="#slide-3"><i class="icon icon--sun"></i><span>10/26</span></a>
          <a class="nav-item" href="#slide-5"><i class="icon icon--storm"></i><span>10/28</span></a>
          <a class="nav-item" href="#slide-4"><i class="icon icon--radioactive"></i><span>10/27</span></a>
        </nav>
      </div>
      <p class="nosupport">Sorry, but your browser does not support WebGL!</p>
    </div>
  </div>


<div class="container-fluid px-0"> <!-- data-interval="true" data-pause="hover"-->
    <div id="carouselExampleControls" class="carousel slide"    data-ride="carousel">
    {{-- <div id="carouselExampleControls" class="carousel slide"  data-interval="false"  data-ride="carousel"> --}}
        <div class="carousel-inner bg-info" role="listbox">
          {{-- @include('dashboard.components.sliders.kiosk_01_welcome') --}}
          @include('dashboard.components.sliders.kiosk_02_union')
          @include('dashboard.components.sliders.kiosk_03_iframe_weather')
          @include('dashboard.components.sliders.kiosk_04_floodsummary')
          @include('dashboard.components.sliders.kiosk_05_tendaysforcast')
          @include('dashboard.components.sliders.kiosk_06_inundation')
          @include('dashboard.components.sliders.kiosk_07_vulnerability')
          @include('dashboard.components.sliders.kiosk_08_impactbased')
          @include('dashboard.components.sliders.kiosk_09_news')
          @include('dashboard.components.sliders.kiosk_10_localuse')
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    {{-- <div class="card-footer text-muted" style="height:auto;padding: 0px;margin:0px;">
  Project Name, Consortium partners, tagline etc.
  <span style="float:left;">(duration : 7000ms)</span>
</div>
 --}}


</div>

  <script src="{{asset('js/index.min.js')}}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html> 