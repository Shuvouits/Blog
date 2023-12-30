<header id="header">

    <div id="nav">

        <div id="nav-fixed">
            <div class="container">

                <div class="nav-logo">
                    <a href="/" class="logo"><img src="data:image/webp;base64,UklGRiQCAABXRUJQVlA4TBgCAAAvcUAEEH8gEEgC2l9xhUEZpIlI6DiQG23/2zYvk8F8msDGuctg52z/zwtAG4gbkKUzUKJxTqW8AekJqA2ccwA0gE+JZia/4g8JK0T0fwJWeaD1DiB8zFiSdkgk6S4YeQBrKx9gpAJ2d6r4AnMHCJUH3vuMH0ZRdIukF0VSDaNNq6uUpSrW+kqSrozqwHs5wLDBuI6dbABfHmOkPLCfYiTPGsn2Eg8YrurApJyhHVsVYJrSlwKgJZ2iNa2+CYDJNw9YFjK4yhnpBrhKOdBiJwd9BUCr0H4HLJ8FYGIytHYw0gCepE3jPTlwoDqpqzxmYN5BGGQJe5aK7Ke4Cp6oAWM5aVOHsMMyz/sbGdam5zDaUY1pbIU6YdSBmUpp/2u8P87EYViHsSQFJJLUy2MUyHfVsbZVYTGAuYrsSjGJx7DGsM7EgfHDKIoukvSiaKEaRv5s8ERnrLGKjFQ8ypOA6THeeyzzMK5jJxvA24G1r5FOWst3sK0KM5XS1gf8g25g3pGFVcHIfyJtuvJpK9VjLAeYxrC82YPWuzDINneMfFfyrK20xxyoccj09Qaw+Ohlm1mMVbGGaTu5voJDhr+awHhey7YsWts7eWuuPDCU05IuwyyG96oA+3Iy9WMswJXvqgewpQYj2TGEKgFbylsPoyi6RdKLoqmuH+mJfKutDmZ5iIkBugMsSdohkaSHuSPtq2GtrWJoT6Q7RQ==" alt=""></a>
                </div>


                <ul class="nav-menu nav navbar-nav">
                    @foreach($all_category as $item)
                    <li><a href="/category/{{$item->slug}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>


                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <form action="/search-post" method="get">
                        
                        <div class="search-form">
                            <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                            <button class="search-close"><i class="fa fa-times"></i></button>
                        </div>
                    </form>

                </div>

            </div>
        </div>


        <div id="nav-aside">

            <div class="section-row">
                <ul class="nav-aside-menu">
                    @foreach($all_category as $item)
                    <li><a href="/category/{{$item->slug}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>


            <div class="section-row">
                <h3>Recent Posts</h3>
                <div class="post post-widget">
                    <a class="post-img" href="blogPost.html"><img src="{{asset('img/xwidget-2.jpg.pagespeed.ic.cSUEAOhjjU.webp')}}" alt=""></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="blog-post.html">Sagedraw UI Builder Turns Your Website Design Mockup Into
                                Code Automatically</a></h3>
                    </div>
                </div>
                <div class="post post-widget">
                    <a class="post-img" href="blog-post.html"><img src="{{asset('img/xwidget-3.jpg.pagespeed.ic.5z-SP7IbT6.webp')}}" alt=""></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development
                                Block!</a></h3>
                    </div>
                </div>
                <div class="post post-widget">
                    <a class="post-img" href="blog-post.html"><img src="img/xwidget-4.jpg.pagespeed.ic.i3iWR0f20S.webp" alt=""></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a>
                        </h3>
                    </div>
                </div>
            </div>


            <div class="section-row">
                <h3>Follow us</h3>
                <ul class="nav-aside-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>


            <button class="nav-aside-close"><i class="fa fa-times"></i></button>

        </div>

    </div>

</header>