<div>
    <table class="table datatable-basic">
        <thead>
        <tr>
            <th width="50%">نام کاربر</th>
            <th width="50%">کتاب ها</th>
        </tr>
        </thead>
        <tbody>
        @if($users->count()>0)
            @foreach($users as $user)
                <tr>
                    @if($user->book->count()>0)
                    <td><a href="{{route('manage_user')}}" style="color: white">{{$user->name}}</a></td>
                    @else
                        <td></td>
                    @endif
                    <td>
                        @foreach($user->book as $item)
                            <li>
                                {{$item->name ?? 'not been borrowed yet'}}
                            </li>
                    @endforeach
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
