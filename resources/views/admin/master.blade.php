<!doctype html>
<html lang="en" class="minimal-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('adminAsset') }}/assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('adminAsset') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('adminAsset') }}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{ asset('adminAsset') }}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminAsset') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('adminAsset') }}/assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="{{ asset('adminAsset') }}/assets/css/style.css" rel="stylesheet" />
    <link href="{{ asset('adminAsset') }}/assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminAsset') }}/assets/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('adminAsset') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <!-- loader-->
{{--    <link href="{{ asset('adminAsset') }}/assets/css/pace.min.css" rel="stylesheet" />--}}

<!--Theme Styles-->
    <link href="{{ asset('adminAsset') }}/assets/css/dark-theme.css" rel="stylesheet" />
    <link href="{{ asset('adminAsset') }}/assets/css/light-theme.css" rel="stylesheet" />
    <link href="{{ asset('adminAsset') }}/assets/css/semi-dark.css" rel="stylesheet" />
    <link href="{{ asset('adminAsset') }}/assets/css/header-colors.css" rel="stylesheet" />

    <title>Admin</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    @include('admin.include.header')
    <!--end top header-->

    <!--start sidebar -->
@include('admin.include.left-sidebar')
    <!--start sidebar -->

    <!--start content-->
    <main class="page-content">
    @yield('content')
    </main>
    <!--end page main-->

        <!--start switcher-->
    @include('admin.include.right-sidebar')
    <!--end switcher-->

</div>
<!--end wrapper-->


<!-- Bootstrap bundle JS -->
<script src="{{ asset('adminAsset') }}/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{ asset('adminAsset') }}/assets/js/jquery.min.js"></script>
<script src="{{ asset('adminAsset') }}/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ asset('adminAsset') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{ asset('adminAsset') }}/assets/js/pace.min.js"></script>
<script src="{{ asset('adminAsset') }}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('adminAsset') }}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('adminAsset') }}/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<!--app-->
<script src="{{ asset('adminAsset') }}/assets/js/app.js"></script>
<script src="{{ asset('adminAsset') }}/assets/js/index.js"></script>
<script src="{{ asset('adminAsset') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('adminAsset') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('adminAsset') }}/assets/js/table-datatable.js"></script>

<script>
    new PerfectScrollbar(".best-product")
    new PerfectScrollbar(".top-sellers-list")
</script>
<script>
    function checkCategoryName(){
         var category = $('#category').val();
         var regex =/^[a-z,A-Z, ]{3,15}$/;
         if(regex.test(category)){
             $('#errorMessage').html(' ');
             return true;
         } else{
           $('#errorMessage').html('You can use 3 to 15 characters only and cannot use hyphen and number');
           return false;
        }
    }
    $('#category').keyup(function(){
    var res= checkCategoryName();
        if(res == true){
            $('#catBtn').prop('disabled',false)
            return true;
        } else {
            $('#catBtn').prop('disabled',true)
            return false;
        }

    });
    $('#catForm').submit( function (){
        checkCategoryName();
        if(checkCategoryName() == true){
            return true;
        } else {
            return false;
        }
    });
</script>


</body>
</html>
