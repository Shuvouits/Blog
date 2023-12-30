<footer id="footer">

    <div class="container">

      <div class="row">
        <div class="col-md-5">
          <div class="footer-widget">
            <div class="footer-logo">
              <a href="/" class="logo"><img src="data:image/webp;base64,UklGRiQCAABXRUJQVlA4TBgCAAAvcUAEEH8gEEgC2l9xhUEZpIlI6DiQG23/2zYvk8F8msDGuctg52z/zwtAG4gbkKUzUKJxTqW8AekJqA2ccwA0gE+JZia/4g8JK0T0fwJWeaD1DiB8zFiSdkgk6S4YeQBrKx9gpAJ2d6r4AnMHCJUH3vuMH0ZRdIukF0VSDaNNq6uUpSrW+kqSrozqwHs5wLDBuI6dbABfHmOkPLCfYiTPGsn2Eg8YrurApJyhHVsVYJrSlwKgJZ2iNa2+CYDJNw9YFjK4yhnpBrhKOdBiJwd9BUCr0H4HLJ8FYGIytHYw0gCepE3jPTlwoDqpqzxmYN5BGGQJe5aK7Ke4Cp6oAWM5aVOHsMMyz/sbGdam5zDaUY1pbIU6YdSBmUpp/2u8P87EYViHsSQFJJLUy2MUyHfVsbZVYTGAuYrsSjGJx7DGsM7EgfHDKIoukvSiaKEaRv5s8ERnrLGKjFQ8ypOA6THeeyzzMK5jJxvA24G1r5FOWst3sK0KM5XS1gf8g25g3pGFVcHIfyJtuvJpK9VjLAeYxrC82YPWuzDINneMfFfyrK20xxyoccj09Qaw+Ohlm1mMVbGGaTu5voJDhr+awHhey7YsWts7eWuuPDCU05IuwyyG96oA+3Iy9WMswJXvqgewpQYj2TGEKgFbylsPoyi6RdKLoqmuH+mJfKutDmZ5iIkBugMsSdohkaSHuSPtq2GtrWJoT6Q7RQ==" alt=""></a>
            </div>
            <ul class="footer-nav">
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Advertisement</a></li>
            </ul>
            <div class="footer-copyright">
              <span>&copy;
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This Project is made
                BY <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/shuvo.bhowmik.3/" target="_blank">Shuvo Bhowmik</a>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row">
            <div class="col-md-6">
              <div class="footer-widget">
                <h3 class="footer-title">About Us</h3>
                <ul class="footer-links">
                  <li><a href="/about">About Us</a></li>
                  
                  <li><a href="/contact">Contacts</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="footer-widget">
                <h3 class="footer-title">Catagories</h3>
                <ul class="footer-links">
                    @foreach($all_category as $item)
                    <li><a href="/category/{{$item->slug}}">{{$item->name}}</a></li>
                    @endforeach
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="footer-widget">
            <h3 class="footer-title">Join our Newsletter</h3>
            <div class="footer-newsletter">
              <form action="/newsletter" method="post">
                  {{@csrf_field()}}
                <input class="input" type="email" name="newsletter" placeholder="Enter your email">
                <button type="submit" class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
              </form>
            </div>
            <ul class="footer-social">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

    </div>

  </footer>