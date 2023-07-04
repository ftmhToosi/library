<div>
    <div class="container text-center d-flex justify-content-center">
        {{--        <div class="card-group m-3">--}}

            <div class=" card m-3 text-center d-flex justify-content-center" style="width: 400px">
                <img src="/storage/{{$profiles->image??''}}" alt="">
                <div class="card-body">
                    <h5 class="card-title">نام: {{$profiles->name ?? ''}}</h5>
                    <p class="card-text">شماره موبایل: {{$profiles->phone ?? ''}}</p>
                    <p class="card-text">نام کاربری: {{$profiles->username ?? ''}}</p>
                    <p class="card-text text-muted">بیوگرافی: {{$profiles->bio ?? ''}}</p>
                    <div class="btn-group" role="group">
                        <button wire:click="open_edit_profile_modal({{$profiles->id}})" type="button"
                                class="btn btn-info">edit profile
                        </button>
                        <button wire:click="open_request_admin_modal({{$user->id}})" type="button"
                                class="btn btn-info">Request for admin
                        </button>
                        {{--                            <a href="#" class="btn btn-primary">ادیت</a>--}}
                    </div>
            </div>
        </div>

    </div>

    <div wire:ignore.self="" class="modal fade" id="modal-edit-profile" tabindex="-1"
         aria-labelledby="modal-edit-profile">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">ویرایش پروفایل</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <livewire:user.profile-update-component/>

            </div>
        </div>
    </div>

    <div wire:ignore.self="" class="modal fade" id="modal-request-admin" tabindex="-1"
         aria-labelledby="modal-request-admin">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">درخواست برای دسترسی ادمین</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <livewire:admin.message-component/>

            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        let edit_profile_modal = new bootstrap.Modal(document.getElementById('modal-edit-profile'));
        let request_modal = new bootstrap.Modal(document.getElementById('modal-request-admin'));



        // window.addEventListener('show-delete', data => {
        //     delete_modal.show()
        // })
        //
        // window.addEventListener('hide-delete', data => {
        //     delete_modal.hide()
        // })

        window.addEventListener('show-my-edit', data => {
            edit_profile_modal.show()
        })

        window.addEventListener('hide-edit', data => {
            edit_profile_modal.hide()
        })

        window.addEventListener('show-request', data => {
            request_modal.show()
        })

        window.addEventListener('hide-request', data => {
            request_modal.hide()
        })


    </script>
@endpush
