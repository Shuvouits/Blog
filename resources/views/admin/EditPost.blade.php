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
    <style>
        img[src=''] {
            display: none;
        }
    </style>



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
                            <h1 class="m-0 text-dark">Edit Post</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Post List</li>
                                <li class="breadcrumb-item active">Edit Post</li>
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
                                        <h3 class="card-title">Edit Post</h3>
                                        <a href="/admin/post" class="btn btn-primary">Go Back to Post List</a>
                                    </div>

                                </div>

                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="col-lg-8 offset-lg-2">
                                        <form action="/admin/edit-post" method="post" enctype="multipart/form-data">
                                            {{@csrf_field()}}
                                            <div class="card-body">

                                                <input type="hidden" name="post_id" value="{{$id}}">
                                                <div class="form-group">
                                                    <label for="post_title">Post Title</label>
                                                    <input type="text" class="form-control" id="post_title" name='post_title' placeholder="Enter Title" value="{{$post_title}}" required>
                                                    @error('post_title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="category">Select Category</label>
                                                            <select name="category" class="form-control" id="category" required>

                                                                @foreach($category_data as $item)
                                                                @if($item->id == $category_id)
                                                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                                                @else
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>

                                                            @error('category')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                  
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="featured">Select Featured</label>
                                                            <select name="featured" class="form-control" id="featured" required>
                                                             
                                                                

                                                                @if($featured=='Yes')
                                                                <option value="Yes" selected>Yes</option>
                                                                <option value="No">No</option>
                                                                @else
                                                                <option value="No" selected>No</option>
                                                                <option value="Yes">Yes</option>
                                                                @endif
                                                               

                                                              
                                                                
                                                                
                                                                
                                                            </select>

                                                           

                                                        </div>

                                                    </div>
                                                </div>





                                                <div class="form-group">
                                                    @foreach($tag_data as $tag)

                                                    <div class="custom-control custom-checkbox">

                                                        <input class="custom-control-input" name="tag[]" type='checkbox' id="tag{{$tag->id}}" value="{{$tag->id}}" @foreach($tag_post_data as $tag_post) @if($tag_post->tag_id == $tag->id)
                                                        checked
                                                        @endif
                                                        @endforeach

                                                        >
                                                        <label for="tag{{$tag->id}}" class="custom-control-label">{{$tag->name}}</label>


                                                    </div>

                                                    @endforeach

                                                    @error('tag')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror








                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">File input</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile" onchange="loadFile(event)">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                </div>

                                                            </div>

                                                            @error('image')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Date:</label>
                                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                <input type="text" class="form-control datetimepicker-input" name="posting_date" value="{{$posting_date}}" data-target="#reservationdate">
                                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div>
                                                    <img src="{{asset('images/'.$post_image)}}" class="img-thumbnail" id="output" width="510" height="200">

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="category">Select Author</label>
                                                            <select name="author_name" class="form-control" id="author">
                                                                <option value="" selected style="display: none;">--Select Author--</option>
                                                                @foreach($all_author as $item)

                                                                @if($author_name == $item->name)
                                                                <option value="{{$author_name}}" selected>{{$author_name}}</option>
                                                                @else
                                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                                @endif
                                                                @endforeach


                                                            </select>

                                                            @error('author_name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="permalink">Permalink</label>
                                                            <input type="text" class="form-control" id="permalink" name='permalink' value="{{$permalink}}" placeholder="using slug" required>

                                                            @error('permalink')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                </div>









                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea id="description" class="textarea" rows='4' name="post_description" class="form-control" placeholder="Post Description" required>
                                                    {{$post_description}}
                                                    </textarea>
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

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</body>

</html>