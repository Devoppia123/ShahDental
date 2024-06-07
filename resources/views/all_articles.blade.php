@extends('design.template')
@section('title', 'Shah Dental | Articles')
@section('customCSS')
    <style>
        /* Pagination and Next Prev CSS in Artilcles */
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
        }

        ul {
            display: block;
            list-style-type: disc;
            margin-top: 0;
            margin-bottom: 1rem;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            padding-inline-start: 40px;
            unicode-bidi: isolate;
        }

        li {
            display: list-item;
            text-align: -webkit-match-parent;
            unicode-bidi: isolate;
        }

        .pagination-sm .page-item:first-child .page-link {
            border-top-left-radius: .2rem;
            border-bottom-left-radius: .2rem;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }

        .pagination-sm .page-link {
            padding: .25rem .5rem;
            font-size: .875rem;
        }

        .page-link {
            position: relative;
            display: block;
            color: #0d6efd;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #dee2e6;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .form-control {
            width: 95%;
        }

        .ask-doc-form label {
            margin-bottom: 5px;
            font-weight: 500;
        }

        .header_content h2 {
            font-size: 28px;
            margin-top: 5px;
            margin-bottom: 0px;
            color: #fff;
            font-weight: 600;
        }

        .blog-content h6 a {
            display: inline-block;
            float: right;
            margin-top: 70px;
            background-color: #ffff;
            padding: 7px 10px;
            font-size: 14px;
            text-decoration: none;
            color: #6e0c0c;
            border-radius: 4px;
            font-family: 'RedHatDisplay-Regular';
        }

        .blog-content h5 {
            color: #990909;
            font-size: 24px;
            font-family: 'RedHatDisplay-Medium';
            font-weight: 600;
            margin-bottom: 0px;
        }

        .blog-content h6 {
            font-family: 'CorporateNarrow-Book';
            font-size: 16px;
            margin-top: 15px;
            color: #857c7c;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #1d1f22;
            font-family: 'RedHatDisplay-Medium';
        }

        .pagination-sm .page-link {
            padding: .25rem .5rem;
            font-size: 14px;
            font-family: 'RedHatDisplay-Medium';
            color: #741616;
        }

        /* Article Row */
        .article-row {
            background-color: #fff;
            display: flex;
        }
    </style>
    <link rel="stylesheet" href="{{ url('public/css/Our-Speciality.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
@endsection
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection

@section('content')
    <div id="article-main" class="main-section">
        <div class="container-xxl">
            <div class="services-txt-blk all-txt-blk">
                <div class="branch-heading">
                    {{-- <h2>Articles</h2> --}}
                    <p class="p-02">Online to know about our locations and ease yourself in finding us wherever you are.
                    </p>
                </div>
                <div class="article-block">
                    <div class="reh-cus-article" id="main-table-div">
                        {{-- @dd($articles) --}}
                        @foreach ($articles as $article)
                            <div class="main-table">
                                <div class="row article-row p-2">
                                    <div class="col-md-4 reh-img-col-4">
                                        <img class="reh-article-img"
                                            src="{{ url("public/articles/$article->image") }}">
                                    </div>
                                    <div class="col-md-8" style="padding-left: 20px;">
                                        <div class="blog-content">
                                            <h5>{{ $article->title }}</h5>
                                            <h6>
                                                {!! Str::limit($article->description, 80) !!}<a class="reh-read-more"
                                                    href="{{ url("/view_article/$article->id ") }}">Read
                                                    More</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <hr style="background-color:#fff;">
                            </div>
                        @endforeach
                        <ul id="pagination-demo" class="pagination-sm re-pagination"></ul>
                    </div>
                    {{-- <div class="articles article-01">
                        <div class="art-img-box">
                            <img src="{{ url('public/images/Shah-Dental-art-1_32.png') }}" alt="">
                        </div>
                        <div class="art-txt-box">
                            <h4>Children's Dental Care:</h4>
                            <h3>Four Steps to Getting ...</h3>
                            <p>A testimonial is an honest endorsement of your
                                product or service that usually comes from a
                                customer, colleague, or peer who has benefited
                                from or experienced success as a result of the
                                work you did for them.</p>
                            <a href="#">READ MORE >></a>
                        </div>
                    </div>
                    <div class="articles article-02">
                        <div class="article-root">
                            <div class="art-img-box">
                                <img src="{{ asset('images/Shah-Dental-art-1_35.png') }}" alt="">
                            </div>
                            <div class="art-txt-box">
                                <h4>Root Canal Treatment,</h4>
                                <h3>How is it performed?</h3>
                                <a href="#">READ MORE >></a>
                            </div>
                        </div>
                        <div class="article-root">
                            <div class="art-img-box">
                                <img src="{{ asset('images/Shah-Dental-art_38.png') }}" alt="">
                            </div>
                            <div class="art-txt-box">
                                <h4>What's the ideal age</h4>
                                <h3>Dental treatment?</h3>
                                <a href="#">READ MORE >></a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="container">
            {{ $articles->links() }}
        </div>
        {{-- <div class="container" id="main-table-div" style="padding-top: 50px">
            @foreach ($articles as $article)
                <div class="col-lg-10 main-table">
                    <div class="row">
                        <div class="col-lg-3" style="margin-right: 30px;">
                            <!-- <img style="width: 250px; height: 150px;" src="{{ asset("articles/$article->image") }}"> -->
                            <img style="width: 250px; height: 150px;" src="{{ url("public/articles/$article->image") }}">
                        </div>
                        <div class="col-lg-8" style="padding-left: 10px;">
                            <div class="blog-content">
                                <h5>{{ $article->title }}</h5>
                                <h6>
                                    {!! Str::limit($article->description, 80) !!}<a href="{{ url("/view_article/$article->id ") }}">Read
                                        More</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
            <ul id="pagination-demo" class="pagination-sm"></ul>
        </div> --}}
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
    {{-- <script>
        var item_perpage = 3;
        var total_pages = Math.ceil($('#main-table-div .main-table').length / item_perpage);

        $('#main-table-div .main-table').hide();
        $('#pagination-demo').twbsPagination({
            totalPages: total_pages,
            visiblePages: 6,

            next: 'Next',
            prev: 'Prev',
            onPageClick: function(event, page) {
                $('#main-table-div .main-table').hide();
                var startfrom = (page * item_perpage) - item_perpage;

                for (var i = startfrom; i < startfrom + item_perpage; i++) {
                    $('#main-table-div .main-table').eq(i).show();
                }
            }
        });
    </script> --}}
@endsection

@section('footer-main')
    @include('design.footer-main')
@endsection

@section('script')
    <script></script>
@endsection
