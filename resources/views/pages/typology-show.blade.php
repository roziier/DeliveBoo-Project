@extends('layouts.app')

@section('content')

    <h1>typ show {{$typ -> name}}</h1>

    <ul class="card-body pt-0">
        

        {{-- list restaurants --}}
        <h3>Ristoranti:</h3>
        <li>
            @foreach ($typ -> users as $user)    
                <a href="{{route('user-menu-show', $user -> id)}}">{{$user -> name}} (id: {{$user -> id}})</a> <br>       
            @endforeach
        </li> 
    </ul>
    
@endsection
 