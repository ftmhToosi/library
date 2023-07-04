@extends('admin.app')
@section('content')
    @if(auth()->check())
        <livewire:admin.manage-user-component/>
    @endif
@endsection
