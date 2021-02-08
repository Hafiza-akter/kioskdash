
<div class="carousel-item {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_10_localuse">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;" >
        <div class="card-body " style="padding:0px;margin:0px;height: 93%;">

            <div class=" ">
              <div class="">


              
                <div style="height: 6vh;margin-top:1.8%;margin-bottom:10px;">
                   {{-- <p class="heading_center">local user messages</p> --}}
                   <p class="heading_center">স্থানীয় গুরুত্বপূর্ণ বার্তা</p>
                </div>

              @if($user['user_slide_image'] == null && $user['user_slide_description'] != null)
                <div id="carbonads" style="top:28% !important;">
                    <span>
                      <span class="" style="color:white;font-size: 1.5rem;line-height: 1.1;">
                           {!! $user['user_slide_description']!!}
                      </span>
                </div>
              @endif



              @if($user['user_slide_image'] != null && $user['user_slide_description'] == null)

                <div class="mb-1" >
                      <img src="{{ asset('images/'.$user['user_slide_image']) }}" style="height: 80vh" >                    
                </div>
              @endif

              @if($user['user_slide_image'] != null && $user['user_slide_description'] != null)
               

                <div class="mb-1" >
                      <img src="{{ asset('images/'.$user['user_slide_image']) }}" style="height: 65vh" >                    
                </div>

                <div style="border:none; margin:0; padding:0; overflow:hidden; z-index:999999;height: 16vh;width:80%;margin-left:10%;border: 4px solid black;" >
                   <p  class="display-text" style="background: #272727b5;padding: 10px;text-align: center;vertical-align: -webkit-baseline-middle; z-index:999999;" > 
                      {!! $user['user_slide_description']!!}
                  </p>
                </div>                
              @endif

              </div>
            </div>

        </div>
          {{-- @include('dashboard.components.sliders.common.slider_footer') --}}
      </div>

  </div>
</div>


