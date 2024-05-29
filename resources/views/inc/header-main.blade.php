<div id="header-main" class="main-section">
  <div class="cus-container">  
    <div class="header-txt-blk all-txt-blk">
        <div class="top-header row">
          <div class="empty-blk-01 col-md-2">
          </div>
          {{-- <div class="top-cell-us col-md-8 top-r"> --}}
          <div class="col-md-12 col-sm-12 top-r">
              <div class="top-image-box call-us"><span>
                  <img src="{{ url('public/images/Shah-Dental_03.png') }}" alt="03">
                  : <a href="Gulshan-e-Iqbal Branch-021-34963440"> <span class="call-bold">Call Us</span></a>
                  </span>
                  
              </div>
              <div class="top-txt-box address">
                  <p>Gulshan-e-Iqbal Branch-021-34963440</p>
                  <p>Bahadurabad-03341326378</p>
                  <p>DHA Branch-021-35243482 </p>
              </div>
          </div>
        </div>

        
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('public/images/logo_03.png') }}" alt="" width="248" height="74" class="d-inline-block align-text-top"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end"" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/our-mission') }}">Our Mission</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/message') }}">Message</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/highlights') }}">Highlights</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/all-articles') }}">Articles</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/gallery') }}">Gallery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/services-treatments') }}">Services/Treatments</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact-us') }}">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-btn-01" href="{{ url('/make-an-appointment') }}">MAKE AN APPOINTMENT</a>
                  </li>
          
                </ul>
              </div>
          </nav>





        {{-- Display Success and Fail Status --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div id="banner-block-01">
            <div class="banner-txt-blk">
                <p class="p-01">Welcome To Shah Dental</p>
                <h1>We Are <strong>Creating <br>Natural Beauty</strong> With <br> Extraordinary <span
                        class="color-01"><strong>Smiles</strong></span></h1>
                <p>Greetings and welcome to Shah Dental Clinic (Prof. Syed Shah<br>
                    Faisal & Associates). We are proud to serve the people of<br>
                    Karachi since 1998. </p>
                <a href="{{ url('/make-an-appointment') }}">Get Started <img class="cus-img"
                        src="{{ url('public/images/Shah-Dental_10.jpg') }}" alt=""></a>
            </div>
            <div class="follow-main">
                <p>Follow Us</p><br>
                {{-- <img src="{{ asset('images/Shah-Dental-0_03.png') }}" alt=""><br><br> --}}
                <img src="{{ url('public/images/Shah-Dental-0_03.png') }}" alt=""><br><br>
                <a href="https://www.facebook.com/Shah-Dental-Clinic-884470434977957">
                    {{-- <img src="{{ asset('images/Shah-Dental-0_07.png') }}" alt=""> --}}
                    <img src="{{ url('public/images/Shah-Dental-0_07.png') }}" alt="">
                </a><br>
                <a href="https://www.instagram.com/dentalartclinicc/">
                    {{-- <img src="{{ asset('images/Shah-Dental-0_10.png') }}" alt=""> --}}
                    <img src="{{ url('public/images/Shah-Dental-0_10.png') }}" alt="">
                </a><br>
                <a href="https://twitter.com/SYEDSHA07606672">
                    {{-- <img src="{{ asset('images/Shah-Dental-0_12.png') }}" alt=""> --}}
                    <img src="{{ url('public/images/Shah-Dental-0_12.png') }}" alt="">
                </a>

            </div>
        </div>          
    </div>
  </div>
</div>
