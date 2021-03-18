<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typology;
use App\User;
use Illuminate\Support\Facades\Validator;

class TypologyController extends Controller
{
    public function index() {
        $typs = Typology::all();
        $users = User::all();
        return view('welcome', compact('typs', 'users'));
    } 

    public function show($id) {  
        $typ = Typology::FindOrFail($id);
        $user = User::FindOrFail($id);  
        return view('pages.typology-show', compact('typ', 'user'));
    }

    public function getTyps(Request $request) {
        $typs = Typology::all();
        $users = User::all();
             
        foreach ($users as $key => $user){       
            $typologies = [];
            foreach($user -> typologies as $typology){
                $typologies[] = $typology -> typology;
            }         
            $users[$key]['typologies'] = $typologies;
        }
        return response() -> json(compact('typs', 'users'));
    }

    public function userShow($id){
        $user = User::findOrFail($id);
        return view('user-menu-show', compact('user'));
    }
}
