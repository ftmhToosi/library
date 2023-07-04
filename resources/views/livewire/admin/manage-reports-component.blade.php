<div>
    <div class="card">
        <div class="card-header header-elements-lg-inline">
            <h5 class="card-title">مدیریت گزارشات سامانه</h5>
        </div>

        <div class="nav-tabs-responsive bg-dark border-top shadow-none">
            <ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">
                <li class="nav-item"><a href="#course-overview" class="nav-link active" data-toggle="tab"><i
                            class="icon-menu7 mr-2"></i> کاربران چه کتاب هایی قرض گرفته اند.</a></li>
                <li class="nav-item"><a href="#course-attendees" class="nav-link" data-toggle="tab"><i
                            class="icon-people mr-2"></i> چه کتاب هایی قرض گرفته شده</a></li>
                <li class="nav-item"><a href="#course-count" class="nav-link" data-toggle="tab"><i
                            class="icon-address-book2 mr-2"></i> تعداد کتاب های قرض گرفته شده</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="course-overview">
                <div class="card-body">
                    @can('create_book')
                    <livewire:admin.reports-show-component/>
                    @else
                        <div style="color: red">
                            no access</div>
                    @endcan
                </div>

            </div>

            <div class="tab-pane fade" id="course-attendees">
                <div class="card-body">
                    @can('create_book')
                        <livewire:admin.report-books-show-component/>
                    @else
                        <div style="color: red">
                            no access</div>
                    @endcan

                </div>
            </div>
            <div class="tab-pane fade" id="course-count">
                <div class="card-body">
                    @can('create_book')
                    <livewire:admin.report-books-count-component/>
                    @else
                        <div style="color: red">
                            no access</div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
