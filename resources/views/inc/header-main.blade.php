<style>
  /* add wrp class yasir */
.announcmnt-wrap {
    font-size: 24px;
}
</style>

<div id="header-main" class="main-section">
  <div class="container-xxl">  
    <div class="header-txt-blk all-txt-blk">
        <div class="top-header">
          {{-- <div class="top-cell-us col-md-8 top-r"> --}}
          <div class="top-r">
              <div class="address">

                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <div class="top-image-box call-us"><span>
                      <img src="{{ url('public/images/Shah-Dental_03.png') }}" alt="03">
                      <span class="call-bold"><a href="tel:02134963440">02134963440</a></span>
                      </span>          
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <p>Gulshan-e-Iqbal: <a href="tel:02134963440">021-34963440</a></p>
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <p>Bahadurabad Branch: <a href="tel:03341326378">03341326378</a></p>
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <p>DHA Branch: <a href="tel:02135243482">021-35243482</a></p>
                  </div>
                </div>                        
              </div>
          </div>
        </div>

      <div class="mian-nav">
        <nav class="navbar navbar-expand-xl navbar-light">
          <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('public/images/logo_03.png') }}" alt="" class="d-inline-block align-text-top cus-logo"></a>
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
        </div>


      <div class="home-banner-content">
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

         {{-- add marquee yasir --}}
         <div class="announcmnt-wrap">
          <div class="container">
            {{-- <strong>Announcement</strong> --}}
            <marquee direction="left" onmouseout="start()" onmouseover="stop()">
                       Stay home and stay safe in this rainy season we are available online for any dental emergency.
                       Dental clinics reopened with all SOPs. 
              
            </marquee>
          </div>
        </div>
        </div>          
      </div>        
    </div>
  </div>
</div>
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-inner-left">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ url('public/images/banner-image_01.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption carousel-content container-xxl">
          <div class="carousel-left">
            <h5>1-Welcome To Shah Dental</h5>
            <h1>We Are Creating Natural Beauty With Extraordinary Smiles</h1>
            <p>Greetings and welcome to Shah Dental Clinic (Prof. Syed Shah
              Faisal & Associates). We are proud to serve the people of Karachi since 1998.</p>
              <a class="get-start" href="{{ url('/make-an-appointment') }}">Get Started <img class="cus-img"
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
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{ url('/public/images/banner-image_02.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption carousel-content container-xxl">
          <div class="carousel-left">
            <h5>2-Welcome To Shah Dental</h5>
            <h1>We Are Creating Natural Beauty With Extraordinary Smiles</h1>
            <p>Greetings and welcome to Shah Dental Clinic (Prof. Syed Shah
              Faisal & Associates). We are proud to serve the people of Karachi since 1998.</p>
              <a class="get-start" href="{{ url('/make-an-appointment') }}">Get Started <img class="cus-img"
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
  {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> --}}
</div>
