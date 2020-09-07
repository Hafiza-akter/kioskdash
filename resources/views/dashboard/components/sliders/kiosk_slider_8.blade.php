<div class="carousel-item  {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_08_impactbased">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
            
               <div class="loader2">
                @include('dashboard.components.sliders.common.slider_data')

              </div>
              
            <div class="titles_images">
               <h1>Impact based forecasting Map</h1>
            </div>

            <div style="position:fixed;top:9%; left:10%; bottom:0; right:0; width:80%; height:84%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;background:white;" >
              

              @if($data['image'])

                <img src="{{ asset('images/slider/'.$data['image']) }}"  height="100%" style="float: left;margin-left: 10%;">

              @else 
                <img src="{{ asset('images/1-s2.0-S2212094714000826-gr4.jpg') }}"  height="100%" style="float: left;margin-left: 10%;">

              @endif
              <div style="position: absolute;top: 0%;right:0%;background: #00000040;height: 100%;width:32%; border: 4px solid black;">
                 <p class="" style="
    background: #272727b5;
    height: 100%;
    font-weight: bold;
    color: white;
    line-height: 1.4;
">
                <br> 
<span style="font-size: 2rem;border: 1px solid;padding: 7px;margin-top: 5px;text-align: center;">Forcasting info </span> <br><br>
                      <span style="font-size: 1.4rem;text-align:left !important;">
                        {!! $data['image_description'] ? $data['image_description'] : ''!!}
                      </span> 
                      </p>
              </div>
            </div>
                  
              </div>
          @include('dashboard.components.sliders.common.slider_footer')
      </div>
      
  </div>
</div>