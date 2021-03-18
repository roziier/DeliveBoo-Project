<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <script src="{{asset('/js/app.js')}}"></script>

        {{-- <script rel="stylesheet" href="{{asset('/js/app.js')}}"> --}}

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Monofett&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Hind&display=swap" rel="stylesheet">
        
        {{-- HOME  --}}
        <link
          href="https://fonts.googleapis.com/css2?family=Monofett&display=swap"
          rel="stylesheet"
        />
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>
    </head>
    <body>
        
        <div class="loader">
            <img src="{{ asset('loader/circles.svg') }}">
        </div>

        {{-- header  --}}
             <header class="home">
                <div class="home__register">
                    <div class="home__register--box-anchor">
                        @if (Route::has('login'))                           
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Accedi</a>
            
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Registrati</a>
                                    @endif
                                @endauth                        
                        @endif       
                    </div>   
                </div>
                
                <div class="home__container">
                    <div class="home__logo">

                      <div class="home__logo--text">DeliveBoo</div>
                      <div class="home__logo--subtext">
                        La missione di DeliveBoo è trasformare il modo in cui i clienti
                        mangiano. Un ingrediente chiave del nostro successo è offrire ai
                        nostri clienti la migliore selezione di ristoranti: che tu voglia
                        sushi per cena, un’insalata per pranzo, o una brioche per colazione,
                        ci pensiamo noi!
                      </div>

                      <a href="#order" class="home__logo--arrow">
                        <div class="round">                         
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>                                                 
                        </div>
                    </a>
                    </div>              
                </div>           
              </header>
   
                <div id="app">                
                    
                        <main id="order" class="main">
                            <div class="main__container">             
                            
                                 {{-- desktop --}}
                                 <div class="main__container--left">
                                     <div class="main__container--left--top">
                                           <h5>Tipologie:</h5>
                                     </div>
                                     <div class="main__container--left--checkbox">
                                                   
                                         <div v-for="typ in data" class="main__container--left--checkbox--single">
                                             <input 
                                                 type="checkbox" 
                                                 :id="typ.name" 
                                                 v-model="checkedNames" 
                                                 :value="typ.name" 
                                                 @change="filtraggio()"
                                             >
                                             <label :for="typ.name">@{{ typ.name }}</label>
                                         </div>    
                                     </div>
                                 </div> 

                                  
                              <div class="main__container--right">
                                <div class="main__container--right--top text-center">
                                    <h5>Cerca un ristorante</h5>
                                    
                                        {{-- checkboxes --}}
                                        <div class="typ-mobile">
    
                                            <div class="form-group row margin-auto">
                                                <div class="dropdown text-center margin-auto">
                                                    <button class="btn btn-default dropdown-toggle margin-auto t" type="button" 
                                                        id="dropdownMenu1" data-toggle="dropdown" 
                                                        aria-haspopup="true" aria-expanded="true" style="font-size: 1.8rem">
                                                        Tipologie
                                                    </button>
                                                    <ul class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dropdownMenu1" style="font-size: 1.8rem">
                                                    
                                                        <li v-for="typ in data">
                                                            <label class="form-check-label">
                                                                <input 
                                                                    type="checkbox" 
                                                                    :id="typ.name" 
                                                                    v-model="checkedNames" 
                                                                    :value="typ.name" 
                                                                    @change="filtraggio()"
                                                                >
                                                                @{{ typ.name }}
                                                                
                                                                
                                                            </label>
                                                        </li>                                                      
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                        <div class="main__container--right--restourants">
                                            <div class="main__container--right--restourants--box" v-if="user.filtered" v-for="user in users">
                                                <a :href="'/show/menu/' + user.id" class="text-left a-cont">
                                                    <img v-if="user.logo != null" :src="'/storage/logo/' + user.logo" alt="Logo">
                                                    <img v-else src="https://www.thermaxglobal.com/wp-content/uploads/2020/05/image-not-found.jpg" style="opacity: 0.3;" alt="logo">
                                                    <h5>@{{user.name}}</h5>
                                                   
                                                    <div class="stars">
                                                        <span v-for="(vote,i) in 5"><i class="fa-star" id="star" :class="i < user.rating ? 'fas' : 'far'"></i></span>
                                                    </div>
                                                    
                                                    <div>
                                                        @{{user.address}}
                                                    </div>
                                                    
                                                    <div class="myflex">
                                                        <div v-for="typology in user.typologies" class="typs-box">
                                                            @{{typology.name}}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>        
                                        </div>
                                    
                            </div>  
                            
                            
                    
                        </main>

                        
                    
                    
                    
                 </div>

                 <section class="work-with-us">
                     <h5>Lavora con noi</h5>
                    
                     <div class="rider">
                         <div class="img_rider"></div>
                         <div class="text_rider">
                             <h5>Rider</h5>
                             <div>Diventa un rider: flessibilità, ottimi guadagni e un mondo di vantaggi per te.</div>
                             <button>Unisciti</button>
                         </div>

                         
                     </div>
                     <div class="call">
                        
                        <div class="text_call">
                            <h5>Call Center</h5>
                            <div>Siamo ambiziosi, e ci servono persone che ci aiutino a raggiungerlo.</div>
                            <button>Unisciti</button>
                        </div>
                        <div class="img_call"></div>
                     </div>
                 </section>


                  
        {{-- </main> --}}

        

        @include('components.footer')
          

        {{-- loader --}}
        @include('components.script')

        
    </body>
</html>
