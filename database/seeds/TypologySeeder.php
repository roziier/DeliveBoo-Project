<?php

use App\User;
use App\Typology;
use Illuminate\Database\Seeder;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        factory(Typology::class, 15) -> create()
            -> each(function ($typo) {
                $user = User::inRandomOrder() -> limit(rand(1,8)) -> get();
                $typo -> users() -> attach($user);
        });
    }
}


