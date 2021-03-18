<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //1 2 3
    {   
        //user-dishes (1..n)
        Schema::table('dishes', function (Blueprint $table) {
            $table -> foreign('user_id', 'dish-user')
                   -> references('id')
                   -> on('users');
        });

        //category-dishes (1..n)
        Schema::table('dishes', function (Blueprint $table) {
            $table -> foreign('category_id', 'category-dish')
                   -> references('id')
                   -> on('categories');
        });

        //typology-users (n..n)
        Schema::table('typology_user', function (Blueprint $table) {
            $table -> foreign('typology_id', 'tu-typology')
                   -> references('id')
                   -> on('typologies');

            $table -> foreign('user_id', 'tu-user')
                   -> references('id')
                   -> on('users');
        });

        //dish-payment (n..n)
        Schema::table('dish_payment', function (Blueprint $table) {
            $table -> foreign('dish_id', 'dp-dish')
                   -> references('id')
                   -> on('dishes')
                   -> onDelete('cascade');

            $table -> foreign('payment_id', 'dp-payment')
                   -> references('id')
                   -> on('payments');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void 
     */
    public function down() //3 2 1 (delle table all'interno degli schema)
    {

        //dish-payment (n..n)
        Schema::table('dish_payment', function (Blueprint $table) {
            
            $table -> dropForeign('dp-payment'); 
            $table -> dropForeign('dp-dish');  
        });


        //typology-users (n..n)
        Schema::table('typology_user', function (Blueprint $table) {
            
            $table -> dropForeign('tu-user'); 
            $table -> dropForeign('tu-typology'); 
        });

        //user-dishes (1..n)
        Schema::table('dishes', function (Blueprint $table) {

			$table -> dropForeign('dish-user');
	    });

        
        //category-dishes (1..n)
        Schema::table('dishes', function (Blueprint $table) {
            
			$table -> dropForeign('category-dish');
	    });
        
    }
}
