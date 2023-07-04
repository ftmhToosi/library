<div>
    <div class="navbar-collapse collapse flex-lg-1 order-2 order-lg-1" id="navbar-search">
        <div class="navbar-search d-flex align-items-center py-2 py-lg-0">
            <form wire:submit.prevent="submit" method="post">
                <div class="form-group-feedback form-group-feedback-left flex-grow-1">
                    <input wire:model='term' type="text" class="form-control" placeholder="Search">
                    <div class="form-control-feedback">
                        <i class="icon-search4 opacity-50"></i>
                    </div>
                </div>
            </form>
        </div>
    </div>
{{--    @if($books!= null)--}}
{{--        @foreach($books as $book)--}}
{{--            <br>--}}
{{--            <span><a href="{{route('show_book', $book->id)}}" style="color: white">{{$book->name}}</a></span>--}}
{{--        <br>--}}
{{--            <span><a href="{{route('show_book', $book->id)}}" style="color: white">{{$book->writer}}</a></span>--}}
{{--        <br>--}}
{{--            <span><a href="{{route('show_book', $book->id)}}" style="color: white">{{$book->description}}</a></span>--}}
{{--        @endforeach--}}
{{--    @endif--}}
</div>
