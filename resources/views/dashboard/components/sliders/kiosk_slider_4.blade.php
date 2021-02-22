<div class="carousel-item {{ $key == 0 ? 'active' : ''}} " data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_04_floodsummary">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
            
               <div class="loader2">
                  @include('dashboard.components.sliders.common.slider_data')
              </div>
              
           <div style="height: 6vh;width:auto;margin-top:1.8%">
               {{-- <p class="heading_center">Flood summery</p> --}}
               {{-- <p class="heading_center">বন্যা প্রতিবেদন</p> --}}
                              <p class="heading_center">{{ $data['description']}}</p>

            </div>

         

            @if($data['image'] == null && $data['image_description'] != null)
                <div id="carbonads" style="margin-top:8% !important;color:white !important;">
                  <span class="impo" style="color:white !important;font-size: 1.5rem;line-height: 1.1;">
                       {!! $data['image_description']!!}
                  </span>
                </div>
              @endif


              @if($data['image'] != null && $data['image_description'] == null)

              <div class="mb-1" >
                    <img src="{{ asset('images/slider/'.$data['image']) }}" style="height: 80vh" >                    
              </div>
              @endif

              @if($data['image'] != null && $data['image_description'] != null)
               

                <div class="mb-1" >
                      <img src="{{ asset('images/slider/'.$data['image']) }}" style="height: 65vh" >                    
                </div>

                <div style="border:none; margin:0; padding:0; overflow:hidden; z-index:999999;height: 16vh;width:80%;margin-left:10%;border: 4px solid black;color:#ffffff !important;" >
                   <p  class="display-text" style="background: #272727b5;padding: 10px;text-align: center;vertical-align: -webkit-baseline-middle; z-index:999999;" > 
                      {!! $data['image_description']!!}
                  </p>
                </div>                
              @endif


                  
              </div>
          {{-- @include('dashboard.components.sliders.common.slider_footer') --}}
      </div>
      
  </div>
</div>
<style type="text/css">
  .impo p{
    color:white !important;
  }
  .impo p span{
    color:white !important;
  }
</style>