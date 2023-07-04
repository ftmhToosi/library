<div>

    <table class="table datatable-basic">
        <thead>
        <tr>
            <th width="80%">عنوان دسته بندی</th>
            <th width="20%" class="text-center">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @if($groupings->count()>0)
            @foreach($groupings as $grouping)
                <tr>
                    <td>{{$grouping->title}}</td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="btn-group">
{{--                                @if(!auth()->user()->hasRole('SuperAdmin'))--}}
                                    @can('update_group')
                                        <button wire:click="open_edit_category_modal({{$grouping->id}})" type="button"
                                                class="btn btn-info">ویرایش با مدال
                                        </button>

                                        <a href="{{route('edit_category',$grouping->id)}}" class="btn btn-primary "
                                           tabindex="-1" role="button"
                                           aria-disabled="true">ویرایش</a>
                                    @endcan
                                    @can('delete_group')
                                        <button wire:click="open_delete_category_modal({{$grouping->id}})" type="button"
                                                class="btn btn-danger">حذف
                                        </button>
                                    @else
                                        <div style="color: red">
                                            no access
                                        </div>
                                    @endcan
{{--                                @else--}}
{{--                                    <button wire:click="open_edit_category_modal({{$grouping->id}})" type="button"--}}
{{--                                            class="btn btn-info">ویرایش با مدال--}}
{{--                                    </button>--}}

{{--                                    <a href="{{route('edit_category',$grouping->id)}}" class="btn btn-primary "--}}
{{--                                       tabindex="-1" role="button"--}}
{{--                                       aria-disabled="true">ویرایش</a>--}}

{{--                                    <button wire:click="open_delete_category_modal({{$grouping->id}})" type="button"--}}
{{--                                            class="btn btn-danger">حذف--}}
{{--                                    </button>--}}
{{--                                @endif--}}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div wire:ignore.self="" class="modal fade" id="modal-edit-category" tabindex="-1"
         aria-labelledby="modal-edit-category">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">ویرایش دسته بندی</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <livewire:admin.grouping-update-component/>

                {{--                <div class="modal-body my-modal-body px-3 p-0">--}}
                {{--                    <form wire:submit.prevent="submit" method="POST">--}}
                {{--                        <ul class="media-list media-list-linked">--}}
                {{--                            <li class="media bg-light py-2">--}}
                {{--                                <div class="col-md-3">--}}
                {{--                                    <label class="col-form-label">--}}
                {{--                                        عنوان دسته بندی :--}}
                {{--                                    </label>--}}
                {{--                                </div>--}}
                {{--                                <div class="col-lg-9">--}}
                {{--                                    <input type="text" wire:model="title" id="title" class="form-control">--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                        <div class="text-left py-2">--}}
                {{--                            <div class="btn-group" role="group">--}}
                {{--                                <button type="submit" class="btn btn-primary">ویرایش دسته بندی</button>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </form>--}}
                {{--                </div>--}}
                {{--                <div class="modal-footer my-modal-footer">--}}
                {{--                    <button type="button" class="btn btn-link" data-dismiss="modal">--}}
                {{--                        بستن--}}
                {{--                    </button>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
    <div wire:ignore.self="" class="modal fade" id="modal-delete-category" tabindex="-1"
         aria-labelledby="modal-delete-category">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">حذف دسته بندی (<span class="text-danger-800"
                                                                 id="title_delete"></span>)</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body my-modal-body px-3 pt-1">
                    <div
                        class="alert alert-danger alert-dismissible alert-styled-left border-top-0 border-bottom-0 border-right-0">
                        در صورت حذف، تمامی پستهای مربوط به این دسته بندی حذف خواهند شد
                    </div>
                    آیا مایل هستید این دسته بندی را از سامانه حذف کنید؟
                </div>
                <div class="modal-footer my-modal-footer">
                    <div class="text-left py-2">
                        <div class="btn-group" role="group">
                            <a wire:click="delete_category" class="btn btn-danger" style="cursor: pointer">حذف
                                دسته بندی</a>
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
        let g_delete_modal = new bootstrap.Modal(document.getElementById('modal-delete-category'));
        let g_notification = new bootstrap.Modal(document.getElementById('modal-notification'));

        let g_edit_modal = new bootstrap.Modal(document.getElementById('modal-edit-category'));


        window.addEventListener('show-delete', data => {
            g_delete_modal.show()
        })

        window.addEventListener('hide-delete', data => {
            g_delete_modal.hide()
        })

        window.addEventListener('show-edit', data => {
            g_edit_modal.show()
        })

        window.addEventListener('hide-edit', data => {
            g_edit_modal.hide()
        })

    </script>
@endpush
