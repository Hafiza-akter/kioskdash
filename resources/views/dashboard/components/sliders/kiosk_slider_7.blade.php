<div class="carousel-item  {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_07_vulnerability">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
            
           <div class="loader2">
              @include('dashboard.components.sliders.common.slider_data')
          </div>
              
          <div style="height: 6vh;width:auto;margin-top:1.8%">
             {{-- <p class="heading_center">Inundation Map (developed by RIMES)</p> --}}
             <p class="heading_center">জলের গতিপথের মানচিত্র</p>
          </div>

        <div class="mb-1" style="margin-top:10px;">

          @if(isset($data['image']) && $data['image'] != null)
            <img src="{{ asset('images/slider/'.$data['image']) }}" style="height: 81vh;width:auto;">
          @else 
            <img src="{{ asset('images/2.png') }}" style="height: 81vh;width:auto;">
          @endif

        </div>
                  
              </div>
          {{-- @include('dashboard.components.sliders.common.slider_footer') --}}
      </div>
      
  </div>
</div>