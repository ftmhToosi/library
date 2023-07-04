<div class="page-content">
    <div class="container text-center mr-3">
        <div class="card-group m-3">
                @if($books != null)
                    @if($books->count() == 1)
                    <div class="row row-cols-1">
                        @elseif($books->count() == 2)
                            <div class="row row-cols-2">
                                @elseif($books->count()>2)
                                    <div class="row row-cols-3">
                        @endif
                        @foreach($books as $book)
                            <div class=" card m-3">

                            <a href="{{route('show_book', $book->id)}}">
                                <img
                                    src="/storage/{{$book->image}}"
                                    alt="no picture"
                                    style="height: 230px"></a>

                            <div class="card-body">
                                <a href="{{route('show_book', $book->id)}}"><h5
                                        class="card-title" style="color: white">{{$book->name}}</h5></a>

                                <p class="card-text">نویسنده: {{$book->writer}}</p>
                                <p class="card-text"><small class="text-muted">{{$book->description}}</small>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
    </div>
</div>
