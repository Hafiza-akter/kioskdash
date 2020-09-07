
<div class="carousel-item {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_10_localuse">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;" >
        <div class="card-body " style="padding:0px;margin:0px;height: 93%;">
            <div class="d-flex justify-content-between bd-highlight mb-3">
              <div class="hero-banner-wrapper">
              <div class="loader2">
                
                @include('dashboard.components.sliders.common.slider_data')

              </div>

              <div class="titles_images">
               <h1>local user messages</h1>
              </div>

             {{--  <div id="carbonads" style="background: rgba(0,123,255,.25) !important">
                  <span>
                    <span class="carbon-wrap">
                   <p  class="carbon-text" style="font-weight: bolder;color: #000 !important;" >
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer tooIt has survived not. 
                      </p>
                    </span>
              
              </div>
 --}}

              <div style="position:fixed;top:10%; left:5%; bottom:0; right:0; width:90%; height:80%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;" >
              
              @if($user['user_slide_image'])
              <img src="{{ asset('images/'.$user['user_slide_image']) }}" width="100%" style="">
              @else 
              <img src="{{ asset('images/local.jpg') }}" width="100%" style="">
              @endif

              <div style="position: absolute;bottom: 0%;background: #00000040;">
                
                
                 <p  class="carbon-text" style="
    background: #272727b5;
    padding: 10px;
    text-align: center;
    border: 4px solid black;
    vertical-align: -webkit-baseline-middle;
" > 
              @if($user['user_slide_description'])
                        {!! $user['user_slide_description']!!}
              @else 
                        No user messages are set from dashboard.
              @endif

                </p>

              </div>
            </div>

              </div>
            </div>

        </div>
          @include('dashboard.components.sliders.common.slider_footer')
      </div>

  </div>
</div>


