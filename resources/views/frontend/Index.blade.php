<!DOCTYPE html>
<html lang="en">

<head>
  @include('frontend.link')

</head>

<body>


  @include('frontend.Header')


  <div class="section">

    <div class="container">

      <div class="row">

        @foreach($first_post as $item)

        <div class="col-md-6">
          <div class="post post-thumb">
            <a class="post-img" href="{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt=""></a>
            <div class="post-body">
              <div class="post-meta">
                @foreach($all_category as $category)
                @if($item->category_id == $category->id)
                <a class="post-category cat-1" href="#">{{$category->name}}</a>
                @endif
                @endforeach
                <span class="post-date">{{ date('F', strtotime($item->posting_date)) }} {{ date('d', strtotime($item->posting_date)) }}, {{ date('Y', strtotime($item->posting_date)) }}</span>
              </div>
              <h3 class="post-title"><a href="{{$item->permalink}}">{{$item->title}}</a></h3>
            </div>
          </div>
        </div>

        @endforeach

      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h2>Recent Posts</h2>
          </div>
        </div>

        @foreach($recent_post as $item)

        <div class="col-md-4">
          <div class="post">
            <a class="post-img" href="/{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt=""></a>
            <div class="post-body">
              <div class="post-meta">
                @foreach($all_category as $category)

                @if($category->id == $item->category_id)
                <a class="post-category cat-2" href="category.html">{{$category->name}}</a>
                @endif

                @endforeach
                <span class="post-date">{{ date('F', strtotime($item->posting_date)) }} {{ date('d', strtotime($item->posting_date)) }}, {{ date('Y', strtotime($item->posting_date)) }}</span>
              </div>
              <h3 class="post-title"><a href="{{$item->permalink}}">{{$item->title}}</a></h3>
            </div>
          </div>
        </div>


        @endforeach

      </div>


      <div class="row">

        <div class="col-md-12">
          <div class="section-title">
            <h2>Technology</h2>
          </div>
        </div>


        <div class="col-md-8">
          <div class="row">

            @foreach($technology_category_first as $item)

            <div class="col-md-12">
              <div class="post post-thumb">
                <a class="post-img" href="/{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt=""></a>
                <div class="post-body">
                  <div class="post-meta">

                    @foreach($all_category as $category)

                    @if($category->id == $item->category_id)
                    <a class="post-category cat-3" href="category.html">{{$category->name}}</a>
                    @endif

                    @endforeach

                    <span class="post-date">{{ date('F', strtotime($item->posting_date)) }} {{ date('d', strtotime($item->posting_date)) }}, {{ date('Y', strtotime($item->posting_date)) }}</span>
                  </div>
                  <h3 class="post-title"><a href="{{$item->permalink}}">Ask HN: Does Anybody Still Use JQuery?</a></h3>
                </div>
              </div>
            </div>
            @endforeach



            @foreach($technology_category as $item)
            <div class="col-md-6">
              <div class="post">
                <a class="post-img" href="/{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt=""></a>
                <div class="post-body">
                  <div class="post-meta">
                    @foreach($all_category as $category)

                    @if($category->id == $item->category_id)
                    <a class="post-category cat-4" href="category.html">{{$category->name}}</a>
                    @endif

                    @endforeach
                    <span class="post-date">{{ date('F', strtotime($item->posting_date)) }} {{ date('d', strtotime($item->posting_date)) }}, {{ date('Y', strtotime($item->posting_date)) }}</span>
                  </div>
                  <h3 class="post-title"><a href="{{$item->permalink}}">{{$item->title}}</a></h3>
                </div>
              </div>
            </div>
            @endforeach




            <div class="clearfix visible-md visible-lg"></div>


            <div class="clearfix visible-md visible-lg"></div>



          </div>
        </div>
        <div class="col-md-4">

          <div class="aside-widget">
            <div class="section-title">
              <h2>Most Read</h2>
            </div>

            @foreach($most_read as $item)

            <div class="post post-widget">
              <a class="post-img" href="{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt=""></a>
              <div class="post-body">
                <h3 class="post-title"><a href="{{$item->permalink}}">{{$item->title}}</a></h3>
              </div>
            </div>

            @endforeach

          </div>


          <div class="aside-widget">
            <div class="section-title">
              <h2>Featured Posts</h2>
            </div>

            @foreach($featured_post as $item)

            <div class="post post-thumb">
              <a class="post-img" href="{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt=""></a>
              <div class="post-body">
                <div class="post-meta">
                  @foreach($all_category as $category)

                  @if($category->id == $item->category_id)
                  <a class="post-category cat-1" href="/category/{{$category->slug}}">{{$category->name}}</a>
                  @endif

                  @endforeach
                  <span class="post-date">{{ date('F', strtotime($item->posting_date)) }} {{ date('d', strtotime($item->posting_date)) }}, {{ date('Y', strtotime($item->posting_date)) }}</span>
                </div>
                <h3 class="post-title"><a href="{{$item->permalink}}">{{$item->title}}</a></h3>
              </div>
            </div>
            @endforeach



          </div>


          <div class="aside-widget text-center">
            <a href="#" style="display: inline-block;margin: auto;">
              <img class="img-responsive" src="img/xad-1.jpg.pagespeed.ic.qQJhsdJdF0.webp" alt="">
            </a>
          </div>

        </div>
      </div>

    </div>

  </div>


  <div class="section section-grey">

    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <h2>Cannabis</h2>
          </div>
        </div>

        @foreach($cannabis_category as $item)

        <div class="col-md-4">
          <div class="post">
            <a class="post-img" href="blog-post.html"><img src="{{asset('images/' .$item->image)}}" alt=""></a>
            <div class="post-body">
              <div class="post-meta">

                @foreach($all_category as $category)

                @if($category->id == $item->category_id)
                <a class="post-category cat-3" href="category.html">{{$category->name}}</a>
                @endif

                @endforeach

                <span class="post-date">{{ date('F', strtotime($item->posting_date)) }} {{ date('d', strtotime($item->posting_date)) }}, {{ date('Y', strtotime($item->posting_date)) }}</span>
              </div>
              <h3 class="post-title"><a href="{{$item->permalink}}">{{$item->title}}</a></h3>
            </div>
          </div>
        </div>

        @endforeach




      </div>

    </div>

  </div>


  <div class="section">

    <div class="container">

      <div class="row">

        <div class="col-md-8">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title">
                <h2>Entertainment</h2>
              </div>
            </div>

            @foreach($entertainment_category as $item)

            <div class="col-md-12">
              <div class="post post-row">
                <a class="post-img" href="/{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt=""></a>
                <div class="post-body">
                  <div class="post-meta">
                    @foreach($all_category as $category)

                    @if($category->id == $item->category_id)
                    <a class="post-category cat-1" href="category.html">{{$category->name}}</a>
                    @endif

                    @endforeach
                    <span class="post-date">{{ date('F', strtotime($item->posting_date)) }} {{ date('d', strtotime($item->posting_date)) }}, {{ date('Y', strtotime($item->posting_date)) }}</span>
                  </div>
                  <h3 class="post-title"><a href="/{{$item->permalink}}">{{$item->title}}</a></h3>
                  <p>{!!substr($item->description,0,250) !!} ........<a class="#" href="category.html">Read More</a></p>
                </div>
              </div>
            </div>

            @endforeach



          </div>
        </div>


        <div class="col-md-4">

          <div class="aside-widget text-center">
            <a href="#" style="display: inline-block;margin: auto;">
              <img class="img-responsive" src="img/xad-1.jpg.pagespeed.ic.qQJhsdJdF0.webp" alt="">
            </a>
          </div>


          <div class="aside-widget">
            <div class="section-title">
              <h2>Catagories</h2>
            </div>
            <div class="category-widget">
              <ul>
                @foreach($all_category as $item)
                <li><a href="#" class="cat-1">{{$item->name}}<span>{{$item->post_count}}</span></a></li>
                @endforeach

              </ul>
            </div>
          </div>


          <div class="aside-widget">
            <div class="tags-widget">
              <h2>Tags</h2>
              <ul>
                @foreach($all_tag as $item)
                <li><a href="#">{{$item->name}}</a></li>
                @endforeach

              </ul>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>

  @include('frontend.footer');

  @include('frontend.script');



</body>

</html>