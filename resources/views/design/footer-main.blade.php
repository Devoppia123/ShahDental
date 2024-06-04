@include('inc.main-footer')
<div class="footer-copy">
    <div class="container-xxl">
        <div class="row cus-row ">
            <div class="foo-copy-col foo-copy-col-a">
                <div class="site-map">
                    <a href="{{ url('site_map') }}">Sitemap</a>
                    <p>|</p>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>
            <div class="foo-copy-col foo-copy-col-b">
                <div class="privacy">
                    {{-- <p>© {{ date('Y') }} Shah Dental Clinic, All Rights Reserved. | Design & Development:
                        www.webwooter.com</p> --}}

                        {{-- add link on webwooter officialsite yasir --}}
                        <p>© {{ date('Y') }} Shah Dental Clinic, All Rights Reserved. | Design & Development:
                            <a href="http://www.webwooter.com" target="_blank">www.webwooter.com</a>
                        </p>
                </div>
            </div>
        </div>
    </div>
    
</div>