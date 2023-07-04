@extends('admin.app')
@section('content')
    @if(auth()->check())
    <livewire:admin.manage-grouping-component/>
    @endif
@endsection
