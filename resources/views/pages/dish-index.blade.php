@extends('layouts.app')

@section('content') 
    
<div class="dashboard">
    <div class="dashboard__box">
        
                <div class="dashboard__box--title">{{ __('Il mio menu') }}</div>

                <div>
                    @if (session('status'))
                        <div role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                

                <div class="dashboard__box--flex">
                    <div class="dashboard__box--flex--img">
                        <div class="dashboard__box--flex--menu">
                            <div class="dashboard__box--flex--menu--left">
                                <a href="{{route('dish-create')}}" class="new-plate">Crea piatto</a>
                                <a href="{{route('home')}}" class="go-back">Torna alla home</a>

                                <a href="{{route('dish-create')}}" class="plus" ><i class="fas fa-plus"></i></a>
                                <a href="{{route('home')}}" class="arrow"><i class="fas fa-arrow-left"></i></a>
                                                    
                            </div>
                            <div class="dashboard__box--flex--menu--right">
                                <div class="dashboard__box--flex--menu--right--container">
                                    @foreach ($dishes as $dish)
                                            
                                            @if (Auth::user() -> id === $dish -> user_id)
                                                <div class="dish__box">
                                                    
                                                    <h3><strong>{{$dish -> name}}</strong> <br></h3>
                                                    @if ($dish -> img_dish != null)
                                                        
                                                        <img src="{{asset('/storage/dishes/' . $dish -> img_dish)}}" width="150px">
                                                    @endif
                                                    <h3>{{$dish -> price/100}}€</h3>
                                                    <h3>{{$dish -> description}}</h3>

                                                    <div class="to-hide">
                                                        @if ($dish -> status == 1)
                                                            <h5>(Disponibile)</h5> 
                                                        @else
                                                            <h5>(Non disponibile)</h5> 
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="dish__box--buttons">
                                                        <a href="{{route('dish-edit', $dish -> id)}}" class="edit" ><i class="fas fa-edit"></i></a>
                                                        <a href="{{route('dish-delete', $dish -> id)}}" class="cancel"><i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                    
                                                </div> 
                                            @endif        
                                    @endforeach
                                </div>        
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
    

@endsection