
<style>
    .footer-blk form button {
        border: none;
        background: none;
        color: #5e5e5e;

    }

    .footer-blk form button:hover {
        color: blue;
    }
</style>
<div id="footer-main" class="main-section">
    <div class="container">
        <div class="footer-txt-blk all-txt-blk">
            <div class="footer-blocks">
                <div class="footer-blk footer-blk-01">
                    <a href="{{ url('/') }}">
                        <img src="{{ url('public/images/logo_03.png') }}" alt="">
                    </a>

                    <p>With Verber Family Dentistry, what you see is what you get. All of the photos that you
                        see on our website are the real deal:
                        our team, our office, and our patients.
                        These photos capture us in our day-to-day work as
                        we strive to provide the best care for your smile!</p>
                    <h3>Follow Us :</h3>
                    <img src="{{ url('public/images/Shah-Dental-line_40.png') }}" alt="">
                    <div class="soical-icon">
                        <a href="https://www.facebook.com/Shah-Dental-Clinic-884470434977957" target="_blank"
                            rel="noopener noreferrer">
                            <img src="{{ url('public/images/Shah-Dental-icon_53.png') }}" alt="">
                        </a>
                        <a href="https://www.instagram.com/dentalartclinicc/" target="_blank" rel="noopener noreferrer">
                            <img src="{{ url('public/images/Shah-Dental-icon_55.png') }}" alt="">
                        </a>
                        <a href="https://twitter.com/SYEDSHA07606672" target="_blank" rel="noopener noreferrer">
                            <img src="{{ url('public/images/Shah-Dental-icon_58.png') }}" alt="">
                        </a>

                    </div>
                </div>
                <div class="footer-blk footer-blk-02">
                    <h3>Home</h3>
                    <img src="{{ url('public/images/Shah-Dental-line_40.png') }}" alt="">
                    <div class="icon-list">
                        <a href="{{ url('/services-treatments') }}">>> <p>Dental Services</p></a>
                        {{-- <a href="#">>> <p>For Parthners</p></a> --}}
                        <a href="{{ url('/branch-directions') }}">>> <p>Directions</p></a>
                        <a href="{{ url('/our-team') }}">>> <p>Our Team</p></a>
                        <a href="#">>> <p>Blog & News</p></a>
                        <a href="#">>> <p>FAQ's</p></a>
                    </div>
                </div>
                <div class="footer-blk footer-blk-03">
                    <h3>Quick Links</h3>
                    <img src="{{ url('public/images/Shah-Dental-line_40.png') }}" alt="">
                    <div class="icon-list">
                        {{-- <a href="#">>> <p>For Dentists</p></a> --}}
                        <a href="{{ url('/make-an-appointment') }}">>> <p>Appointments</p></a>
                        <a href="{{ url('/contact-us') }}">>> <p>Contact Us</p></a>
                        <a href="{{ url('/gallery') }}">>> <p>Gallery</p></a>
                        <a href="#">>> <p>Our Branches</p></a>
                        {{-- <a href="#">>> <p>Patient Check-in</p></a> --}}
                        <form action="https://getphr.com/" method="get">
                            <input type="hidden" name="hospID" value="7" id="">
                            <button type="submit" class="patient_login" target="blank">>> Patient Check-in</button>
                        </form>
                    </div>
                </div>
                <div class="footer-blk footer-blk-04">
                    <h3>Contact Us</h3>
                    <img src="{{ url('public/images/Shah-Dental-line_40.png') }}" alt="">
                    <div class="icon-list">
                        <div class="icon-address">
                            <div class="art-img-box">
                                <img src="{{ url('public/images/Shah-Dental-icon_44.png') }}" alt="">
                            </div>
                            <div class="art-txt-box">
                                <h4>Call Us :</h4>
                                <a href="tel:717-737-4337">717-737-4337</a>
                            </div>
                        </div>
                        <div class="icon-address gap">
                            <div class="art-img-box">
                                <img src="{{ url('public/images/Shah-Dental-icon_47.png') }}" alt="">
                            </div>
                            <div class="art-txt-box">
                                <h4>Email :</h4>
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=Info@gmail.com"
                                    target="_blank">Info@gmail.com</a>
                            </div>
                        </div>
                        <div class="icon-address">
                            <div class="art-img-box">
                                <img src="{{ url('public/images/Shah-Dental-icon_50.png') }}" alt="">
                            </div>
                            <div class="art-txt-box">
                                <h4>Location :</h4>
                                <a href="{{ url('branch-directions') }}?location=3920+Market+Street,+Camp+Hill,+PA+17011"
                                    target="_blank">3920 Market Street, Camp Hill, PA 17011 Make an Appointment</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="soct-cout-main" class="main-section">
    <div class="container">
        <div class="soct-txt-blk all-txt-blk">
            <div class="soct-cout">
                <div class="site-map">
                    <a href="#">Sitemap</a>
                    <p>|</p>
                    <a href="#">Privacy Policy</a>
                </div>
                <div class="privacy">
                    <p>© {{ date('Y') }} Shah Dental Clinic, All Rights Reserved. | Design & Development:
                        www.webwooter.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
