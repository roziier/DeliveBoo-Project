@extends('layouts.app')

@section('content') 
    
<div class="dashboard">
  <div class="dashboard__box">
    <div class="dashboard__box--title">
      {{ __('Creazione piatto') }}
    </div>
    <div class="dashboard__box--imgform">

      <div class="dashboard__box--form">
        <form  class="myform" action="{{route('dish-store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          
          {{-- categoria piatto --}}
          <label for="category_id mb-4">Category</label> <br>
          <select name="category_id" class="mb-4">
              @foreach ($categories as $category)
                  <option value="{{$category -> id}}">{{ $category -> name }}</option>
              @endforeach
          </select>
    
          {{-- nome piatto --}}
          <div class="form-group">
            <label for="name">Name</label>
            <input minlength="5" maxlength="30" name="name" type="text" class="form-control" autofocus required>
          </div>
    
          <br>
    
          {{-- descrizione piatto --}}
          <div class="form-group">
            <label for="description">Description</label>
            <input minlength="5" maxlength="255" name="description" type="text" class="form-control" autofocus required>
          </div> 
    
          <br>
    
          {{-- prezzo piatto --}}
          <div class="form-group">
            <label for="price">Price</label> (€)
            <input @error('price') is-invalid @enderror min="1" name="price" step="any" type="number" class="form-control" autofocus required>     
          </div>
          
          


          <br>
          
          {{-- img piatto --}}
          <div class="form-group">
            <input id="img_dish" type="file" name="img_dish" required>
          </div>
          
          <br>
    
          {{-- stato piatto (0,1) (default value, not visible) --}}
          <div class="form-group">
            <input 
              name="status"
              type="text"
              class="form-control"
              value="1"
              readonly
              style="display: none"
            >
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

          <button type="submit" class="btn btn-lg btn-light">CREA</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection 