<div id="branches-main" class="main-section">
    <div class="container">
        <div class="branches-txt-blk all-txt-blk">
            <div class="branch-heading">
                <h2>Our Branches</h2>
                <p>Online to know about our locations and ease yourself in finding us wherever you are</p>
            </div>
            <div class="address-detail clinic-details">
                <div class="dental-block clinic-list">
                    <div class="clinic-img-box" data-clinic="shah-dental-clinic">
                        <div class="clinic-img-01">
                            <img src="{{ url('public/images/Shah-Dental5_17.png') }}" alt="">
                        </div>
                        <div class="clinic-txt-01">
                            <h3>Shah Dental Clinic</h3>
                            <p>Gulshan-e-Iqbal, Karachi.</p>
                        </div>
                    </div>
                    <div class="clinic-img-box" data-clinic="dental-art-clinic">
                        <div class="clinic-img-01">
                            <img src="{{ url('public/images/Shah-Dental5_20.png') }}" alt="">
                        </div>
                        <div class="clinic-txt-01">
                            <h3>Dental Art Clinic</h3>
                            <p>Phase 6, DHA, Karachi</p>
                        </div>
                    </div>
                    <div class="clinic-img-box" data-clinic="prof-syed-shah-faisal">
                        <div class="clinic-img-01">
                            <img src="{{ url('public/images/Shah-Dental5_26.png') }}" alt="">
                        </div>
                        <div class="clinic-txt-01">
                            <h3>Prof. Syed Shah Faisal <br>And Associates</h3>
                            <p> Bahadurabad, Karachi.</p>
                        </div>
                    </div>
                    <div class="clinic-img-box" data-clinic="shah-dental-clinic">
                        <div class="clinic-img-01">
                            <img src="{{ url('public/images/Shah-Dental5_32.png') }}" alt="">
                        </div>
                        <div class="clinic-txt-01">
                            <h3>Shah Dental Clinic</h3>
                            <p>Gulshan-e-Iqbal, Karachi.</p>
                        </div>
                    </div>
                </div>
                <div class="clinic-address" id="clinic-details">
                    <img class="botted-img" src="{{ url('public/images/Shah-Dental6_03.png') }}" alt="">
                    <h3 id="shah-dental-clinic">Shah Dental Clinic:</h3>
                    <div class="address-icon-blk">
                        <img src="{{ url('public/images/Shah-Dental5_22.png') }}" alt="">
                        <p><a
                                href="{{ url('/branch-directions') }}?location=Saima+Heaven,+Opp.+New+Dhora+Jee+Colony,+Block-4+Shah+Dental+Clinic+Gulshan-e-Iqbal+Karachi">Saima
                                Heaven, Opp. New Dhora Jee Colony, Block-4, Gulshan-e-Iqbal,
                                Karachi.</a></p>
                    </div>
                    <div class="address-icon-blk botted-border">
                        <img src="{{ url('public/images/Shah-Dental5_28.png') }}" alt="">
                        {{-- <p><a href="#">Tel: 021-34963440, 03323582940</a></p> --}}
                        <p><a href="tel:021-34963440">Tel: 021-34963440</a></p>
                    </div>
                    <div class="address-icon-blk">
                        <img src="{{ url('public/images/Shah-Dental5_34.png') }}" alt="">
                        <p>
                            {{-- <a href="#">Email : drsyedshah@hotmail.com</a> --}}
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=drsyedshah@hotmail.com"
                                target="_blank">
                                Email : drsyedshah@hotmail.com
                            </a>
                        </p>

                    </div>
                    <div class="map-img-box">
                        <div class="map-img-01">
                            <img src="{{ url('public/images/Shah-Dental5_38.png') }}" alt="">
                        </div>
                        <div class="map-txt-01">
                            <h3> Click Here
                                <a href="{{ url('/branch-directions') }}?location=Shah+Dental+Clinic+Gulshan-e-Iqbal+Karachi"
                                    class="custom-link">
                                    to see map and Directions
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

