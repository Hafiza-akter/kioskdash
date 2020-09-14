<div class="carousel-item {{ $key == 0 ? 'active' : ''}} " data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_04_floodsummary">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
            
               <div class="loader2">
                  @include('dashboard.components.sliders.common.slider_data')
              </div>
              
            <div style="height: 6vh;width:auto;margin-top:1.8%">
               <p class="heading_center">News</p>
            </div>

            <div id="" >
                <iframe scrolling="no" frameBorder="0" src="https://service.prothomalo.com/commentary/" style=" box-shadow: 0 0 5px 1px lightgrey;height: 70vh;width: 70%;overflow: hidden;margin-top:1%;background: white;opacity: 0.8;">
                Your browser doesn't support iframes
                </iframe>
            </div>
                  
              </div>
              <div class="">

     
                  <iframe frameBorder="0" scrolling="no"  src="https://service.prothomalo.com/commentary/marquee/" style="height: 8vh;width: 100%;overflow: hidden;">
                  Your browser doesn't support iframes
                  </iframe>   
                  
              </div>
          @include('dashboard.components.sliders.common.slider_footer')
      </div>
      
  </div>
</div>