<div class="carousel-item {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_05_tendaysforcast">


  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
               <div class="loader2">
                  @include('dashboard.components.sliders.common.slider_data')

              </div>

               <div class="titles">
               <h1>10 days forecast</h1>
              </div>

          <iframe src="http://ffwc2.bdservers.site/ffwc_charts/index.php?stid={{ $data['station_id']}}" style="position:fixed;top:16%; left:15%; bottom:0; right:0; width:70%; height:69%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;">
            Your browser doesn't support iframes
          </iframe>
        </div>
          @include('dashboard.components.sliders.common.slider_footer')
      </div>
      
  </div>
</div>
