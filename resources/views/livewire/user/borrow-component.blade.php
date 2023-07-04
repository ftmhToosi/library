<div>
    <div class="container text-center">
        {{--        <div class="card-group m-3">--}}

        <div class=" card m-3 text-center d-flex justify-content-center">
            <img src="/storage/{{$book->image??''}}" class="rounded-circle align-items-center" width="250px" style="align-content: center" alt="">
            <div class="card-body">
                <h5 class="card-title"> نام امانت گیرنده: {{$user->name ??''}}</h5>
                <h4 class="card-text"> نام کتاب: {{$book->name?? ''}}</h4>
{{--                <h4 class="card-text">{{$book->pivot->created_at}}</h4>--}}

            </div>
            <div class="modal-footer my-modal-footer">
                <div class="text-left py-2">
                    <div class="btn-group" role="group">
                        <a wire:click="submit" class="btn btn-info" style="cursor: pointer">تایید
                        </a>
                    </div>
                </div>
                <button type="button" class="btn btn-link" data-dismiss="modal">
                    بستن
                </button>
            </div>
        </div>

    </div>
</div>
