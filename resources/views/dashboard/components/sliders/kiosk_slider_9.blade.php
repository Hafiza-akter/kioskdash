<div class="carousel-item {{ $key == 0 ? 'active' : ''}} " data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_04_floodsummary">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
            
               <div class="loader2">
                  @include('dashboard.components.sliders.common.slider_data')
              </div>
              
            <div class="titles">
               <h1>News</h1>
            </div>

            <div id="carbonads" style="top:28% !important;">
                  <span>
                    <span class="" style="color:white;">
                    {{-- <a href="" class="carbon-img" target="_blank"> --}}
                      {{-- <img src="" alt=" via Carbon" border="0" style="max-width: 130px;"></a> --}}
                      All News list <br> 
                      All News list <br> 
                      All News list <br> 
                      All News list  
                    </span>
              
            </div>


                  
              </div>
              <div class="sl-foo">
                 <marquee behavior="scroll" direction="left" scrollamount="5" style="width:100%; vertical-align:middle; cursor:pointer;" onmouseover="javascript:this.setAttribute('scrollamount','0');" onmouseout="javascript:this.setAttribute('scrollamount','5');">
                    Local news | Local news | Local news | Local news | 
                  </marquee>              </div>
          @include('dashboard.components.sliders.common.slider_footer')
      </div>
      
  </div>
</div>