<div>
    <table class="table datatable-basic">
        <thead>
        <tr>
            <th width="20%">نام کاربر</th>
            <th width="20%">ایمیل</th>
            <th width="20%">نقش</th>
            <th width="40%" class="text-center">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @if($users->count()>0)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @can('reade_message')
                    <td>{{$user->roles->first()->name??''}}</td>
                    @else
                        <td style="color: red">no access</td>
                    @endcan
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                <div class="dropdown-menu">
                                    @can('assign_admin')
                                    <button wire:click="open_assign_admin_modal({{$user->id}})" type="button"
                                            class="btn dropdown-item"><i class="icon-file-stats"></i>Assign admin
                                    </button>
                                    @endcan
                                    @can('expel_admin')
                                    <button wire:click="open_expel_admin_modal({{$user->id}})" type="button"
                                            class="btn dropdown-item"><i class="icon-file-text2"></i>Expel admin
                                    </button>
                                        @endcan
                                        @can('delete_user')
                                    <button wire:click="open_delete_user_modal({{$user->id}})" type="button"
                                            class="btn dropdown-item"><i class="icon-file-locked"></i>Delete user
                                    </button>
                                        @endcan
                                        @can('update_user')
                                    <button wire:click="open_edit_user_modal({{$user->id}})" type="button"
                                            class="btn dropdown-item"><i class="icon-file-text3"></i>Edit user
                                    </button>
                                        @else
                                            <div class="dropdown-item" style="color: red"><i class="icon-files-empty2"></i>no access</div>
                                        @endcan
{{--                                    <div class="dropdown-divider"></div>--}}
{{--                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>--}}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div wire:ignore.self="" class="modal fade" id="modal-edit-user" tabindex="-1"
         aria-labelledby="modal-edit-user">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">Edit user</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <livewire:admin.user-update-component/>

            </div>
        </div>
    </div>

    <div wire:ignore.self="" class="modal fade" id="modal-delete-user" tabindex="-1"
         aria-labelledby="modal-delete-user">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">Delete user (<span class="text-danger-800"
                                                            id="title_delete"></span>)</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body my-modal-body px-3 pt-1">
                    <div
                        class="alert alert-danger alert-dismissible alert-styled-left border-top-0 border-bottom-0 border-right-0">
                        در صورت حذف، تمامی فعالیت های مربوط به این کاربر حذف خواهند شد
                    </div>
                    آیا مایل هستید این کاربر را از سامانه حذف کنید؟
                </div>
                <div class="modal-footer my-modal-footer">
                    <div class="text-left py-2">
                        <div class="btn-group" role="group">
                            <a wire:click="delete_user" class="btn btn-danger" style="cursor: pointer">حذف
                                کاربر</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-link" data-dismiss="modal">
                        بستن
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore.self="" class="modal fade" id="modal-assign-admin" tabindex="-1"
         aria-labelledby="modal-assign-admin">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">Assign admin (<span class="text-danger-800"
                                                                id="title_delete"></span>)</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body my-modal-body px-3 pt-1">
                    <div
                        class="alert alert-danger alert-dismissible alert-styled-left border-top-0 border-bottom-0 border-right-0">
                        در صورت تایید، تمامی دسترسی های ادمین برای کاربر فعال میشود.
                    </div>
                    آیا مایل هستید این درخوست را تایید کنید؟
                </div>
                <div class="modal-footer my-modal-footer">
                    <div class="text-left py-2">
                        <div class="btn-group" role="group">
                            <a wire:click="assign" class="btn btn-info" style="cursor: pointer">تایید
                                درخواست</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-link" data-dismiss="modal">
                        بستن
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self="" class="modal fade" id="modal-expel-admin" tabindex="-1"
         aria-labelledby="modal-expel-admin">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">Expel admin (<span class="text-danger-800"
                                                                id="title_delete"></span>)</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body my-modal-body px-3 pt-1">
                    <div
                        class="alert alert-info alert-dismissible alert-styled-left border-top-0 border-bottom-0 border-right-0">
                        در صورت تایید، تمامی دسترسی های ادمین برای کاربر غیرفعال میشود.
                    </div>
                    آیا مایل هستید این ادمین را اخراج کنید؟
                </div>
                <div class="modal-footer my-modal-footer">
                    <div class="text-left py-2">
                        <div class="btn-group" role="group">
                            <a wire:click="expel" class="btn btn-danger" style="cursor: pointer">اخراج
                                ادمین</a>
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
        // let notification = new bootstrap.Modal(document.getElementById('modal-notification'));

        let u_edit_modal = new bootstrap.Modal(document.getElementById('modal-edit-user'));
        let assign_modal = new bootstrap.Modal(document.getElementById('modal-assign-admin'));
        let expel_modal = new bootstrap.Modal(document.getElementById('modal-expel-admin'));
        let u_delete_modal = new bootstrap.Modal(document.getElementById('modal-delete-user'));

        window.addEventListener('show-assign', data => {
            assign_modal.show()
        })

        window.addEventListener('hide-assign', data => {
            assign_modal.hide()
        })

        window.addEventListener('show-expel', data => {
            expel_modal.show()
        })

        window.addEventListener('hide-expel', data => {
            expel_modal.hide()
        })

        window.addEventListener('show-delete', data => {
            u_delete_modal.show()
        })

        window.addEventListener('hide-delete', data => {
            u_delete_modal.hide()
        })

        window.addEventListener('show-edit', data => {
            u_edit_modal.show()
        })

        window.addEventListener('hide-edit', data => {
            u_edit_modal.hide()
        })

    </script>
@endpush
