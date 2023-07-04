<div>
    <div class="card">
        <div class="card-header header-elements-lg-inline">
            <h5 class="card-title">مدیریت درخواست های سامانه</h5>
        </div>

        <div class="nav-tabs-responsive bg-dark border-top shadow-none">
            <ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">
                <li class="nav-item"><a href="#course-overview" class="nav-link active" data-toggle="tab"><i
                            class="icon-menu7 mr-2"></i> مدیریت درخواست های ایجاد شده</a></li>
{{--                <li class="nav-item"><a href="#course-attendees" class="nav-link" data-toggle="tab"><i--}}
{{--                            class="icon-people mr-2"></i> ایجاد کاربر جدید</a></li>--}}
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="course-overview">
                <div class="card-body">
                @can('reade_message')
                    <livewire:admin.show-message-component/>
                    @else
                    <div style="color: red">no access</div>
                    @endcan
                </div>

            </div>

{{--            <div class="tab-pane fade" id="course-attendees">--}}
{{--                <div class="card-body">--}}
{{--                    @can('create_book')--}}
{{--                        --}}{{--                        <livewire:admin.book-create-component/>--}}
{{--                    @else--}}
{{--                        <div style="color: red">--}}
{{--                            Unauthorized HTTP responses 401</div>--}}
{{--                    @endcan--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
