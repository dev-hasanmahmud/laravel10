@extends('layouts.app')

@section('content')
    @inject('trial', '\App\Services\TrialService')
    {!! $trial->viewTrialDaysLeft() !!}

    <h3>For Dependency Injection and CSRF Protection Learn</h3>
    <h4>Current Date: @datetime</h4>
    <form method="POST" action="{{url('users')}}">
        @csrf
        <input type="text" name="name" placeholder="Enter Name">
        <button type="submit">Submit</button>
    </form>
@endsection
