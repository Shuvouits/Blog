<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Read Mail</title>
    @include('admin.link')
    @include('admin.CustomStyle')
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
                            <h1>Compose</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Compose</li>
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
                            <a href="/admin/inbox" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Folders</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="nav nav-pills flex-column">
                                        <li class="nav-item active">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-inbox"></i> Inbox
                                                <span class="badge bg-primary float-right">12</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-envelope"></i> Sent
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file-alt"></i> Drafts
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-filter"></i> Junk
                                                <span class="badge bg-warning float-right">65</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-trash-alt"></i> Trash
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Read Mail</h3>

                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                                        <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="mailbox-read-info">
                                        <h5>{{$subject}}</h5>
                                        <br>
                                        <h6>From: {{$email}}
                                            <span class="mailbox-read-time float-right">{{ date('F', strtotime($created_at)) }} {{ date('d', strtotime($created_at)) }}, {{ date('Y', strtotime($created_at)) }}</span>
                                        </h6>
                                    </div>
                                    <!-- /.mailbox-read-info -->
                                    <div class="mailbox-controls with-border text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                                                <i class="fas fa-reply"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                        <!-- /.btn-group -->
                                        <button type="button" class="btn btn-default btn-sm" title="Print">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </div>
                                    <!-- /.mailbox-controls -->
                                    <div class="mailbox-read-message">
                                        {{$message}}
                                    </div>
                                    <!-- /.mailbox-read-message -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-white">
                                    <ul class="mailbox-attachments d-flex align-items-stretch clearfix">

                                       
                                       
                                        
                                    </ul>
                                </div>
                                <!-- /.card-footer -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                                        <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                                    </div>
                                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                                </div>
                                <!-- /.card-footer -->
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
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('admin.script')
</body>

</html>