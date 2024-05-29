<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    {{-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ url('public/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title', 'Shah Dental Clinic')</title>
    @yield('customCSS')
</head>
<body>
    
    @yield('header-main')
    
    @yield('content')

    @yield('appointment-main')
  
    @yield('branches-main')
    
    @yield('team-main')
   
    @yield('services-main')
   
    @yield('patient-main')
    
    @yield('record-main')
    
    @yield('customer-main')
  
    @yield('article-main')
   
    @yield('footer-main')

    <script>
        let currentIndex = 0;
    
        function proshowSlide(index) {
          const slider = document.querySelector('.product-slider');
          const slideWidth = document.querySelector('.product-item').offsetWidth; // Adjusted for one item
          currentIndex = index;
          const transformValue = -index * slideWidth + 'px';
          slider.style.transform = 'translateX(' + transformValue + ')';
        }
    
        function prevSlide() {
          currentIndex = (currentIndex - 1 + 1) % 3; // 1 is the total number of slides
          proshowSlide(currentIndex);
        }
    
        function nextSlide() {
          currentIndex = (currentIndex + 1) % 3; // 1 is the total number of slides
          proshowSlide(currentIndex);
        }
    </script>

    @yield('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>