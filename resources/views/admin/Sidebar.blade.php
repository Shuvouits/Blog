<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image text-center">
                <img src="{{asset('img/blog.jpg')}}" class="img-thumbnail" alt="User Image" style="border-radius:100%; width: 100px; height:100px">
               
            </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link   {{ request()->is('admin/dashboard') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-home mr-2"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/category" class="nav-link   {{ request()->is('admin/category') ? 'active' : '' }} ">

                        <i class="nav-icon fas fa-th-list mr-2"></i>
                        <p>
                            Category

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/author" class="nav-link {{ request()->is('admin/author') ? 'active' : '' }}  {{ request()->is('admin/add-author') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-graduate mr-2"></i>

                        <p>
                            Author

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/tag" class="nav-link {{ request()->is('admin/tag') ? 'active' : '' }} {{ request()->is('admin/add-tag') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-tags mr-2"></i>
                        <p>
                            Tags

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/post" class="nav-link {{ request()->is('admin/post') ? 'active' : '' }}  {{ request()->is('admin/add-post') ? 'active' : '' }} ">

                        <i class="nav-icon fas fa-paste mr-2"></i>

                        <p>
                            Post

                        </p>
                    </a>
                </li>

               

                <li class="nav-item menu-is-opening {{ request()->is('admin/inbox') ? 'menu-open' : '' }}  {{ request()->is('admin/compose') ? 'menu-open' : '' }} {{ request()->is('admin/read-mail') ? 'menu-open' : '' }} ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a href="/admin/inbox" class="nav-link {{ request()->is('admin/inbox') ? 'active' : '' }}   {{ request()->is('admin/sent') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                       

                       

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/admin/contact" class="nav-link {{ request()->is('admin/contact-list') ? 'active' : '' }} ">

                        
                        <i class="fab fa-youtube mr-2 nav-icon"></i>

                        <p>
                            Subscriber

                        </p>
                    </a>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>