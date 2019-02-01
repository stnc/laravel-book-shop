<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! HTML::style('Admin/bootstrap/css/bootstrap.min.css') !!}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    @yield('style')


            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini {!! isset($sidebar_collapse)?'sidebar-collapse':'' !!}">
<div class="wrapper">
    @if(!isset($hide_header))
    @include('Admin.header')

    @endif

    @if(!isset($hide_sidebar))
    @include('Admin.sidebar')
    @endif
            <!-- Content Wrapper. Contains page content -->
    <div class="{{isset($hide_content_wrapper_class)?'':'content-wrapper'}}">
        <!-- Content Header (Page header) -->
        {{--        @if(!isset($hide_breadcrumb))--}}
        {{--            @include('Admin.breadcrumb')--}}
        {{--@endif--}}

        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('Admin.footer')

    @include('Admin.right_sidebar')
</div>
<!-- ./wrapper -->


{!! HTML::script('Admin/plugins/jQuery/jquery-2.2.3.min.js') !!}
{!! HTML::script('Admin/bootstrap/js/bootstrap.min.js') !!}
{!! HTML::script('Admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! HTML::script('Admin/plugins/fastclick/fastclick.js') !!}
{!! HTML::script('Admin/dist/js/app.min.js') !!}
{!! HTML::script('Admin/dist/js/demo.js') !!}

<script>


    function send(url, data, method) {
        method = method || "POST";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        return $.ajax({
            url: url,
            data: data,
            method: method
        });
    }


    function deletephoto(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var url = "{{url('admin/image')}}/" + id;
        var data = {'ad': 'awd'};
        send(url, data, 'delete');

    }




    function increaseElement(selector) {
        clo = $(selector).first().clone().removeClass('hide');
        $(selector).last().after(clo[0].outerHTML);
    }

    function openKCFinder_singleFile(type, obj) {

        type = type.toLowerCase() || null;
        window.myInput = obj;

        var popupWindowOptions = [
            'location=no',
            'menubar=no',
            'toolbar=no',
            'dependent=yes',
            'minimizable=no',
            'modal=yes',
            'alwaysRaised=yes',
            'resizable=yes',
            'scrollbars=yes',
            'width=800',
            'height=600'
        ].join(',');

        window.KCFinder = {};
        window.KCFinder.callBack = function (url) {
            // Actions with url parameter here
            window.myInput.value = url;
            window.KCFinder = null;
        };
        window.open('/kcfinder/browse.php?lang=tr' + (type == null ? null : '&type=' + type), 'kcfinder_single', popupWindowOptions);
    }
</script>


@stack('script')


</body>
</html>
