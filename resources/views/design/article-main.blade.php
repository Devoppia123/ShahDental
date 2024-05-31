  <div id="article-main" class="main-section">
      <div class="container">
          <div class="services-txt-blk all-txt-blk">
              <div class="branch-heading">
                  <h2>Dr. Shah Articles</h2>
                  <p class="p-02">Online to know about our locations and ease yourself in finding us wherever you are.
                  </p>
              </div>
              <div class="article-block">
                  @foreach ($articles as $index => $article)
                      @if ($index == 0)
                          <div class="articles article-01 reh-arti reh-arti-col-one">
                              <div class="art-img-box reh-arti-img-box">
                                  <img src="{{ url("public/articles/$article->image") }}" alt="NO  IMAGE">

                              </div>
                              <div class="art-txt-box reh-arti-text">
                                  <h4 class="arti-sub-head">{{ $article->speciality }}</h4>
                                  <h3 class="arti-head">{{ $article->title }}</h3>
                                  <p>{!! Str::limit($article->description, 200) !!}</p>
                                  <a href="{{ url("/view_article/$article->id") }}">Read More >></a>

                              </div>
                          </div>
                          <div class="articles article-02 reh-arti-col-tw">
                          @else
                              <div class="article-root reh-arti-row-one">
                                  <div class="art-img-box">
                                      <img src="{{ url("public/articles/$article->image") }}" alt="NO  IMAGE">
                                      {{-- <img src="images/Shah-Dental-art-1_35.png" alt=""> --}}
                                  </div>
                                  <div class="art-txt-box reh-arti-col-right-text">
                                      <h4>{{ $article->speciality }}</h4>
                                      <h3>{{ $article->title }}</h3>
                                      {{-- <p>{!! Str::limit($article->description, 100) !!}</p> --}}
                                      <a href="{{ url("/view_article/$article->id") }}">Read More >></a>
                                  </div>
                              </div>
                      @endif
                  @endforeach
              </div>

          </div>
      </div>
  </div>
  </div>
