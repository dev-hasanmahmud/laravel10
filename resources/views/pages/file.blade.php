@extends('layouts.app')
    
@section('content')
    <h3>Form Uploading File:</h3>
    {!! Form::open(['url' => 'updoad', 'method' => 'POST', 'files' => true]) !!}
        @csrf
        {!! Form::label('file', 'File'); !!}
        {!! Form::file('file', ['class' => 'form-control']); !!}
        <br/>
        {!! Form::submit('Submit', ['class' => 'btn btn-info']); !!}
    {!! Form::close() !!}

    @if (count($files) > 0)
        <h3 class="mt-3">Files list:</h3>
        <div class="row">
            @foreach ($files as $file)
                <div class="col-md-2 mb-2">
                    <div class="card">
                        <img class="card-img-top" src="{{$file->path}}" alt="Card image cap">
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
