<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table -> id();

            $table -> string('firstname', 100);
            $table -> string('lastname', 100);
            $table -> string('email', 100);
            $table -> string('address', 100);
            $table -> integer('total_price');
            $table -> string('status', 50);
            $table -> text('note') ->nullable();

            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
