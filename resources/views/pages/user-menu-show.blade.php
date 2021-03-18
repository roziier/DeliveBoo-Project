@extends('layouts.app')

@section('content')


    <h1 class="title_menu" style="font-size: 4rem"> {{$user -> name}} Menu</h1>

    <div class="container_menu-chart">
        <div class="left_menu-chart">
            
            
            <div v-for="(category, i) in categories">
                <div class="media_flex_" v-for="(dish, i) in dishes" v-if="dish.user_id == id && category.id == dish.category_id  && dish.status === 1" :key="dish.name">
                    <div class="dish_mini-box greennn">
                    <img v-if="dish.img_dish != null" :src= "'/storage/dishes/' + dish.img_dish" style="max-width: 150px;"> 
                        <span><strong> @{{dish.name}} </strong></span>
                        @{{dish.description}}
                        <span>Categoria: @{{category.name}}</span> 
                        <span> @{{dish.price/100}}€</span>
                    </div>
                    <div class="price_add">
                        <div class="add_chart" @click="addItemToCart(dish)">Aggiungi</div>     
                    </div>
                </div>
                <div  class="media_flex_" v-for="(dish, i) in dishes" v-if="dish.user_id == id && category.id == dish.category_id && dish.status === 0" :key="dish.name">
                    <div class="dish_mini-box reddd">
                        <span>Non disponibile</span> 
                        <span><strong> @{{dish.name}} </strong></span> 
                        <span>Categoria: @{{category.name}}</span> 
                        <span> @{{dish.price/100}}€</span>
                    </div>
                </div>
            </div>
            
        </div>
        
        
        <div class="right_menu-chart">
            
            <div class="cart">
                <div class="fast-shopping-cart">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="chart_element" v-for="(dish, i) in cart" :key="dish.name" v-if="dish.quantity > 0">
                    <div class="chart_dishxt">
                        
                        <span><strong>@{{dish.name}} </strong> x @{{dish.quantity}}</span> <br>
                        <span>@{{dish.price/100}}€</span>
                    </div>
                    
                    <i class="fas fa-trash" @click="removeItemFromCart(dish)" style="font-size: 2rem"></i>
                    
                </div>
                <hr style="background: white;">
                <div class="total_pricee">
                    <strong>Totale: @{{totPrice/100}} € </strong>
                </div>
                
            </div>
        </div>
        
    </div>
    
    

    
    <div class="go_checkout" v-if="active">
        <a class="a_checkout" href="{{route('braintree-index')}}" style="text-decoration: none; color: gold">
            CHECKOUT
        </a>
    </div>


    


@endsection




