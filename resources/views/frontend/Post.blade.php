<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel | Blog | project</title>

    <link href="font.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{asset('website/style.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


    @include('frontend.Header')

    @foreach($post_data as $item)

    <div id="post-header" class="page-header">
        <div class="background-img" style="background-image:url({{asset('images/' .$item->image)}})"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-meta">
                        @foreach($all_category as $category)
                        @if($item->category_id == $category->id)
                        <a class="post-category cat-1" href="#">{{$category->name}}</a>
                        @endif
                        @endforeach
                        <span class="post-date">{{ date('F', strtotime($item->posting_date)) }} {{ date('d', strtotime($item->posting_date)) }}, {{ date('Y', strtotime($item->posting_date)) }}</span>

                    </div>
                    <h1>{{$item->title}}</h1>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <div class="section">

        <div class="container">

            <div class="row">

                <div class="col-md-8">
                    <div class="section-row sticky-container">
                        <div class="main-post">

                            {!! $item->description !!}

                        </div>
                        <div class="post-shares sticky-shares">
                            <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
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
                            <h2>Most Read</h2>
                        </div>

                        @foreach($most_read as $item)

                        <div class="post post-widget">
                            <a class="post-img" href="/{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt=""></a>
                            <div class="post-body">
                                <h3 class="post-title"><a href="/{{$item->permalink}}">{{$item->title}}</a></h3>
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
                            <a class="post-img" href="/{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    @foreach($all_category as $category)
                                    @if($item->category_id == $category->id)
                                    <a class="post-category cat-3" href="Category.html">{{$category->name}}</a>
                                    @endif
                                    @endforeach
                                    <span class="post-date">{{ date('F', strtotime($item->posting_date)) }} {{ date('d', strtotime($item->posting_date)) }}, {{ date('Y', strtotime($item->posting_date)) }}</span>
                                </div>
                                <h3 class="post-title"><a href="/{{$item->permalink}}">{{$item->title}}</a></h3>
                            </div>
                        </div>
                        @endforeach

                    </div>


                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Catagories</h2>
                        </div>
                        <div class="category-widget">
                            <ul>
                                @foreach($all_category as $item)
                                <li><a href="/category/{{$item->slug}}" class="cat-1">{{$item->name}}<span>{{$item->post_count}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <div class="aside-widget">
                        <div class="tags-widget">
                            <h2>Tags</h2>
                            <ul>
                                @foreach($all_tag as $item)
                                <li><a href="/{{$item->slug}}">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Archive</h2>
                        </div>
                        <div class="archive-widget">
                            <ul>
                                <li><a href="#">January 2018</a></li>
                                <li><a href="#">Febuary 2018</a></li>
                                <li><a href="#">March 2018</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>



    @include('frontend.footer')
    @include('frontend.script')
</body>

</html>