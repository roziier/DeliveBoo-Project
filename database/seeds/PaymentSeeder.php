<?php

use App\Dish;
use App\Payment;
use App\User;

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Payment::class, 20)      
            -> create()                   
            -> each(function($payment) {     
            
                $user = User::inRandomOrder() -> first();
                $dishes = Dish::where('user_id', $user -> id) -> inRandomOrder() -> limit(rand(1, 5)) -> get();   
                $payment -> dishes() -> attach($dishes);
        });
    }
}
