<div>
    <table class="table datatable-basic">
        <thead>
        <tr>
            <th width="50%">نام کتاب</th>
            <th width="50%">تعداد قرض گرفته شده</th>
        </tr>
        </thead>
        <tbody>
        @if($books->count()>0)
            @foreach($books as $book)
                <tr>
                    <td><a href="{{route('manage-library')}}" style="color: white">{{$book->name}}</a></td>
                    <td>
                        {{$book->user->count()}}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
