<div class="carousel-item {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_12_youtube">


  <div class="d-flex align-items-center justify-content-center">

    <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
      <div class="card-body " style="margin:0px;padding:0px;height: 93%">
        <div class="loader2">
          @include('dashboard.components.sliders.common.slider_data')

        </div>

        <div style="height: 6vh;width:auto;margin-top:1.8%;margin-bottom:10px;">
          {{-- <p class="heading_center">5 days forecast</p> --}}
          {{-- <p class="heading_center">Youtube Video</p> --}}
                         <p class="heading_center">{{ $data['description']}}</p>

        </div>
        <div class="mb-1" style="margin-top:10px;">
          @if($data['you_tube_url'] != null)
          <iframe id="youtubeiframe" style="width:80%; height:80vh; border:none; margin-top:10px; padding:0;" src="{{ $data['you_tube_url'] }}">
          </iframe>
          @endif
          <!-- <iframe id="youtubeiframe" style="width:80%; height:80vh; border:none; margin-top:10px; padding:0;" src="https://www.youtube.com/embed/E7z9h2oKrRs">
          </iframe> -->
        </div>


        {{-- http://www.ffwc.gov.bd/ffwc_charts/index.php?stid=93 --}}
       
      </div>
      {{-- @include('dashboard.components.sliders.common.slider_footer') --}}
    </div>

  </div>
</div>