<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Payment;
use App\Dish;
use App\User;
class OrderController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }
    
    public function stats() {

        $orders = Payment::all();
        return view('pages.order-stats', compact('orders'));
    }

    public function index() {

        $orders = Payment::all();
        $user = User::all();
        $dishes = Dish::all();
        return view('pages.order-index', compact('orders', 'user', 'dishes'));
    }

    public function show($id) {
        
        $order = Payment::findOrFail($id);
        $dish = Dish::findOrFail($id);
        return view('pages.order-show', compact('order', 'dish'));
    }

}
 