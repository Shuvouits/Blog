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
                            <h1 class="m-0 text-dark">ViewPost</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Post</a></li>
                                <li class="breadcrumb-item active">ViewPost</li>
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
                                        <h3 class="card-title">ViewPost</h3>
                                        <a href="/admin/post" class="btn btn-primary">Go To Post List</a>
                                    </div>

                                </div>

                                <div class="card-body p-0">
                                    <table class="table table-striped table-bordered">

                                        <tbody>
                                            <tr>
                                                <th style="width: 200px;">Image</th>
                                                <td>
                                                    <img src="{{asset('images/' .$image)}}" class="img-thumbnail" width="150px" height="50px">
                                                </td>

                                            </tr>

                                            <tr>
                                                <th style="width: 200px;">Title</th>
                                                <td>
                                                    {{$post_title}}
                                                </td>

                                            </tr>

                                            <tr>
                                                <th style="width: 200px;">Category Name</th>
                                                <td>
                                                    {{$category_name}}
                                                </td>

                                            </tr>

                                            <tr>
                                                <th style="width: 200px;">Post Tag</th>

                                                <td>
                                                    @foreach($all_tag as $item)

                                                    @foreach($tagpost_data as $value)

                                                    @if($item->id == $value->tag_id)
                                                    <span class="badge badge-primary">{{$item->name}}</span>
                                                    @endif
                                                    
                                                    @endforeach

                                                    @endforeach
                                                </td>


                                            </tr>

                                            <tr>
                                                <th style="width: 200px;">Author Name</th>
                                                <td>
                                                    {{$author_name}}
                                                </td>

                                            </tr>

                                            <tr>
                                                <th style="width: 200px;">Posting Date</th>
                                                <td>
                                                    {{$posting_date}}
                                                </td>

                                            </tr>

                                            <tr>
                                                <th style="width: 200px;">Permalink</th>
                                                <td>
                                                    {{$permalink}}
                                                </td>

                                            </tr>

                                           

                                            <tr>
                                                <th style="width: 200px;">Post Description</th>
                                                <td>
                                                    {!!$description !!}
                                                </td>

                                            </tr>

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