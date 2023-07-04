<div>
    <div class="container text-center d-flex justify-content-center">
        {{--        <div class="card-group m-3">--}}

        <div class=" card m-3 text-center d-flex justify-content-center" style="width: 400px">
            <img src="/storage/{{$book->image??''}}" alt="" style="height: 450px">
            <div class="card-body">
                <h5 class="card-title"> {{$book->name}}</h5>
                <p class="card-text">نویسنده: {{$book->writer}}</p>
                <p class="card-text"> {{$book->description}}</p>
                <p class="card-text text-muted">
                @foreach($book->group as $item)
                    <li>
                        {{$item->title ?? 'no title'}}
                    </li>
                @endforeach
            </p>


                    <div class="btn-group" role="group">
                        <button wire:click="open_borrow_modal({{$book->id}})" type="button"
                                class="btn btn-info">امانت گرفتن
                        </button>
                    </div>
            </div>
        </div>

    </div>

    <div wire:ignore.self="" class="modal fade" id="modal-borrow" tabindex="-1"
         aria-labelledby="modal-borrow">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content my-modal">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">امانت گرفتن</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <livewire:user.borrow-component/>

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


        let b_edit_modal = new bootstrap.Modal(document.getElementById('modal-borrow'));


        // window.addEventListener('show-delete', data => {
        //     delete_modal.show()
        // })
        //
        // window.addEventListener('hide-delete', data => {
        //     delete_modal.hide()
        // })

        window.addEventListener('show-edit', data => {
            b_edit_modal.show()
        })

        window.addEventListener('hide-edit', data => {
            b_edit_modal.hide()
        })

    </script>
@endpush
