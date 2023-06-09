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
@endsection

@push('scripts')
    <script>
        const myElement = document.getElementById("cus");
        myElement.innerHTML = "Contact Us";
    </script>
@endpush
