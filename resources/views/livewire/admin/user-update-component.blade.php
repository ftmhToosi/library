<div>
    <form wire:submit.prevent="submit" method="post">
        <ul class="media-list media-list-linked">
            <li class="media bg-light py-2">
                <div class="col-md-2">
                    <label class="col-form-label">
                        نام کاربر :
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
            </li>

            <li class="media bg-light py-2">
                <div class="col-md-2">
                    <label class="col-form-label">
                        رمز :
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
                <button type="submit" class="btn btn-primary">ویرایش کاربر</button>
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
                        کاربر در سامانه ویرایش شد
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
        $('#edit_categories').on('change', function (e) {
            console.log('asdasdsa');
            var data = $('#edit_categories').select2("val");
            console.log(data);
        @this.set('grouping_id', data);
        });
    </script>
@endpush


