<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DOYOSE</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}" media="all">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        th{
            color: brown;
            text-align: center;
        }
        td{
            text-align: center;
        }

    </style>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
@include('layouts.partials.header')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('layouts.partials.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

    @include('layouts.partials.breadcrumb')
    <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
@include('layouts.partials.footer')
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/demo.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>


<script>
    {{--t???o thanh th??ng b??o trong 2s--}}
        @if(Session::has('message'))
        toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "positionClass": "toast-top-center"
    }


    var type = "{{ Session::get('alert-type', 'info') }}";
    console.log(type)
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
    $(document).ready(function() {

        // C???u h??nh c??c nh??n ph??n trang
        $('#example1').dataTable( {
            "aoColumnDefs": [
                { "bSortable": false, "aTargets": [ 1, 2, 3] },
            ],
            "language": {
                "sProcessing":   "??ang x??? l??...",
                "sLengthMenu":   "Xem _MENU_",
                "sZeroRecords":  "Kh??ng t??m th???y d??ng n??o ph?? h???p",
                "sInfo":         "T???ng s??? _TOTAL_ m???c",
                "sInfoEmpty":    "T???ng s??? 0 m???c",
                "sInfoFiltered": "(???????c l???c t??? _MAX_ m???c)",
                "sInfoPostFix":  "",

                "sSearch":       "T??m:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "?????u",
                    "sPrevious": "Tr?????c",
                    "sNext":     "Ti???p",
                    "sLast":     "Cu???i"
                }
            }
        } );

    } );

</script>
<script>
    $(document).ready(function() {

        // C???u h??nh c??c nh??n ph??n trang
        $('#example').dataTable( {
            "language": {
                "sProcessing":   "??ang x??? l??...",
                "sLengthMenu":   "Xem _MENU_",
                "sZeroRecords":  "Kh??ng t??m th???y d??ng n??o ph?? h???p",
                "sInfo":         "T???ng s??? _TOTAL_ m???c",
                "sInfoEmpty":    "T???ng s??? 0 m???c",
                "sInfoFiltered": "(???????c l???c t??? _MAX_ m???c)",
                "sInfoPostFix":  "",

                "sSearch":       "T??m:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "?????u",
                    "sPrevious": "Tr?????c",
                    "sNext":     "Ti???p",
                    "sLast":     "Cu???i"
                }
            }
        } );

    } );
</script>
<script>
    $("#modal-admin-action-edit").on("show.bs.modal", function(e) {
        var link = $(e.relatedTarget);
        $(this).find(".modal-body").load(link.attr("href"));
    });
</script>
<script>
    $("#modal-admin-action-user").on("show.bs.modal", function(e) {
        var link = $(e.relatedTarget);
        $(this).find(".modal-body").load(link.attr("href"));
    });
</script>


</body>
</html>
