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
                            <h1 class="m-0 text-dark">Post</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Post</li>
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
                                        <h3 class="card-title">PostList</h3>
                                        <a href="/admin/add-post" class="btn btn-primary">Create Post</a>
                                    </div>

                                </div>

                                <div class="card-body p-0">
                                    <table class="table table-striped" id="example1">
                                        <thead>
                                            <tr class="">
                                                <th style="width: 10px">#</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Tag</th>
                                                <th>Author</th>
                                                <th>Posting Date</th>
                                                <th>permalink</th>
                                                <th>Featured</th>
                                                <th style="width: 40px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($count_data == 0)
                                            <tr>
                                                <td colspan="6">
                                                    <h5 class="text-center">No Data Found</h5>
                                                </td>
                                            </tr>
                                            @else

                                            @foreach($all_post as $item)
                                            <tr class="">
                                                <td>{{$item->id}}</td>
                                                <td>
                                                    <img src="{{asset('images/' .$item->image)}}" width="150px" height="50px" class="img-thumbnail">
                                                </td>
                                                <td>{{$item->title}}</td>
                                                <td>
                                                    @foreach($category_data as $category)
                                                    @if($category->id == $item->category_id)
                                                    <span class="badge badge-danger">{{$category->name}}</span>
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    
                                                   @foreach($all_tag_post as $tag_post)

                                                   @if($tag_post->post_id == $item->id)
                                                    <span class="badge badge-primary">
                                                        @foreach($all_tag as $tag)

                                                        @if($tag->id == $tag_post->tag_id)
                                                        {{$tag->name}}
                                                        @endif 

                                                        @endforeach
                                                    </span>
                                                    @endif 

                                                    @endforeach
                                                   
                                                   
                                                </td>
                                                <td>
                                                    <span class="badge badge-secondary">{{$item->author_name}}</span>
                                                    
                                                </td>
                                                <td>
                                                    {{$item->posting_date}}
                                                </td>
                                                <td>
                                                    {{$item->permalink}}
                                                </td>
                                                <td>
                                                    <span class="badge badge-info" style="margin-left: 10px">{{$item->featured}}</span>
                                                    
                                                </td>
                                                <td class="d-flex">

                                                    <a href="/admin/view-post/{{$item->id}}" class="btn btn-success btn-sm mr-1">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <a href="/admin/edit-post/{{$item->id}}" class="btn btn-primary btn-sm mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="/admin/delete-post/{{$item->id}}" class="btn btn-danger btn-sm mr-1">
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