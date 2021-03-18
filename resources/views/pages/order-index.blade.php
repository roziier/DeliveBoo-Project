@extends('layouts.app')

@section('content')

    <div class="order-index-box">

        <h1>I tuoi ordini</h1> <br>
        <hr>
        @foreach ($orders as $order)  
            <ul>
                @foreach ($order -> dishes as $dish)
                    @if (Auth::user() -> id === $dish -> user_id)       
                        <li class="order-li"> 
                            @if ($loop -> parent -> count)
           
                                <a href="{{route('order-show', $order -> id)}}">
                                    {{$order -> firstname}} {{$order -> lastname}} - {{$order -> total_price}}€ <br> {{$order -> created_at}}
                                </a> 

                            @break
                            @endif
                        </li>

                    @endif
                @endforeach
            </ul>                        
        @endforeach
    </div>
    <div class="dashboard__box--flex--menu--left">
        <a href="{{route('home')}}" class="go-back">Torna alla home</a>
    </div>
    
@endsection 
 