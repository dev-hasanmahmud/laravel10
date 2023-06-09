@extends('layouts.app')

@section('content')
    <h3>Users list:</h3>
    @foreach($users as $val)
        <p>{{ $val->name }} - {{ $val->email }}</p>
    @endforeach
@endsection
