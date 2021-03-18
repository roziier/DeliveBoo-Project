@extends('layouts.app')

@section('content')
    <div class="p-3 mr-5 ml-5">
      
        <div class="order-box">
          <div class="orderr">

            <h1>Codice ordine: {{$order -> id}}</h1>
            <hr>
            <h3>Pagante: {{$order-> firstname}} {{$order-> lastname}}</h3>
            <h3>Email: {{$order -> email}}</h3>
            <h3>Indirizzo: {{$order -> address}}</h3>
            <h3>Totale: {{$order -> total_price}} €</h3>
            @if ($order -> note !== null)
              <h3>Note: {{$order -> note}}</h3>
            @endif
            <hr>
            <h3>Piatti ordinati: </h3>
            <ul class="ordered-dishes">
              @foreach ($order -> dishes as $dish)
                <li>- {{$dish -> name}}</li>
              @endforeach
            </ul>
          </div>
          
          
          
        </div>
        <div class="dashboard__box--flex--menu--left">
          <a href="{{route('home')}}" class="go-back">Torna alla home</a>
        </div>


        


    </div>
@endsection 

