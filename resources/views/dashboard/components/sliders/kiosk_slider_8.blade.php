<div class="carousel-item  {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_08_impactbased">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
            
               <div class="loader2">
                @include('dashboard.components.sliders.common.slider_data')

              </div>
              
            <div style="height: 6vh;width:auto;margin-top:1.8%">
               {{-- <p class="heading_center">Impact based forecasting Map</p> --}}
               <p class="heading_center">প্রভাব ভিত্তিক পূর্বাভাস মানচিত্র</p>
            </div>

            <div style="width: 80%;height:81vh;border:none;overflow:hidden;z-index:999999;background:white;display: flex;flex-wrap:wrap;align-content: space-between;margin-left:10%;margin-top:10px;" >

              <div style="width:70%;">

                @if($data['image'])

                <img src="{{ asset('images/slider/'.$data['image']) }}" style="height: 82vh;width:auto;">

                @else 

                 <img src="{{ asset('images/1-s2.0-S2212094714000826-gr4.jpg') }}" style="height: 82vh;width:auto;">

                @endif


              </div>

              <div style="width:30%;background: #00000040;border: 4px solid black;">

                  <div class="" style="background: #272727b5;height: 100%;font-weight: bold;color: white;line-height: 1.4;border:1px solid #272727b5">
                    <br> 

                  <span style="font-size: 2rem;border: 1px solid;padding: 7px;margin-top: 5px;text-align: center;">Forcasting info </span> <br><br>
                      <span style="font-size: 1.4rem;text-align:center; !important;">
                        {!! $data['image_description'] ? $data['image_description'] : ''!!}
                      </span> 
                    </div>
              </div>
            </div>
                  
              </div>
          {{-- @include('dashboard.components.sliders.common.slider_footer') --}}
      </div>
      
  </div>
</div>