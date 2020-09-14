<div class="carousel-item {{ $key == 0 ? 'active' : ''}} " data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_3_iframe_weather">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
           
            <div style="height: 6vh;width:auto;margin-top:1.8%">
               <p class="heading_center">Weather Update of Upazila</p>
            </div>


          <iframe src="https://bmd.bdservers.site/kiosk?P_CODE={{$data['pcode']}}" style="pointer-events: none;width:85%; height:80vh; border:none; margin-top:10px; padding:0; overflow:hidden; z-index:999999;">
            Your browser doesn't support iframes
          </iframe>
        </div>
          @include('dashboard.components.sliders.common.slider_footer')
      </div>
      
  </div>
</div>