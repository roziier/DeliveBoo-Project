<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'status',
        'price',
        'description',
        'img_dish' 
    ]; 
    public function user() {

        return $this -> belongsTo(User::class); 
    }   
    public function category() {

        return $this -> belongsTo(Category::class);
    }
    public function payments() {
        
        return $this -> belongsToMany(Payment::class);
    }   
}
