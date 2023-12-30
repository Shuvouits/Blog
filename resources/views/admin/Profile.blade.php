<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlogProject | User Profile</title>
    @include('admin.link')

    <style>
        img[src=''] {
            display: none;
        }
    </style>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.navbar')

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.sidebar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">



                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        @if($image==null)
                                        <img class="profile-user-img img-fluid img-circle" src="{{asset('/images/avater.png')}}" alt="User profile picture">
                                        <span><a href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-edit ml-2"></i></a></span>
                                        @else
                                        <img class="profile-user-img img-fluid img-circle" src="{{asset('/images/' .$image)}}" alt="User profile picture">
                                        <span><a href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-edit ml-2"></i></a></span>
                                        @endif
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Profile Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body">
                                                    <form action="/admin/profile-change" method="post" enctype="multipart/form-data">
                                                        {{@csrf_field()}}
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Profile Image</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile" onchange="loadFile(event)" required>
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                </div>

                                                            </div>

                                                            <input type="hidden" name="id" value="{{$id}}">

                                                            @error('image')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>

                                                </div>





                                                <div class="text-center">
                                                    <img src="" id="output" class="img-thumbnail" width="200px" height="200px">
                                                </div>




                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success"><i class="far fa-check-circle"></i> Update</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <h3 class="profile-username text-center">{{session()->get('name')}}</h3>

                                    <p class="text-muted text-center">Software Engineer</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">User Profile</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Change Password</a></li>

                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <form action='/admin/profile-post' method="post">
                                                {{@csrf_field()}}


                                                <input type="hidden" name="id" value="{{$id}}">

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="fname">First Name</label><span style="color: red;">*</span>
                                                                <input type="text" class="form-control" name="first_name" id="fname" placeholder="First Name" value="{{$first_name}}" required>
                                                                @error('first_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lname">Last Name</label><span style="color: red;">*</span>
                                                                <input type="text" class="form-control" name="last_name" id="lname" placeholder="Last Name" value="{{$last_name}}" required>
                                                                @error('last_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="uname">User Name</label><span style="color: red;">*</span>
                                                                <input type="text" class="form-control" name="user_name" id="uname" placeholder="Last Name" value="{{$name}}" required>
                                                                @error('user_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email</label><span style="color: red;">*</span>
                                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email.." value="{{$email}}" required>
                                                                @error('email')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="bio">Bio:</label>
                                                        <textarea class="form-control" rows="5" name="bio" id="bio" placeholder="Write Your Bio..........">{{$bio}}</textarea>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-success"><i class="far fa-check-circle"></i> Update</button>

                                                    </div>

                                                </div>


                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="timeline">

                                            <form action="/admin/change-password" method="post">
                                                {{@csrf_field()}}

                                                <input type="hidden" name="id" value="{{$id}}">

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="pass">password</label><span style="color: red;">*</span>
                                                                <input type="password" id="pass" class="form-control" name="password" required>
                                                                @error('password')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="cp">Confirm password</label><span style="color: red;">*</span>
                                                                <input type="password" class="form-control" id="cp" name="cpassword" required>
                                                                @error('cpassword')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-success"><i class="far fa-check-circle"></i> Update</button>

                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('admin.script')

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