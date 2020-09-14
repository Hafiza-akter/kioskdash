<div class="carousel-item {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_02_union">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
          <div style="height: 6vh;width:auto;margin-top:1.8%">
                 <p class="heading_center">Location Map</p>
              
          </div>

          <div class="card-body " id="mapid" style="margin-top:10px;height: 80vh;width: 60%;margin-left: 20%;">   
          </div>

        </div>

         @include('dashboard.components.sliders.common.slider_footer')

      </div>
  </div>
</div>
<input type="hidden" id="pcode" value="{{$data['pcode']}}">