{{-- add this javascript doctor details in click event --}}
{{-- update script yasir add click p tages and show location on branch directions page 30-05-2024 --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const clinicDetails = {
            'shah-dental-clinic': `
          <img class="botted-img" src="{{ url('public/images/Shah-Dental6_03.png') }}" alt="">
          <h3>Shah Dental Clinic:</h3>
          <div class="address-icon-blk">
              <img src="{{ url('public/images/Shah-Dental5_22.png') }}" alt="">
              <p><a href="{{ url('/branch-directions') }}?location=Saima+Heaven,+Opp.+New+Dhora+Jee+Colony,+Block-4+Shah+Dental+Clinic+Gulshan-e-Iqbal+Karachi">Saima Heaven, Opp. New Dhora Jee Colony, Block-4, Gulshan-e-Iqbal, Karachi.</a></p>
          </div>
          <div class="address-icon-blk botted-border">
              <img src="{{ url('public/images/Shah-Dental5_28.png') }}" alt="">
              <p><a href="tel:021-34963440">Tel: 021-34963440</a></p>

          </div>
          <div class="address-icon-blk">
              <img src="{{ url('public/images/Shah-Dental5_34.png') }}" alt="">
              <p>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=drsyedshah@hotmail.com" target="_blank">
                 Email : drsyedshah@hotmail.com</a></p>
            </p>
          </div>
          <div class="map-img-box">
              <div class="map-img-01">
                  <img src="{{ url('public/images/Shah-Dental5_38.png') }}" alt="">
              </div>
              <div class="map-txt-01">
                    <h3>Click Here
                        <a href="{{ url('/branch-directions') }}?location=Shah+Dental+Clinic+Gulshan-e-Iqbal+Karachi" class="custom-link">
                            to see map and Directions
                        </a>
                    </h3>
              </div>
          </div>
      `,
            'dental-art-clinic': `
         <img class="botted-img" src="{{ url('public/images/Shah-Dental6_03.png') }}" alt="">
          <h3>Dental Art Clinic:</h3>
          <div class="address-icon-blk">
              <img src="{{ url('public/images/Shah-Dental5_22.png') }}" alt="">
              <p><a href="{{ url('/branch-directions') }}?location=Dental+Art+Clinic+Phase+6+DHA+Karachi">Phase 6, DHA, Karachi.</a></p>
          </div>
          <div class="address-icon-blk botted-border">
              <img src="{{ url('public/images/Shah-Dental5_28.png') }}" alt="">
                <p><a href="tel:021-35243482">Tel: 021-35243482</a></p>
          </div>
          <div class="address-icon-blk">
              <img src="{{ url('public/images/Shah-Dental5_34.png') }}" alt="">
              <p>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=dentalartclinic@hotmail.com" target="_blank">
                 Email : dentalartclinic@hotmail.com</a>
                </p>
          </div>
          <div class="map-img-box">
              <div class="map-img-01">
                  <img src="{{ url('public/images/Shah-Dental5_38.png') }}" alt="">
              </div>
              <div class="map-txt-02">
                <h3>Click Here to 
                    <a href="{{ url('/branch-directions') }}?location=Dental+Art+Clinic+Phase+6+DHA+Karachi" class="custom-link">
                        see map and Directions
                    </a>
                </h3>
              </div>
          </div>
      `,
            'prof-syed-shah-faisal': `
      <img class="botted-img" src="{{ url('public/images/Shah-Dental6_03.png') }}" alt="">
          <h3>Prof Syed Shah Faisal:</h3>
          <div class="address-icon-blk">
              <img src="{{ url('public/images/Shah-Dental5_22.png') }}" alt="">
              <p><a href="{{ url('/branch-directions') }}?location=Prof+Syed+Shah+Faisal+Bahadurabad+Karachi">Bahadurabad, Karachi.</a></p>
          </div>
          <div class="address-icon-blk botted-border">
              <img src="{{ url('public/images/Shah-Dental5_28.png') }}" alt="">
                <p><a href="tel:03341326378">Tel: 03341326378</a></p>
          </div>
          <div class="address-icon-blk">
              <img src="{{ url('public/images/Shah-Dental5_34.png') }}" alt="">
              <p>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=SyedShahfaisal@hotmail.com" target="_blank"> Email : SyedShahfaisal@hotmail.com </a>
              </p>
          </div>
          <div class="map-img-box">
              <div class="map-img-01">
                  <img src="{{ url('public/images/Shah-Dental5_38.png') }}" alt="">
              </div>
              <div class="map-txt-03">
                <h3>Click Here to 
                    <a href="{{ url('/branch-directions') }}?location=Prof+Syed+Shah+Faisal+Bahadurabad+Karachi" class="custom-link">
                        see map and Directions
                    </a>
                </h3>
              </div>
          </div>
      `
        };

        document.querySelectorAll('.clinic-img-box').forEach(function(box) {
            box.addEventListener('click', function() {
                const clinic = box.getAttribute('data-clinic');
                document.getElementById('clinic-details').innerHTML = clinicDetails[clinic];
            });
        });
    });
</script>
