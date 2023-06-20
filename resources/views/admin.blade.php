@extends('layouts.app')

@section('content')
<div class="container">
  @if(\Session::has('error'))
    <div class="alert alert-danger">
      {{\Session::get('error')}}
    </div>
  @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Admin Dashboard</div>

                <div class="panel-body">
                    <a href="{{url('admin/dashboard')}}" class="text-decoration-none link-dark">{{auth()->user()->name}} - {{auth()->user()->email}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection