@extends('layouts.app')

@section('content')
    @inject('trial', '\App\Services\TrialService')
    {!! $trial->viewTrialDaysLeft() !!}
    <h4>Current Date: @datetime</h4>

    <h3>For Dependency Injection and CSRF Protection Learn</h3>
    <form method="POST" action="{{url('users')}}">
        @csrf
        <input type="text" name="name" class="form-control" placeholder="Enter Name">
        <br/>
        <button type="submit" class="btn btn-info">Submit</button>
    </form>
@endsection
