@extends('user.app')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            @if(auth()->check())
            <livewire:admin.manage-library-component/>
            @endif
        </div>
    </div>
@endsection
