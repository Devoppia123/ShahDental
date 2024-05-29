<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        </div>
    </div>
</div>
<div class="header-advance-area">
    <div class="header-top-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 0px;">
                    <div class="header-top-wraper">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <form role="search" class="search-form">
                                    <input type="text" placeholder="Search..." class="search-int form-control">
                                </form>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6">
                                <div class="user-tab">
                                    <img src="{{ asset('patient/images/user-img-2.png') }}">
                                    <p>
                                        <span>Otundo PHR</span><br>
                                        Task: #78
                                    </p>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 user-tab-02">
                                <div class="user-tab">
                                    <a style="background-color: #0f5ef7;
                                            color: #fff !important;
                                            font-size: 11px;
                                            font-weight: 500;
                                            padding: 8px 12px 6px 12px;
                                            border-radius: 4px;
                                            display: inline-block;
                                            text-transform: uppercase;
                                            margin-right: 7px;"
                                        href="{{ url('logout') }}"
                                        onclick="return confirm('Are you sure want to Logout ?')">Logout</a>
                                </div>
                            </div>
                            <div class="toggle-btn-side-menu">
                                <span><i class="fa fa-bars" onclick="side_toggle_menu()" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function side_toggle_menu() {
        $('.left-sidebar-pro').toggle(500);
    }
</script>
