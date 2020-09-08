<div class="carousel-item {{ $key == 0 ? 'active' : ''}} " data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_3_iframe_weather">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
           
            <div class="titles">
               <h1>Weather Update of Upazila</h1>
            </div>


          <iframe src="https://bmd.bdservers.site/kiosk?P_CODE={{$data['pcode']}}" style="position:fixed;pointer-events: none;top:16%; left:15%; bottom:0; right:0; width:70%; height:70%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;">
            Your browser doesn't support iframes
          </iframe>


        </div>
          @include('dashboard.components.sliders.common.slider_footer')
      </div>
      
  </div>
</div>