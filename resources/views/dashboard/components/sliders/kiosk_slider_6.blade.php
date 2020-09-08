<div class="carousel-item  {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_06_inundation">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
            
               <div class="loader2">
                  @include('dashboard.components.sliders.common.slider_data')

              </div>

            <div class="titles_images">
               <h1>Ward-wise Union Vulnerability Map</h1>
            </div>

      <div style="position:fixed;top:8%; left:15%; bottom:0; right:0; width:70%; height:84%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;" >
        {{-- <img src="{{ asset('images/2.png') }}" height="100%" style="-webkit-box-shadow: -38px -25px 55px -45px rgba(0,0,0,1);
-moz-box-shadow: -38px -25px 55px -45px rgba(0,0,0,1);
box-shadow: -38px -25px 55px -45px rgba(0,0,0,1);"> --}}


        @if(isset($data['image']) && $data['image'] != null)
          <img src="{{ asset('images/slider/'.$data['image']) }}" height="100%" style="">
        @else 
          <img src="{{ asset('images/2.png') }}" height="100%" >
        @endif

      </div>


        
            
        </div>
          @include('dashboard.components.sliders.common.slider_footer')
      </div>
      
  </div>
</div>