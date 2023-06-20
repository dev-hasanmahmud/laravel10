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

    {!! Form::open(['url' => 'post', 'method' => 'POST']) !!}
        @csrf
        {!! Form::label('title', 'Title'); !!}
        {!! Form::text('title', '', ['class' => 'form-control', 'value' => old('title')]); !!}
        <br/><br/>
        {!! Form::label('descriptions', 'Description'); !!}
        {!! Form::text('descriptions', '', ['class' => 'form-control', 'value' => old('descriptions')]); !!}
        <br/><br/>
        {!! Form::submit('Submit', ['class' => 'btn btn-info']); !!}
    {!! Form::close() !!}
@endsection
