<div class="carousel-item {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_05_tendaysforcast">


  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
               <div class="loader2">
                  @include('dashboard.components.sliders.common.slider_data')

              </div>

            <div style="height: 6vh;width:auto;margin-top:1.8%">
               {{-- <p class="heading_center">10 days forecast</p> --}}
               {{-- <p class="heading_center">১০ দিনের বন্যার পূর্বাভাস</p> --}}
                              <p class="heading_center">{{ $data['description']}}</p>

              </div>
              {{-- http://www.ffwc.gov.bd/ffwc_charts/index.php?stid=93 --}}
          <iframe id="10-days-for" src="http://www.ffwc.gov.bd/medium_range/index.php?stid={{ $data['station_id']}}" style="pointer-events: none;width:80%; height:80vh; border:none; margin-top:10px; padding:0; overflow:hidden; z-index:999999;">
          Your browser doesn't support iframes
          </iframe>
        </div>
          {{-- @include('dashboard.components.sliders.common.slider_footer') --}}
      </div>
      
  </div>
</div>

