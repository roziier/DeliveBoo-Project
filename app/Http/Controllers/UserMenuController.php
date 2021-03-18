<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dish;
use App\Category;
use App\Payment;
use Braintree\Gateway;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Validator;


class UserMenuController extends Controller
{

function getMenu($id){
        $user = User::FindOrFail($id);
        $dishes = Dish::all();
        $categories = Category::all();      
        foreach ($categories as $key => $cat) {
            $dishes_all = [];
            foreach($dishes as $dish){
                if($dish -> category_id == $cat -> id){
                    $dishes_all[] = $dish;
                }
            }            
            $categories[$key]['dishes'] = $dishes_all;
        }
        return response() -> json(compact('user','dishes','categories'));
    }   

    public function show($id) {
        $user = User::FindOrFail($id);
        $dish = Dish::FindOrFail($id); 
        return view('pages.user-menu-show', compact('dish', 'user'));
    }

    public function braintreeForm() {
        $gateway = new \Braintree\Gateway([
          'environment' => config('services.braintree.environment'),
          'merchantId' => config('services.braintree.merchantId'),
          'publicKey' => config('services.braintree.publicKey'),
          'privateKey' => config('services.braintree.privateKey')
        ]);
        $token = $gateway->ClientToken()->generate();
        return view('layouts.brain-app', compact('token'));
    }
  
    public function braintreePayment(Request $request) {
        $data = $request -> all();
        Validator::make($data, [
            'firstname' =>  ['required', 'string', 'min:3','max:20'],
            'lastname' => ['required', 'string', 'min:3','max:20'],
            'address' => ['required', 'string', 'min:2', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100']
        ]) -> validate();

        $dish = Dish::findOrFail($data['cart']);

        $gateway = new \Braintree\Gateway([
          'environment' => config('services.braintree.environment'),
          'merchantId' => config('services.braintree.merchantId'),
          'publicKey' => config('services.braintree.publicKey'),
          'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $request -> amount;
        $nonce = $request -> payment_method_nonce;

        $result = $gateway->transaction() -> sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        $order = new Payment;
        $order -> firstname = $data['firstname'];
        $order -> lastname = $data['lastname'];
        $order -> address = $data['address'];
        $order -> email = $data['email'];
        $order -> status = $result -> success;
        $order -> total_price =  $data['total_price'];
        $order -> note =  $data['note'];
        $order -> save();
        $order -> dishes() -> attach($dish);
        
        if ($result -> success) {
            $transaction = $result -> transaction;
            // Mail::to($order -> email)->send(new TestMail($order));
            // return redirect() -> route('welcome') ->  with('success_message', 'Transazione avvenuta con successo ' . 'Id: ' . $transaction-> id);
            return back() -> with('success_message', 'Transazione avvenuta con successo ' . 'Id: ' . $transaction -> id);
        } else {
            $errorString = "";
            foreach($result -> errors -> deepAll() as $error) {
                $errorString .= 'Error: ' . $error -> code . ": " . $error -> message . "\n";
            }
            return back() -> withErrors('Transazione annullata' . $result -> message);
        }
  
    }



}
