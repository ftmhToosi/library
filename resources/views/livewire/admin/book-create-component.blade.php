<div>
    <form wire:submit.prevent="submit" method="post">
        <ul class="media-list media-list-linked">
            <li class="media bg-light py-2">
                <div class="col-md-2">
                    <label class="col-form-label">
                        نام کتاب :
                    </label>
                </div>
                <div class="col-lg-10">
                    <input type="text" wire:model="name" class="form-control"/>
                    @error('name')
                    <span class="badge d-block badge-danger form-text text-left">
                               {{ $message }}
                            </span>
                    @enderror
                </div>
            </li>
            <li class="media bg-light py-2">
                <div class="col-md-2">
                    <label class="col-form-label">
                        نویسنده :
                    </label>
                </div>
                <div class="col-lg-10">
                    <input type="text" wire:model="writer" class="form-control"/>
                    @error('writer')
                    <span class="badge d-block badge-danger form-text text-left">
                               {{ $message }}
                            </span>
                    @enderror
                </div>
            </li>
            <li class="media bg-light py-2">
                <div class="col-md-2">
                    <label class="col-form-label">
                        توضیحات :
                    </label>
                </div>
                <div class="col-lg-10">
                    <input type="text" wire:model="description" class="form-control"/>
                    @error('description')
                    <span class="badge d-block badge-danger form-text text-left">
                               {{ $message }}
                            </span>
                    @enderror
                </div>
            </li>
            <li class="media bg-light py-2">
                <div class="col-md-2">
                    <label class="col-form-label">
                        دسته بندی:
                    </label>
                </div>
                <div wire:ignore class="col-lg-10">
                    <div class="form-group" data-select2-id="191">
                        <select multiple="" id="categories" class="form-control select select2-hidden-accessible"
                                data-fouc=""
                                data-select2-id="13" tabindex="-1" aria-hidden="true">
                            <optgroup label="دسته بندی ها" data-select2-id="202">
                                @foreach ($groups as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </optgroup>
                            {{--                            <optgroup label="Central Time Zone" data-select2-id="206">--}}
                            {{--                                <option value="AL" data-select2-id="207">Alabama</option>--}}
                            {{--                                <option value="IA" selected="" data-select2-id="16">Iowa</option>--}}
                            {{--                                <option value="KS" selected="" data-select2-id="17">Kansas</option>--}}
                            {{--                                <option value="KY" data-select2-id="208">Kentucky</option>--}}
                            {{--                            </optgroup>--}}
                        </select>
                    </div>
                </div>
            </li>
            <li class="media bg-light py-2">
                <div class="col-md-12 pl-0">
                    <div class="media m-0 p-0">
                        <div class="col-md-3">
                            @if($image!=null)
                                <img class="rounded-circle m-0 p-0"
                                     src="{{ $image->temporaryUrl() }}"
                                     width="180" height="180">
                            @else
                                <img class="rounded-circle m-0 p-0"
                                     src="{{ asset('/images/not-image.png') }}"
                                     width="180" height="180">
                                <br/>
                                <div class="text-center">
                                    عکسی انتخاب نشده است
                                </div>
                            @endif
                        </div>
                        <div class="media-body">
                            <label class="display-block py-3">تصویر کتاب:</label>
                            <div class="uniform-uploader">
                                <input wire:model="image" type="file" class="form-input-styled"
                                       name="avatar_path" id="avatar"
                                       accept="image/png, image/jpeg, image/png">
                                <span class="filename" style="user-select: none;">
                                فایل عکسی انتخاب نشده است
                                </span>
                                <span class="action btn bg-pink-400" style="user-select: none;">
                                    انتخاب فایل
                                </span>
                            </div>

                            @error('image')
                            <span class="badge d-block badge-danger form-text text-left">
                                   {{ $message }}
                                </span>
                            @enderror

                            <ul class=" py-3">
                                <li>
                                    <span class="help-block">
                                        فرمتهایی که پیشتیابی می شود عبارتند از: png - .jpeg - .jpg.
                                    </span>
                                </li>
                                <li>
                                    <span class="help-block d-block">
                                        حداکثر حجم فایل میبایست کمتر از 512 کیلوبایت، حداقل ابعاد تصویر 512x512 و حداکثر 1024x1024 باید باشد
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="text-right py-4">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-primary">ایجاد کتاب جدید</button>
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
                        کتاب در سامانه ایجاد شد
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('global_assets/js/select2/dist/js/select2.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_select2.js')}}"></script>
    <script src="{{ asset('global_assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

    <script>
        $('#categories').on('change', function (e) {
            console.log('asdasdsa');
            var data = $('#categories').select2("val");
            console.log(data);
        @this.set('grouping_id', data);
        });
    </script>
@endpush


