<div>
    <table class="table datatable-basic">
        <thead>
        <tr>
            <th width="50%">نام کتاب</th>
            <th width="50%">کاربر ها</th>
        </tr>
        </thead>
        <tbody>
        @if($books->count()>0)
            @foreach($books as $book)
                <tr>
                    @if($book->user->count()>0)
                        <td><a href="{{route('manage-library')}}" style="color: white">{{$book->name}}</a></td>
                    @else
                        <td></td>
                    @endif
                    <td>
                        @foreach($book->user as $item)
                            <li>
                                {{$item->name}}
                            </li>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
