
<div class="@php
    $path = request()->path();
    switch ($path) {
        case 'our-mission':
            echo 'our-mission';
            break;
        case 'message':
            echo 'message';
            break;
        case 'highlights':
            echo 'highlights';
            break;
        case 'all-articles':
            echo 'all-articles';
            break;
        case 'gallery':
            echo 'gallery';
            break;
        case 'services-treatments':
            echo 'services-treatments';
            break;
        case 'contact-us':
            echo 'contact-us';
            break;
        case 'make-an-appointment':
            echo 'make-an-appointment';
            break;
        default:
            echo 'callback';
            break;
    }
@endphp" id="header-inner">
  <div class="container">
      <div class="header-txt-blk all-txt-blk">
          <div class="top-header row">
              <div class="empty-blk-01 col-md-2"></div>
              <div class="col-md-12 col-sm-12 top-r">
                  <div class="top-image-box call-us">
                      <span>
                          <img src="{{ url('public/images/Shah-Dental_03.png') }}" alt="03">
                          : <a href="Gulshan-e-Iqbal Branch-021-34963440">
                              <span class="call-bold"></span></a>
                      </span>
                  </div>
                  <div class="top-txt-box address">
                      <p>Gulshan-e-Iqbal Branch-021-34963440</p>
                      <p>Bahadurabad-03341326378</p>
                      <p>DHA Branch-021-35243482</p>
                  </div>
              </div>
          </div>

          <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ url('public/images/logo_03.png') }}" alt="" class="d-inline-block align-text-top cus-logo">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                  <ul class="navbar-nav">
                      <li class="nav-item"><a class="nav-link" href="{{ url('/our-mission') }}">Our Mission</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('/message') }}">Message</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('/highlights') }}">Highlights</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('/all-articles') }}">Articles</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('/gallery') }}">Gallery</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('/services-treatments') }}">Services/Treatments</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ url('/contact-us') }}">Contact</a></li>
                      <li class="nav-item"><a class="nav-link nav-btn-01" href="{{ url('/make-an-appointment') }}">MAKE AN APPOINTMENT</a></li>
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

          <div id="banner-block-01 row">
              <div class="inner-heading">
                  <h1>
                      <strong>
                          @php
                              $path = request()->path();
                              switch ($path) {
                                  case 'our-mission':
                                      echo 'Our Mission';
                                      break;
                                  case 'message':
                                      echo 'Message';
                                      break;
                                  case 'highlights':
                                      echo 'Highlights';
                                      break;
                                  case 'all-articles':
                                      echo 'Articles';
                                      break;
                                  case 'gallery':
                                      echo 'Gallery';
                                      break;
                                  case 'services-treatments':
                                      echo 'Services/Treatments';
                                      break;
                                  case 'contact-us':
                                      echo 'Contact Us';
                                      break;
                                  case 'make-an-appointment':
                                      echo 'Make an Appointment';
                                      break;
                                  default:
                                      echo 'Call Back';
                                      break;
                              }
                          @endphp
                      </strong>
                  </h1>
              </div>
          </div>
      </div>
  </div>
</div>
