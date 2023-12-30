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

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <ul class="page-header-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>{{$cat_name}}</li>
                    </ul>
                    <h1>{{$cat_name}}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section">

        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    <div class="row">

                        @foreach($first_post as $item)

                        <div class="col-md-12">
                            <div class="post post-thumb">
                                <a class="post-img" href="/{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt="" data-pagespeed-url-hash="67351088" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        @foreach($all_category as $category)
                                        @if($item->category_id == $category->id)
                                        <a class="post-category cat-1" href="/category/{{$category->slug}}">{{$category->name}}</a>
                                        @endif
                                        @endforeach
                                        <span class="post-date">{{ date('F', strtotime($item->posting_date)) }} {{ date('d', strtotime($item->posting_date)) }}, {{ date('Y', strtotime($item->posting_date)) }}</span>
                                    </div>
                                    <h3 class="post-title"><a href="/{{$item->permalink}}">{{$item->title}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        @foreach($second_post as $item)


                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="/{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt="" data-pagespeed-url-hash="950850851" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        @foreach($all_category as $category)
                                        @if($item->category_id == $category->id)
                                        <a class="post-category cat-2" href="Category.html">{{$category->name}}</a>
                                        @endif
                                        @endforeach
                                        <span class="post-date">{{ date('F', strtotime($item->posting_date)) }} {{ date('d', strtotime($item->posting_date)) }}, {{ date('Y', strtotime($item->posting_date)) }}</span>
                                    </div>
                                    <h3 class="post-title"><a href="/{{$item->permalink}}">{{$item->title}}</a></h3>
                                </div>
                            </div>
                        </div>

                        @endforeach




                        <div class="clearfix visible-md visible-lg"></div>

                        <div class="col-md-12">
                            <div class="section-row">
                                <a href="#">
                                    <img class="img-responsive center-block" src="{{asset('img/xad-2.jpg.pagespeed.ic.RB_ZDhAXxh.webp')}}" alt="" data-pagespeed-url-hash="520125700" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                </a>
                            </div>
                        </div>

                        @foreach($third_post as $item)

                        <div class="col-md-12">
                            <div class="post post-row">
                                <a class="post-img" href="/{{$item->permalink}}"><img src="{{asset('images/' .$item->image)}}" alt="" data-pagespeed-url-hash="361851009" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
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
                                    <p>{!!substr($item->description,0,250) !!}</p>
                                </div>
                            </div>
                        </div>


                        @endforeach







                        <div class="col-md-12">
                            <div class="section-row">
                                <button class="primary-button center-block">Load More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="data:image/webp;base64,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" alt="" data-pagespeed-url-hash="225625779" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        </a>
                    </div>


                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Most Read</h2>
                        </div>

                        @foreach($most_read as $item)

                        <div class="post post-widget">
                            <a class="post-img" href="blog-post.html"><img src="{{asset('images/' .$item->image)}}" alt="" data-pagespeed-url-hash="3605550000" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                            <div class="post-body">
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
                                <li><a href="#">{{$item->name}}</a></li>
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
                                <li><a href="#">Jan 2018</a></li>
                                <li><a href="#">Feb 2018</a></li>
                                <li><a href="#">Mar 2018</a></li>
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