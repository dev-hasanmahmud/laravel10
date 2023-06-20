@extends('layouts.app')
    
@section('content')
    <h3>Form Uploading File:</h3>
    {!! Form::open(['url' => 'updoad', 'method' => 'POST', 'files' => true]) !!}
        @csrf
        {!! Form::label('file', 'File'); !!}
        {!! Form::file('file', ['class' => 'form-control']); !!}
        <br/><br/>
        {!! Form::submit('Submit', ['class' => 'btn btn-info']); !!}
    {!! Form::close() !!}
@endsection
