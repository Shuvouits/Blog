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

    <title>Blog | Dashboard</title>

    @include('admin.Link')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
        <div class="content-wrapper" style="min-height: 266px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$post_count}}</h3>

                                    <p>Total Post</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="/admin/post" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$category_count}}</h3>

                                    <p>Total Category</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="/admin/category" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$user_count}}</h3>

                                    <p>Total User</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$author_count}}</h3>

                                    <p>All Author List</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="/admin/author" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">


                        <div class="col-md-12">
                            <!-- Application buttons -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Site Analytics</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="info-box">
                                                <div class="info-box-icon bg-yellow-casablanca font-white">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Sessions</span>
                                                    <span class="info-box-number" id="sessions_total">2,219</span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="info-box">
                                                <div class="info-box-icon bg-blue">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Visitors</span>
                                                    <span class="info-box-number" id="users_total">1,848</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="info-box border-green-haze">
                                                <div class="info-box-icon bg-green-haze font-white">
                                                    <i class="fad fa-traffic-cone"></i>
                                                </div>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Pageviews</span>
                                                    <span class="info-box-number" id="page_views_total">4,018</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="info-box">
                                                <div class="info-box-icon bg-yellow">
                                                    <i class="icon-energy"></i>
                                                </div>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Bounce Rate</span>
                                                    <span class="info-box-number" id="bounce_rate_total">75.71%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="info-box">
                                                <div class="info-box-icon bg-purple">
                                                    <i class="fas fa-chart-pie"></i>
                                                </div>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Percent new session</span>
                                                    <span class="info-box-number" id="percent_new_session_total">37.54%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="info-box">
                                                <div class="info-box-icon bg-yellow-crusta font-white">
                                                    <i class="icon-graph"></i>
                                                </div>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Pages/Session</span>
                                                    <span class="info-box-number" id="page_views_per_visit_total">1.81</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="info-box">
                                                <div class="info-box-icon bg-red">
                                                    <i class="fa fa-clock"></i>
                                                </div>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Avg. Duration</span>
                                                    <span class="info-box-number" id="session_duration_total">00:01:46</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="info-box">
                                                <div class="info-box-icon bg-yellow-casablanca">
                                                    <i class="fa fa-user-plus"></i>
                                                </div>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">New visitors</span>
                                                    <span class="info-box-number" id="session_duration_total">833</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>






                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Top Most Visited Page</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>URL</th>
                                                <th>VIEWS</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($all_post as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td><a href="/{{$item->permalink}}" target="_blank">{{$item->permalink}}</a></td>
                                                
                                                <td><span class="badge bg-danger">{{$item->read_count}}</span> (Views)</td>
                                            </tr>
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Top Browsers</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>BROWSER</th>
                                                <th>SESSION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($all_browser as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>

                                                <td><span class="badge bg-danger">{{$item->count}}</span> (Sessions)</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>




                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->




    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    @include('admin.Script')

    <script>
        var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
        var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 6,
                            max: 16
                        }
                    }],
                }
            }
        });
    </script>

</body>

</html>