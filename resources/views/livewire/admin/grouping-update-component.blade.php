<div>
    <form wire:submit.prevent="submit" method="post">
        <ul class="media-list media-list-linked">
            <li class="media bg-light py-2">
                <div class="col-md-2">
                    <label class="col-form-label">
                        عنوان دسته بندی :
                    </label>
                </div>
                <div class="col-lg-10">
                    <input type="text" wire:model="title" class="form-control"/>
                    @error('title')
                    <span class="badge d-block badge-danger form-text text-left">
                               {{ $message }}
                            </span>
                    @enderror
                </div>
            </li>
        </ul>
        <div class="text-right py-4">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-primary">ویرایش دسته بندی</button>
            </div>
        </div>
    </form>
    <div wire:ignore.self class="modal fade" id="modal-notification" tabindex="-1" aria-labelledby="modal-notification"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content my-modal">
                <div class="modal-body my-modal-body">
                    <div class="text-center">
                        <img src="{{asset('images/success.png')}}" width="100px">
                    </div>
                    <p class="text-center m-0 mt-3">
                        دسته بندی در سامانه ویرایش شد
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ URL::asset('global_assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        $('.select-search').on('change', function (e) {
            var data = $('.select-search').select2("val");
        @this.set('category_id', data);
        });
    </script>
@endpush


