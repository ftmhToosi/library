<div class="page-content">
    @if(auth()->check())
        <div class="sidebar sidebar-light sidebar-main sidebar-expand-lg">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-section sidebar-user my-1">
                    <div class="sidebar-section-body">
                        <div class="media">
                            <p>
                                <a href="{{route('show_profile')}}">
                                    <img src="/storage/{{$profile->image??''}}" class="rounded-circle mr-3" alt="">
                                </a></p>

                            <p>
                            <div class="media-body">
                                <a href="{{route('show_profile')}}" style="color: white">
                                    <div class="font-weight-semibold">{{$profile->name ?? ''}}</div>
                                </a>

                                <div class="font-size-sm line-height-sm opacity-50">
                                    Library user
                                    <br>
                                    <br>
                                    <br>
                                    @if($users->book->count()>0)
                                        @foreach($users->book as $user)
                                            {{--                                        @dd($user->id)--}}
                                            <button wire:click="open_return_book_modal({{$user->id}})" type="button"
                                                    class="btn">
                                                <div class="alert alert-light" role="alert"> شما کتاب
                                                    <strong>{{$user->name}}</strong> امانت گرفته اید.
                                                </div>
                                            </button>
                                        @endforeach
                                    @else
                                        <div class="alert alert-light" role="alert">شما کتابی امانت نگرفته اید.</div>
                                    @endif
                                </div>
                            </div>


                            <div class="ml-3 align-self-center">
                                <button type="button"
                                        class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                    <i class="icon-transmission"></i>
                                </button>

                                <button type="button"
                                        class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                                    <i class="icon-cross2"></i>
                                </button>
                            </div>

                        </div>


                    </div>
                </div>
                <!-- Main navigation -->

            </div>
        </div>
    @endif


    <div class="container text-center mr-3">
        <div class="card-group ml-3">
            <div class="row row-cols-5">
                @foreach($books as $book)
                    <div class=" card mr-3 ml-3 md-3">
                        @if(auth()->check())
                            <a href="{{route('show_book', $book->id)}}">
                                <img
                                    src="/storage/{{$book->image}}"
                                    alt="no picture"
                                    style="height: 230px"></a>

                            <div class="card-body">
                                <a href="{{route('show_book', $book->id)}}"><h5
                                        class="card-title" style="color: white">{{$book->name}}</h5></a>
                                @else
                                    <a href="{{route('login')}}">
                                        <img src="/storage/{{$book->image}}" alt="no picture" style="height: 230px"></a>

                                    <div class="card-body">
                                        <a href="{{'login'}}"><h5 class="card-title"
                                                                  style="color: white">{{$book->name}}</h5></a>
                                        @endif

                                        <p class="card-text">نویسنده: {{$book->writer}}</p>
                                        <p class="card-text"><small class="text-muted">{{$book->description}}</small>
                                        </p>
                                    </div>
                            </div>
                            @endforeach

                    </div>
            </div>
        </div>
        {{--        </div>--}}
        {{--    </div>--}}
    </div>


    <div wire:ignore.self="" class="modal fade" id="modal-return-book" tabindex="-1"
         aria-labelledby="modal-return-book">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">تحویل کتاب (<span class="text-danger-800"
                                                              id="title_delete"></span>)</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body my-modal-body px-3 pt-1">
                    <div
                        class="alert alert-danger alert-dismissible alert-styled-left border-top-0 border-bottom-0 border-right-0">
                        در صورت پس دادن، تمامی پستهای مربوط به این کتاب حذف خواهند شد
                    </div>
                    آیا مایل هستید این کتاب را به کتابخانه تحویل دهید؟
                </div>
                <div class="modal-footer my-modal-footer">
                    <div class="text-left py-2">
                        <div class="btn-group" role="group">
                            <a wire:click="open_return_book_modal({{$book->id}})" class="btn btn-danger"
                               style="cursor: pointer">تحویل
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

        let return_modal = new bootstrap.Modal(document.getElementById('modal-return-book'));


        window.addEventListener('show-return', data => {
            return_modal.show()
        })

        window.addEventListener('hide-return', data => {
            return_modal.hide()
        })

        window.addEventListener('show-edit', data => {
            edit_modal.show()
        })

        window.addEventListener('hide-edit', data => {
            edit_modal.hide()
        })

    </script>
@endpush
