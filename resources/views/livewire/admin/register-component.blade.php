<div>
    <form wire:submit.prevent="submit" method="post">
        <ul class="media-list media-list-linked">
            <li class="media bg-light py-2">
                <div class="col-md-2">
                    <label class="col-form-label">
                        نام :
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
                        ایمیل :
                    </label>
                </div>
                <div class="col-lg-10">
                    <input type="email" wire:model="email" class="form-control"/>
                    @error('email')
                    <span class="badge d-block badge-danger form-text text-left">
                               {{ $message }}
                            </span>
                    @enderror
                </div>
            </li><li class="media bg-light py-2">
                <div class="col-md-2">
                    <label class="col-form-label">
                        رمز عبور :
                    </label>
                </div>
                <div class="col-lg-10">
                    <input type="text" wire:model="password" class="form-control"/>
                    @error('password')
                    <span class="badge d-block badge-danger form-text text-left">
                               {{ $message }}
                            </span>
                    @enderror
                </div>
            </li>
        </ul>
        <div class="text-right py-4">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-primary">ثبت نام</button>
{{--                <a href="{{route('login')}}" class="btn btn-primary "--}}
{{--                   tabindex="-1" role="button"--}}
{{--                   aria-disabled="true">ورود</a>--}}
            </div>
        </div>
    </form>
    @dd(redirect()->getUrlGenerator()->previous())
    @if(url()->previous() == "http://192.168.8.14:8000/admin/login")
        <div class="form-group text-center text-muted content-divider">
            <span class="px-2">وارد حساب خود شوید</span>
        </div>
        <div class="form-group">

            <a href="{{route('login_admin')}}" class="btn btn-light btn-block">ورود</a>
        </div>
    @elseif(url()->previous() == "http://192.168.8.14:8000/login")
        <div class="form-group text-center text-muted content-divider">
            <span class="px-2">وارد حساب خود شوید</span>
        </div>
        <div class="form-group">

            <a href="{{route('login')}}" class="btn btn-light btn-block">ورود</a>
        </div>
    @endif

{{--    <div class="form-group text-center text-muted content-divider">--}}
{{--        <span class="px-2">وارد حساب خود شوید</span>--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}

{{--        <a href="{{route('login')}}" class="btn btn-light btn-block">ورود</a>--}}
{{--    </div>--}}


    <div wire:ignore.self class="modal fade" id="modal-notification" tabindex="-1" aria-labelledby="modal-notification"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content my-modal">
                <div class="modal-body my-modal-body">
                    <div class="text-center">
                        <img src="{{asset('images/success.png')}}" width="100px">
                    </div>
                    <p class="text-center m-0 mt-3">
                        دسته بندی در سامانه ایجاد شد
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


