<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <!-- /core JS files -->
@livewireStyles

</head>

<body>
<div class="page-content">

    <!-- Main sidebar -->
    @if(request()->route()->getName() !='register' && request()->route()->getName() !='login_admin')
{{--        @can('show_sidebar')--}}
        <livewire:admin.sidebar-component />
{{--        @endcan--}}
    @endif
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Main navbar -->
        <livewire:admin.navbar-component />
        <!-- /main navbar -->


        <!-- Inner content -->
        <div class="content-inner">

            <!-- Page header -->
            @if(request()->route()->getName() !='register' && request()->route()->getName() !='login_admin')
                @can('show_header')
                <livewire:admin.header-component />
                @endcan
            @endif
            <!-- /page header -->


            <!-- Content area -->
            <div class="content pt-0">

               @yield('content')

            </div>
            <!-- /content area -->


            <!-- Footer -->
            <livewire:admin.footer-component />
            <!-- /footer -->

        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->


<script src='{{asset("js/app.js")}}'></script>
<script src='{{asset("global_assets/js/demo_pages/dashboard.js")}}'></script>
@livewireScripts

@stack('scripts')
</body>
</html>

