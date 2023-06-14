@extends('layouts.app')

@section('content')
    <h3>Create Post:</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{url('post')}}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title">
        <br/><br/>
        <label for="descriptions">Description</label>
        <input type="text" name="descriptions">
        <br/><br/>
        <input type="submit" name="submit" value="Submit">
    </form>
@endsection
