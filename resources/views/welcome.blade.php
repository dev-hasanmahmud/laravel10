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
        <select class="form-control" name="state" id="district">
            <option value="Dhaka">Dhaka</option>
            <option value="Chittagong">Chittagong</option>
        </select>
        <br/>
        <button type="submit" class="btn btn-info">Submit</button>
    </form>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            var dict = $("#district").val();
            console.log(dict);
        });
    </script>
@endpush
