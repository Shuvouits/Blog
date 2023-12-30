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
                            <h1 class="m-0 text-dark">Create Mail</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Mail List</li>
                                <li class="breadcrumb-item active">Create Mail</li>
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
                                        <h3 class="card-title">Create Mail</h3>
                                        <a href="/admin/category" class="btn btn-primary">Go Back to Category List</a>
                                    </div>

                                </div>

                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="col-lg-6 offset-lg-3">
                                        <form action="/admin/create-category" method="post">
                                            {{@csrf_field()}}
                                            <div class="card-body">
                                            
                                                <div class="form-group">
                                                    <label for="category_name">To</label>
                                                    <input type="text" class="form-control" id="category_name" name='category_name' placeholder="Category Name" required>
                                                    @error('category_name')
                                                       <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="category_name">Add Subject</label>
                                                    <input type="text" class="form-control" id="category_name" name='category_name' placeholder="Category Name" required>
                                                    @error('category_name')
                                                       <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Mail Details</label>
                                                    <textarea class="newsletter" placeholder="Place some text here" name="post_description" style="width: 100%; height: 80px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                                                    @error('post_description')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                               

                                               
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                                <!-- /.card-body -->
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