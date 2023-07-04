<div>
    <div class="sidebar sidebar-light sidebar-main sidebar-expand-lg">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- User menu -->
            <div class="sidebar-section sidebar-user my-1">
                <div class="sidebar-section-body">
                    <div class="media">
                        @if(auth()->check())
                            @if(!auth()->user()->hasRole('SuperAdmin'))
                            @can('show_sidebar')
                            <a href="#" class="mr-3">
                                <img src="{{asset('admin.jpg')}}" class="rounded-circle" alt="">
                            </a>
                                @endcan
                            @elseif(auth()->user()->hasRole('SuperAdmin'))
                                <a href="#" class="mr-3">
                                <img src="{{asset('superAdmin.png')}}" class="rounded-circle" alt="">
                                </a>
                            @endif
                        @endif

                        <div class="media-body">
                            @if(auth()->check())
                                @if(!auth()->user()->hasRole('SuperAdmin'))
                                    @can('show_sidebar')
                                <div class="font-weight-semibold">{{$user->name ?? ''}}</div>
                                <div class="font-size-sm line-height-sm opacity-50">
                                    Admin
                                </div>
                                @endcan
                                @elseif(auth()->user()->hasRole('SuperAdmin'))
                                    <div class="font-weight-semibold">{{$user->name ?? ''}}</div>
                                    <div class="font-size-sm line-height-sm opacity-50">
                                        Super Admin
                                    </div>
                                @endif
                            @endif

                        </div>

                        <div class="ml-3 align-self-center">
                            <button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                <i class="icon-transmission"></i>
                            </button>

                            <button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                                <i class="icon-cross2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /user menu -->


            <!-- Main navigation -->
            <div class="sidebar-section">
                <ul class="nav nav-sidebar" data-nav-type="accordion">

                    <!-- Main -->
                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                    <li class="nav-item">

                    </li>
                    <li class="nav-item nav-item-submenu">
{{--                        @if(auth()->check())--}}
                        <a href="#" class="nav-link"><i class="icon-copy"></i> <span>کتابخانه</span></a>
{{--                        @else--}}
{{--                            <a href="{{route('login_admin')}}" class="nav-link"><i class="icon-copy"></i> <span>کتابخانه</span></a>--}}
{{--                        @endif--}}
                        <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                            @if(auth()->check())
                            <li class="nav-item"><a href="{{route('manage_grouping')}}" class="nav-link active">مدیریت دسته بندی</a></li>
                            <li class="nav-item"><a href="{{route('manage-library')}}" class="nav-link active">مدیریت کتاب</a></li>
                            <li class="nav-item"><a href="{{route('manage_user')}}" class="nav-link active">مدیریت کاربر</a></li>
                            <li class="nav-item"><a href="{{route('manage_message')}}" class="nav-link active">مدیریت پیام</a></li>
                            <li class="nav-item"><a href="{{route('manage_reports')}}" class="nav-link active">مدیریت گزارشات</a></li>
                            @else
                                <li class="nav-item"><a href="{{route('login_admin')}}" class="nav-link active">مدیریت دسته بندی</a></li>
                                <li class="nav-item"><a href="{{route('login_admin')}}" class="nav-link active">مدیریت کتاب</a></li>
                                <li class="nav-item"><a href="{{route('login_admin')}}" class="nav-link active">مدیریت کاربر</a></li>
                                <li class="nav-item"><a href="{{route('login_admin')}}" class="nav-link active">مدیریت پیام</a></li>
                                <li class="nav-item"><a href="{{route('login_admin')}}" class="nav-link active">مدیریت گزارشات</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /main navigation -->

        </div>
        <!-- /sidebar content -->

    </div>
</div>
