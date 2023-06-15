@extends('layouts.app')

@section('content')
    <div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    
        You are Logged In
    </div>
@endsection