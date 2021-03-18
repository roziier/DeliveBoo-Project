<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypologyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('typology_user', function (Blueprint $table) {
            $table->id();

            $table -> bigInteger('user_id') -> unsigned();
            $table -> bigInteger('typology_id') -> unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typology_user');
    }
}
