<div>
    <div class="page-header">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-right6 mr-2"></i>Panel Admin</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none mb-3 mb-lg-0">
                <div class="d-flex justify-content-center">
                    <span>
                        @if(auth()->check())
                            <button wire:click="open_logout_admin_modal({{$user->id ?? ''}})" type="button"
                                    class="btn btn-danger">logout
                        </button>
                        @else
                            <div class="btn-group" role="group">
                                <a href="{{route('register')}}" class="btn btn-secondary" tabindex="-1" role="button"
                                   aria-disabled="true">ثبت نام</a>
                               <a href="{{route('login_admin')}}" class="btn btn-secondary" tabindex="-1" role="button"
                                  aria-disabled="true">ورود</a>
                            </div>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self="" class="modal fade" id="modal-logout-admin" tabindex="-1"
         aria-labelledby="modal-logout-admin">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">خروج از حساب کاربری (<span class="text-danger-800"
                                                                       id="title_delete"></span>)</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body my-modal-body px-3 pt-1">
                    <div
                        class="alert alert-danger alert-dismissible alert-styled-left border-top-0 border-bottom-0 border-right-0">
                        در صورت خروج از حساب کاربری دسترسی های شما محدود میشود
                    </div>
                    آیا مایل هستید از حساب کاربری خود خارج شوید؟
                </div>
                <div class="modal-footer my-modal-footer">
                    <div class="text-left py-2">
                        <div class="btn-group" role="group">
                            <a wire:click="logout" class="btn btn-danger" style="cursor: pointer">خروج
                            </a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-link" data-dismiss="modal">
                        بستن
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ URL::asset('global_assets/js/select2/dist/js/select2.js')}}"></script>
    <script src="{{ URL::asset('global_assets/js/demo_pages/form_select2.js')}}"></script>
    <script src="{{ URL::asset('global_assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script>
        let logout = new bootstrap.Modal(document.getElementById('modal-logout-admin'));



        window.addEventListener('show-delete-admin', data => {
            logout.show()
        })

        // window.addEventListener('hide-delete', data => {
        //     delete_modal.hide()
        // })

        window.addEventListener('show-edit', data => {
            //h_edit_modal.show()
        })

        window.addEventListener('hide-edit', data => {
            //h_edit_modal.hide()
        })

    </script>
@endpush
