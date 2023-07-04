@extends('admin.app')
@section('content')
    @if(auth()->check())
        <livewire:admin.manage-message-component/>
    @endif
@endsection
