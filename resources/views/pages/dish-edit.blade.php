@extends('layouts.app')

@section('content') 
    
<div class="dashboard">
  <div class="dashboard__box">
    <div class="dashboard__box--title">
      {{ __('Modifica il tuo piatto') }}
    </div>
    <div class="dashboard__box--imgform">

      <div class="dashboard__box--form">
    
        <form  action="{{route('dish-update', $dish -> id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            
            {{-- categoria piatto --}}
            <label for="category_id mb-4">Category</label> <br>
            <select name="category_id" class="mb-4">

                @foreach ($categories as $category)

                    <option value="{{$category -> id}}"
                        @if ($dish -> category -> id == $category -> id)
                            selected
                        @endif
                        >{{ $category -> name }}
                    </option>

                @endforeach

            </select>

            {{-- nome piatto --}}
            <div class="form-group">
              <label for="name">Name</label>
              <input 
                required
                minlength="5" 
                maxlength="30"
                name="name" 
                type="text" 
                class="form-control"
                value="{{$dish -> name}}"
              >
            </div>

            <br>

            {{-- descrizione piatto --}}
            <div class="form-group">
              <label for="description">Description</label>
              <input
                required
                minlength="5"
                maxlength="255"
                name="description" 
                type="text" 
                class="form-control"
                value="{{$dish -> description}}"
              >
            </div>

            <br>

            {{-- prezzo piatto --}}
            <div class="form-group">
              <label min="1" max="1000" name="price" type="text" autofocus required>Price</label> (€)
              <input 
                required
                min="1" 
                max="1000"
                name="price" 
                type="number" 
                step="any"
                class="form-control"
                value="{{$dish -> price/100}}"
              >
            </div>

            <br>

            {{-- img piatto --}}
            <div class="form-group">
              <input id="img_dish" type="file" name="img_dish" value="{{$dish -> img_dish}}">
              @if ($dish -> img_dish != null)                                         
                <img src="{{asset('/storage/dishes/' . $dish -> img_dish)}}" width="200px">
              @endif
            </div>
            
            <br>

            {{-- stato piatto (0,1) (default value, not visible) --}}
            <div class="form-group">
              <label for="status">Status</label>
              <select class="form-control" name="status" required autofocus>
                <option value="1" @if ($dish -> status == 1) selected @endif>Disponibile</option>
                <option value="0" @if ($dish -> status == 0) selected @endif>Non disponibile</option>
              </select>
            </div>

          
            {{-- user id (default value, not visible)--}}
            <div class="form-group">
              <input 
                name="user_id"
                type="text" 
                class="form-control"
                value="{{Auth::user() -> id}}"
                readonly
                style="display: none"
              >
            </div>

            <br>
              
            <button type="submit" class="btn btn-lg btn-light">MODIFICA</button>
          </form>

      </div>
    </div>
  </div>
</div>


@endsection 