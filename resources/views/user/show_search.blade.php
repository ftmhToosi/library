@extends('user.app')
@section('content')
    <livewire:user.show-search-component :term="$term"/>
@endsection
