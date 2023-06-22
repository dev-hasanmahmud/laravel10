@extends('layouts.app')

@push('styles')
    <style>
        #cus {
            color: green;
        }
    </style>
@endpush

@section('content')
    <h3 id="cus"></h3>
    <p>{{ $vc }}</p>

    <div class="row">
        <div class="col-md-6">
            <x-contact></x-contact>
        </div>
        <div class="col-md-6">
            <x-contactmap></x-contactmap>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const myElement = document.getElementById("cus");
        myElement.innerHTML = "Contact Us";
    </script>
@endpush
