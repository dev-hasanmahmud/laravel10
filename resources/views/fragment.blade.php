@extends('layouts.app')

@section('content')
    @fragment('user-list')
        <h1>{{ $title }}</h1>
    @endfragment

    @fragment('user-list2')
        <h1>{{ $title }} 2</h1>
    @endfragment
@endsection