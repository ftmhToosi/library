@extends('admin.app')
@section('content')
    @if(auth()->check())
    <livewire:admin.manage-library-component/>
    @endif
@endsection
