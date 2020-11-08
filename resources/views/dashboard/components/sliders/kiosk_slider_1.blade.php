<div class="carousel-item {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_01_welcome" >
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="padding:0px;margin:0px;height: 93%;">
            <div class="d-flex justify-content-between bd-highlight mb-3">
              <div class="hero-banner-wrapper">
              <div class="loader2">
                
                @include('dashboard.components.sliders.common.slider_data')

              </div>

              <div style="height: 15vh;width:auto;margin-top:10%">
               {{-- <p class="heading_center_w">Welcome to our website</p> --}}
               <p class="heading_center_w">ডিজিটাল তথ্য বোর্ডে আপনাকে স্বাগতম</p>
              </div>

              <div id="carbonads">
                  <span>
                    <span class="carbon-wrap">
                    {{-- <a href="" class="carbon-img" target="_blank"> --}}
                      {{-- <img src="" alt=" via Carbon" border="0" style="max-width: 130px;"></a> --}}
                      <p  class="carbon-text" target="_blank" >
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer tooIt has survived not. industry. Lorem Ipsum has been the industry's standard dummy text ever industry. Lorem Ipsum has been the industry's standard dummy text ever 
                      </p>
                    </span>
              
              </div>
              </div>
            </div>

        </div>
          {{-- @include('dashboard.components.sliders.common.slider_footer') --}}
      </div>

  </div>
</div>