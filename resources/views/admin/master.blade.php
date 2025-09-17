<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title> @yield('title') | KMP </title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{asset('kmp_dash')}}/assets/images/favicon.ico">

    <!-- Dropzone css -->
    <link href="{{asset('kmp_dash')}}/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">

    <!-- Dropzone js -->
    <script src="{{asset('kmp_dash')}}/plugins/dropzone/dist/dropzone.js"></script>
    
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{asset('kmp_dash')}}/plugins/morris/morris.css">

    <link href="{{asset('kmp_dash')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('kmp_dash')}}/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('kmp_dash')}}/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{asset('kmp_dash')}}/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{asset('kmp_dash')}}/assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('kmp_dash')}}/assets/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        @include('admin.topbar')
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
         @include('admin.left_sidebar')
        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box"> 
                            <div class="d-flex justify-content-center"> 
                                @include('inc.messages')
                            </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <h4 class="page-title">@yield('title') </h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-right">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">KMP</a></li>
                                            <li class="breadcrumb-item active">@yield('title') </li>
                                        </ol>
                                    </div>
                                </div>
                                <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <!-- Home Content Start -->

                        @yield('content')      
                        
                        <!-- Home Content End -->

                    </div>
                    <!-- container-fluid -->
    
                </div>
                <!-- content -->
    
                @include('admin.footer')
    
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{asset('kmp_dash')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('kmp_dash')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('kmp_dash')}}/assets/js/metismenu.min.js"></script>
    <script src="{{asset('kmp_dash')}}/assets/js/jquery.slimscroll.js"></script>
    <script src="{{asset('kmp_dash')}}/assets/js/waves.min.js"></script>
   
    

    <!--Morris Chart-->
    <script src="{{asset('kmp_dash')}}/plugins/morris/morris.min.js"></script>
    <script src="{{asset('kmp_dash')}}/plugins/raphael/raphael.min.js"></script>

    <script src="{{asset('kmp_dash')}}/assets/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{asset('kmp_dash')}}/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('kmp_dash')}}/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('kmp_dash')}}/assets/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('kmp_dash')}}/assets/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('kmp_dash')}}/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        
            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });
        
            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        } );
    </script>
    <script>
        var table2 = $('#table2').DataTable({
        paging: true,
        select: {
            style: 'single'
        },
        columnDefs: [
            {
                targets:[0,1,2,3],
                orderable: true,
                searchable: true
            }
        ]
 
    });
    </script>
    

</body>



</html>