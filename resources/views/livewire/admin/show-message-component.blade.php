<div>
    <table class="table datatable-basic">
        <thead>
        <tr>
            <th width="20%">خوانده شده</th>
            <th width="30%">نام کاربر</th>
            <th width="30%">ایمیل کاربر</th>
            <th width="20%">عملیات</th>

        </tr>
        </thead>
        <tbody>
        @if($mes->count()>0)
            @foreach($mes as $m)
                <tr>
                    <td><div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
{{--                        @if(id='flexCheckDefault' === 'checked')--}}
{{--                            @dd('fkkds')--}}
{{--                            @endif--}}
                        </div></td>
                    <td>{{$m->user->name}}</td>
                     <td><a href="{{route('manage_user')}}" style="color: white">{{$m->user->email}}</a></td>
                    <td class="text-center">
                        <div class="list-icons">

                                @can('delete_message')
                                    <button wire:click="open_delete_message_modal({{$m->id}})" type="button"
                                            class="btn btn-danger">Delete
                                    </button>
                                @else
                                    <div style="color: red">
                                        no access
                                    </div>
                                @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div wire:ignore.self="" class="modal fade" id="modal-delete-message" tabindex="-1"
         aria-labelledby="modal-delete-message">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">حذف درخواست (<span class="text-danger-800"
                                                            id="title_delete"></span>)</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body my-modal-body px-3 pt-1">
{{--                    <div--}}
{{--                        class="alert alert-danger alert-dismissible alert-styled-left border-top-0 border-bottom-0 border-right-0">--}}
{{--                        در صورت حذف، تمامی پستهای مربوط به این کتاب حذف خواهند شد--}}
{{--                    </div>--}}
                    آیا مایل هستید این درخواست را از سامانه حذف کنید؟
                </div>
                <div class="modal-footer my-modal-footer">
                    <div class="text-left py-2">
                        <div class="btn-group" role="group">
                            <a wire:click="delete_message" class="btn btn-danger" style="cursor: pointer">حذف
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

</div>
@push('scripts')
    <script src="{{ URL::asset('global_assets/js/select2/dist/js/select2.js')}}"></script>
    <script src="{{ URL::asset('global_assets/js/demo_pages/form_select2.js')}}"></script>
    <script src="{{ URL::asset('global_assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script>
        let s_delete_modal = new bootstrap.Modal(document.getElementById('modal-delete-message'));
        // let notification = new bootstrap.Modal(document.getElementById('modal-notification'));



        window.addEventListener('show-delete', data => {
            s_delete_modal.show()
        })

        window.addEventListener('hide-delete', data => {
            s_delete_modal.hide()
        })


    </script>
@endpush
