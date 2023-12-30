<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>

    @include('admin.Link')
    @include('admin.CustomStyle')


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.Navbar')

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.Sidebar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Author</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Author</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header">

                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Author-List</h3>
                                        <a href="/admin/add-author" class="btn btn-primary">Create Author</a>
                                    </div>

                                </div>

                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="">
                                                <th style="width: 10px">#</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>About-Author</th>

                                                <th style="width: 40px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($count_data == 0)
                                            <tr>
                                                <td colspan="4">
                                                    <h5 class="text-center">No Data Found</h5>
                                                </td>
                                            </tr>
                                            @else

                                            @foreach($all_author as $item)



                                            <tr class="">
                                                <td>{{$item->id}}</td>
                                                <td>
                                                    <span class="badge badge-success">{{$item->name}}</span>
                                                    
                                                </td>
                                                <td>
                                                    <img src="{{asset('images/'.$item->image)}}" class="img-thumbnail">
                                                </td>
                                                <td>{{$item->description}}</td>

                                                <td class="d-flex">

                                                    <a href="/admin/edit-author/{{$item->id}}" class="btn btn-primary btn-sm mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="/admin/delete-author/{{$item->id}}" class="btn btn-danger btn-sm mr-1">
                                                        <i class="fas fa-trash"></i>
                                                    </a>



                                                </td>
                                            </tr>

                                            @endforeach
                                            
                                            @endif






                                        </tbody>
                                    </table>
                                </div>


                            </div>


                        </div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    @include('admin.Script')
</body>

</html>