<nav class="main-header navbar navbar-expand navbar-white navbar-light">

   


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


        <li class="nav-item dropdown">

            <a href="/" class="nav-link" target="_blank"><i class="fas fa-globe"></i> View Website</a>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">



            <a class="nav-link" href="#" data-toggle="dropdown">
                <span class="sr-only">{{$image = session()->get('image')}}</span>
                @if($image==null)
                <img src="{{asset('images/avater.png')}}" width="35px" height="35px" style="border-radius: 50%;">
                <span>{{session()->get('name')}}</span>
                <i class="fas fa-angle-down"></i>
                @else
                <img src="{{asset('images/' .$image)}}" width="35px" height="35px" style="border-radius: 50%;">
                <span>{{session()->get('name')}}</span>
                <i class="fas fa-angle-down"></i>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <a href="/admin/profile" class="dropdown-item">
                    <i class="fas fa-user-circle mr-2"></i> Profile

                </a>
                <div class="dropdown-divider"></div>
                <a href="/admin/logout" class="dropdown-item">
                    <i class="fas fa-key mr-2"></i> Logout

                </a>
                <div class="dropdown-divider"></div>


            </div>
        </li>

    </ul>
</nav>