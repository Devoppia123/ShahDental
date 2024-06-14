 <div id="services-main" class="main-section">
     <div class="container-xxl overflow-hidden">
         <div class="services-txt-blk all-txt-blk">
             <div class="branch-heading">
                 <h2>Our Services</h2>
                 <p class="p-02">Dr. Shah Faisal & Associates takes pride in introducing its dynamic team of qualified
                     experienced & professionally<br>
                     competent Dental Surgeon supported by well-trained chair side assistants, lab technicians &
                     receptionist.</p>
             </div>
             <div class="rk-services-row row gx-3 g-5">
                 {{-- <div class="services-blocks"> --}}
                     {{-- @php $count = 0; @endphp --}}
                     @foreach ($specialities as $sp)
                    {{-- @if ($count % 4 == 0) --}}
                 {{-- </div> --}}
                 {{-- <div class="cus-di"> --}}
                     {{-- @endif --}}
                     <div class="rk-services-box-blk col-lg-3 col-md-6 col-sm-12 col-xs-12">
                         <div class="ser-img-box">
                             {{-- <img src="{{ url('public/images/Shah-Dental-card_1.png') }}" alt=""> --}}
                             <img src="{{ url("/public/service_image/$sp->image") }}" alt="">
                         </div>
                         <div class="ser-txt-box view-more">
                             <h3>{{ $sp->speciality }}</h3>
                             <a href="{{ url("/services_details/$sp->id") }}" class="team-view" style="color:#ffff"
                                 target="_blank">VIEW MORE</a>
                         </div>
                     </div>
                     {{-- @php $count++; @endphp --}}
                     @endforeach
                 {{-- </div> --}}
             </div>
             <div class="rk-btn-more view-more">
                 <a class="team-view" href="{{ url('/all-services') }}">LOAD MORE</a>
             </div>
         </div>
     </div>
 </div>
