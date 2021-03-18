<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'address',
        'total_price',
        'status',
        'note'
    ];
    public function dishes() {
        
        return $this -> belongsToMany(Dish::class);
    }
}
