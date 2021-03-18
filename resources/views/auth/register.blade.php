@extends('layouts.app')

@section('content')
<div class="register__box">
    <div class="register__box--top">
        <h4>
            Registrazione <br>
            ristorante
        </h4>
    </div>
    <div class="register__box--form">
        <form method="POST" action="{{ route('register') }}">
            @csrf  

            <div class="form-group row tip-cont d-flex justify-content-center">
                <div id="pd" class="dropdown text-center tip">
                    <button class="btn btn-lg btn-light dropdown-toggle tip" type="button" 
                        id="dropdownMenu1" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="true" min-length="1" required autofocus>
                        Tipologie
                    </button>
                    <ul class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dropdownMenu1">
                        @foreach ($typologies as $typology)
                        <li >
                            <label class="form-check-label">
                                <input 
                                    class="form-check-input" 
                                    name="typologies[]" 
                                    class="form-check-input" 
                                    type="checkbox"
                                    value={{ $typology -> id}}
                                >    
                                {{ $typology -> name }}
                            </label>
                        </li>
                        @endforeach        
                    </ul>
                </div>
            </div>

                {{-- name --}}
                <div class="form-group row d-flex align-items-center">
                    <label for="name" class="col-md-4 col-form-label text-md-right"><h2>Nome</h2></label>

                    <div class="col-md-6  ">
                        <input minlength="3" maxlength="20" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <div class="invalid-feedback" role="alert"></div>
                            @enderror
                    </div>
                </div>

                {{-- email --}}
                <div class="form-group row d-flex align-items-center">
                    <label for="email" class="col-md-4 col-form-label text-md-right"><h2>Email</h2></label>

                    <div class="col-md-6">
                        <input maxlength="100" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <div class="invalid-feedback" role="alert"></div>
                        @enderror
                    </div>
                </div>

                {{-- address --}}
                <div class="form-group row d-flex align-items-center">
                    <label for="address" class="col-md-4 col-form-label text-md-right"><h2>Indirizzo</h2></label>

                    <div class="col-md-6">
                        <input minlength="2" maxlength="50" id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                        @error('address')
                            <div class="invalid-feedback" role="alert"></div>
                        @enderror
                    </div>
                </div>

                {{-- city --}}
                <div class="form-group row d-flex align-items-center">
                    <label for="city" class="col-md-4 col-form-label text-md-right"><h2>Città</h2></label>

                    <div class="col-md-6">
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                        @error('city')
                            <div class="invalid-feedback" role="alert"></div>
                        @enderror
                    </div>
                </div>

                {{-- IVA --}}
                <div class="form-group row d-flex align-items-center">
                    <label for="IVA" class="col-md-4 col-form-label text-md-right"><h2>P. IVA</h2></label>

                    <div class="col-md-6">
                        <input size="11" id="IVA" type="text" class="form-control @error('IVA') is-invalid @enderror" name="IVA" value="{{ old('IVA') }}" required autocomplete="IVA" autofocus>

                        @error('IVA')
                            <div class="invalid-feedback" role="alert"></div>@enderror
                    </div>
                </div>

                {{-- DAY_OFF --}}
               <div class="form-group row d-flex align-items-center">
                    <label for="day_off" class="col-md-4 col-form-label text-md-right"><h2>Giorno di chiusura</h2></label>

                    <div class="col-md-6">
                        <select style="margin-top: 10px;" id="day_off" class="form-control @error('day_off') is-invalid @enderror" name="day_off" value="{{ old('day_off') }}" required autocomplete="day_off" autofocus>
                            <option value="lunedi">Lunedì</option>
                            <option value="martedi">Martedì</option>
                            <option value="mercoledi">Mercoledì</option>
                            <option value="giovedi">Giovedì</option>
                            <option value="venerdi">Venerdì</option>
                            <option value="sabato">Sabato</option>
                            <option value="domenica">Domenica</option>
                        </select>

                        @error('day_off')
                            <div class="invalid-feedback" role="alert"></div>
                        @enderror
                    </div>
                </div> 

                {{-- LOGO --}}
               <div class="form-group row" style="display: none">
                    <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                    <div class="col-md-6">
                        <input 
                            id="logo" 
                            type="text" 
                            class="form-control"
                            name="logo" 
                            value="default-logo.png"
                            readonly
                        >
                    </div>
                </div>
                

                {{-- password --}}
                <div class="form-group row d-flex align-items-center">
                    <label for="password" class="col-md-4 col-form-label text-md-right"><h2>Password</h2></label>

                    <div class="col-md-6">
                        <input minlength="8" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <div class="invalid-feedback" role="alert"></div>
                        @enderror
                    </div>
                </div>

                {{-- confirm password --}}

                <div class="form-group row d-flex align-items-start">
                    <label  for="password-confirm" class="col-md-4 col-form-label text-md-right"><h2>Conferma Password</h2></label>

                    <div class="col-md-6" style="margin-top: 12px;">
                        <input minlength="8" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>



                
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" id="registrati">
                            Registrati
                        </button>
                    </div>
                </div>


            </form>
    </div>
</div>
@endsection
