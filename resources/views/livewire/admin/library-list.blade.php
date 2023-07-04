<div>
    <table class="table datatable-basic">
        <thead>
        <tr>
            <th width="10%">تصویر</th>
            <th width="10%">عنوان کتاب</th>
            <th width="10%">نویسنده</th>
            <th width="10%">توضیحات</th>
            <th width="20%">دسته بندی</th>
            <th width="20%" class="text-center">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @if($books->count()>0)
            @foreach($books as $book)
                <tr>
                    <td>
                        <img src="/storage/{{$book->image}}" class=" rounded-circle" alt="" style="width: 50px">
                    </td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->writer}}</td>
                    <td>{{$book->description}}</td>
                    <td>
                        <ol>
                    @foreach($book->group as $group)
                        <li>
                            {{$group->title ?? 'no title'}}
                        </li>
                    @endforeach
                        </ol>
                    </td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="btn-group">
                                @can('update_book')
                                <button wire:click="open_edit_book_modal({{$book->id}})" type="button"
                                        class="btn btn-info">ویرایش با مدال
                                </button>

                                <a href="{{route('edit_book',$book->id)}}" class="btn btn-primary "
                                   tabindex="-1" role="button"
                                   aria-disabled="true">ویرایش</a>
                                @endcan

                                @can('delete_book')
                                <button wire:click="open_delete_book_modal({{$book->id}})" type="button"
                                        class="btn btn-danger">حذف
                                </button>
                                @else
                                    <div style="color: red">
                                        no access
                                    </div>

                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div wire:ignore.self="" class="modal fade" id="modal-edit-book" tabindex="-1"
         aria-labelledby="modal-edit-book">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">ویرایش کتاب</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <livewire:admin.book-update-component/>
{{--                <div class="modal-body my-modal-body px-3 p-0">--}}
{{--                    <form wire:submit.prevent="submit" method="POST">--}}
{{--                        <ul class="media-list media-list-linked">--}}
{{--                            <li class="media bg-light py-2">--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <label class="col-form-label">--}}
{{--                                        عنوان کتاب :--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-9">--}}
{{--                                    <input type="text" wire:model="title" id="title" class="form-control">--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="text-left py-2">--}}
{{--                            <div class="btn-group" role="group">--}}
{{--                                <button type="submit" class="btn btn-primary">ویرایش کتاب</button>--}}
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

    <div wire:ignore.self="" class="modal fade" id="modal-delete-book" tabindex="-1"
         aria-labelledby="modal-delete-book">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">حذف کتاب (<span class="text-danger-800"
                                                                 id="title_delete"></span>)</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body my-modal-body px-3 pt-1">
                    <div
                        class="alert alert-danger alert-dismissible alert-styled-left border-top-0 border-bottom-0 border-right-0">
                        در صورت حذف، تمامی پستهای مربوط به این کتاب حذف خواهند شد
                    </div>
                    آیا مایل هستید این کتاب را از سامانه حذف کنید؟
                </div>
                <div class="modal-footer my-modal-footer">
                    <div class="text-left py-2">
                        <div class="btn-group" role="group">
                            <a wire:click="delete_book" class="btn btn-danger" style="cursor: pointer">حذف
                                کتاب</a>
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
        let l_delete_modal = new bootstrap.Modal(document.getElementById('modal-delete-book'));
        //let notification = new bootstrap.Modal(document.getElementById('modal-notification'));

        let l_edit_modal = new bootstrap.Modal(document.getElementById('modal-edit-book'));


        window.addEventListener('show-delete', data => {
            l_delete_modal.show()
        })

        window.addEventListener('hide-delete', data => {
            l_delete_modal.hide()
        })

        window.addEventListener('show-edit', data => {
            l_edit_modal.show()
        })

        window.addEventListener('hide-edit', data => {
            l_edit_modal.hide()
        })

    </script>
@endpush
