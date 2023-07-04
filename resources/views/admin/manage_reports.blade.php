@extends('admin.app')
@section('content')
    @if(auth()->check())
        <livewire:admin.manage-reports-component/>
    @endif
@endsection
