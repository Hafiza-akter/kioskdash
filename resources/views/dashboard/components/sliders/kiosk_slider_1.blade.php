<div class="carousel-item  {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_06_inundation">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
            
           <div class="loader2">
              @include('dashboard.components.sliders.common.slider_data')

          </div>

          <div style="height: 15vh;width:auto;margin-top:13%">
              {{-- <p class="heading_center">Ward-wise  Vulnerability Map</p> --}}
               <p class="heading_center_w">ডিজিটাল তথ্যসেবায় স্বাগতম</p>
          </div>


        <div class="mb-1" style="margin-top:10px;">
            <img src="{{ asset('images/banner.jpg') }}" style="height: auto;width:auto;border:1px solid black;border-radius: 8px;">
        </div>


        
            
        </div>
          {{-- @include('dashboard.components.sliders.common.slider_footer') --}}
      </div>
      
  </div>
</div>