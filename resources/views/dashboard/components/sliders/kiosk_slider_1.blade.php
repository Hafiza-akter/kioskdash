<div class="carousel-item  {{ $key == 0 ? 'active' : ''}}" data-interval="{{ $data['duration'] ? $data['duration'] * 1000 : 6000}}" id="kiosk_06_inundation">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" style="background: none;">
        <div class="card-body " style="margin:0px;padding:0px;height: 93%">
            
           <div class="loader2">
              @include('dashboard.components.sliders.common.slider_data')

          </div>
          <div style="height: 15vh;width:auto;margin-top:8%" class="mb-1">
              {{-- <p class="heading_center">Ward-wise  Vulnerability Map</p> --}}
              <p class="heading_center">
               সাপোর্টিং ফ্লাড ফোরকাস্ট বেইজড অ্যান্ড লার্নিং ইন বাংলাদেশ (সুফল) প্রজেক্ট
              </p>
               <p class="heading_center">ডিজিটাল তথ্যসেবায় স্বাগতম</p>
          </div>


        <div class="" style="margin:4%;">
            <img src="{{ asset('images/banner.jpg') }}" style="width:300px;border:1px solid black;border-radius: 8px;">
        </div>


        <div id="" style="color:white !important;width: 80%;margin:0 auto;">
            <span class="impo" style="color:white !important;font-size: 1.6rem;line-height: 1.4;">
                 <p><span style="color: rgb(33, 37, 41);">
                 প্রকল্পটি একো-র অর্থায়নে;
                  কেয়ার বাংলাদেশ, ইসলামিক রিলিফ বাংলাদেশ,কনসার্ন ওয়ার্ল্ডওয়াইড ও এসোড এর যৌথ উদ্যোগে এবং রাইমস-এর কারিগরি সহায়তায় বাস্তবায়িত হচ্ছে </span><br></p>
            </span>
            <div class="inline-block" style="height: 7vh;text-align: center;padding-top: 5px;padding-bottom: 10px;">
                <img src="{{asset('images/CARE.png')}}" style="height: 100%;">
                <img src="{{asset('images/Islamic Relief.png')}}" style="height: 100%;"> 
                <img src="{{asset('images/Concern.png')}}" style="height: 100%;">
                <img src="{{asset('images/ASOD.png')}}" style="height: 100%;">

                <img src="{{asset('images/logo_rimes_2.png')}}" style="height: 100%;">
                <img src="{{asset('images/European Union.png')}}" style="height: 100%;">
            </div>
        </div>

        
            
        </div>
          {{-- @include('dashboard.components.sliders.common.slider_footer') --}}
      </div>
      
  </div>
</div>