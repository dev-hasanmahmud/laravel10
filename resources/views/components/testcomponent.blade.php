<div>
    <!-- It is never too late to be what you might have been. - George Eliot -->
    <strong>{{ $title }}</strong>
    
    @foreach ($users as $user)
        <p>{{$user->name}} - {{$user->email}}</p>
    @endforeach
</div>