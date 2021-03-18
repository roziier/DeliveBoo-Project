<!doctype html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Monofett&display=swap" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/app.scss') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>
</head>
<body>
    <div class="loader">
        <img src="{{ asset('loader/circles.svg') }}">
    </div>
    
    @include('components.header')
    
    <div class="containerBraintree_">
        
        <div>
        @if (session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message')}}
            </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>



    <div class="content form-group  justify-content-center">
        <form method="post" id="payment-form" action="{{route('braintree-payment')}}" >
            @csrf
            @method('POST')

            <section>
              <div class="flex_cart_box">
                <div class="input-wrapper amount-wrapper boxRegister_">
                    {{-- ORDER FORM --}}

                  <h1 style="text-align: center">Dati personali:</h1>
                  <div class="form-group row d-flex align-items-center">

                      <label for="firstname" class="col-md-4 col-form-label text-md-left"><h3>Nome</h3></label>

                      <div class="col-md-6  ">
                          <input minlength="3" maxlength="20" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required minlength="2" autofocus>

                          @error('firstname')
                              <div class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row d-flex align-items-center">
                      <label for="lastname" class="col-md-4 col-form-label text-md-left"><h3>Cognome</h3></label>

                      <div class="col-md-6  ">
                          <input minlength="3" maxlength="20" id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required minlength="2" autofocus>

                          @error('lastname')
                              <div class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                      </div>
                  </div>


                  <div class="form-group row d-flex align-items-center">
                      <label for="email" class="col-md-4 col-form-label text-md-left"><h3>Email</h3></label>

                      <div class="col-md-6">
                          <input maxlength="100" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                          @error('email')
                              <div class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row d-flex align-items-center">
                      <label for="address" class="col-md-4 col-form-label text-md-left"><h3>Indirizzo di consegna</h3></label>

                      <div class="col-md-6  ">
                          <input minlength="3" maxlength="20" id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required minlength="6" autofocus>

                          @error('address')
                              <div class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row d-flex align-items-center">
                      <label for="note" class="col-md-4 col-form-label text-md-left"><h3>Note</h3></label>

                      <div class="col-md-6  ">
                        <textarea style="font-size: 1.5rem" class="form-control" id="note" rows="5" name="note" placeholder="Inserire eventuali note: allergie, intolleranze o aggiunta/rimozione ingredienti"></textarea>

                          @error('note')
                              <div class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                      </div>
                  </div>

                  {{-- hidden --}}
                  <input id="tot_price" name="total_price" type="hidden" placeholder="Amount" onlyread>

                </div>
                <label for="amount" id="amount_" class="boxCart_">
                    <h1 class="input-label">Totale Carrello <i class="fas fa-shopping-cart"></i></h1>
                    <input value="0" id="amount" name="amount" type="tel" min="1" placeholder="Amount" style="display: none;" onlyread>

                    {{-- show --}}
                    <input style="cursor: default; border-radius: 10px; margin: 10px; outline: none; text-align: center; border: 1px solid gold" type="text" id="amountShow" readonly>
                    


                    <div id="cboxes" style="display: none">

                    </div>
                </label>
              </div>


                <div class="bt-drop-in-wrapper">
                    <div id="bt-dropin"></div>
                </div>
            </section>

            <input id="nonce" name="payment_method_nonce" type="hidden">
            <div class="flexButtons_">
              <button class="button btn btn-primary return btStyle_" type="submit">Paga Ora</button>
              <a href="/" class="btn btn-primary return btStyle_" id="home">Torna alla home</a>
            </div>

        </form>
        <br>

        {{-- return --}}


        <script src="https://js.braintreegateway.com/web/dropin/1.26.1/js/dropin.min.js"></script>
        <script>
            var form = document.querySelector('#payment-form');
            var client_token = "{{$token}}";

            braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin'
            }, function (createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    instance.requestPaymentMethod(function (err, payload) {
                        if (err) {
                            console.log('Request Payment Method Error', err);
                            return;
                        }

                        // Add the nonce to the form and submit
                        document.querySelector('#nonce').value = payload.nonce;
                        form.submit();
                    });
                });
            });
        </script>

        <script>
            var input = document.querySelector('#amount');
            var totPrice = document.querySelector('#tot_price');

            var total = parseInt(localStorage.totPrice);
            var msg = 'Puoi tornare alla home, buon appetito!';
            var home = document.querySelector('#home');

            input.value = total/100;
            totPrice.value = total/100;

            var amountShow = document.querySelector('#amountShow');

            if (!(isNaN(input.value))) {
                amountShow.value = input.value;
            } else {
                amountShow.value = '';
            }

            //dishes utente
            var cart = JSON.parse(localStorage.cart);

            var myDiv = document.getElementById("cboxes");

            for (var i = 0; i < cart.length; i++) {
                console.log(cart[i]);
                var checkBox = document.createElement("input");
                var label = document.createElement("label");
                checkBox.type = "checkbox";
                checkBox.value = cart[i].id;
                checkBox.name = 'cart[]';
                checkBox.checked = true;
                myDiv.appendChild(checkBox);
                myDiv.appendChild(label);
                label.appendChild(document.createTextNode(checkBox.value));
            }
        </script>
    </div>



  </div>

  
    @include('components.footer')
  
    @include('components.script')



</body>
</html>

