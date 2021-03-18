<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Dish;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Validator;


class DishController extends Controller
{
    
    public function __construct() {

        $this->middleware('auth');
    }
    
    //index (senza show)
    public function index() {
        
        $dishes = Dish::all();

        return view('pages.dish-index', compact('dishes'));
    }

    //create-store
    public function create() {

        $users = User::all();
        $dishes = Dish::all();
        $categories = Category::all();
        
        return view('pages.dish-create', compact('dishes', 'users', 'categories'));
    }
    public function store(Request $request) {
        //validazione
        
        $request -> validate([
            'name' => 'required', 'min:5', 'max:30',
            'description' => 'required','min:5','max:255',
            'price' => 'required','min:1','max:999',
            'img_dish' => 'nullable|image|max:20240'
        ]);

        $request = $this -> conversion($request);

        $newDish = Dish::make($request -> all());

        $user = User::findOrFail($request -> get('user_id'));
        $category = Category::findOrFail($request -> get('category_id'));

        if ($request['img_dish'] != NULL || $request['img_dish'] != '') {

          $img = $request -> file('img_dish');

          $ext = $img -> getClientOriginalExtension();
          $name = rand(100000, 999999) . '_' . time();
          $fileName = $name . '.' . $ext;

          $img -> storeAs('dishes', $fileName, 'public');
          $newDish -> img_dish = $fileName;

          $newDish -> user() -> associate($user);
          $newDish -> category() -> associate($category);

          $newDish -> save();

          return redirect() -> route('dish-index');
        } else {
        
          $newDish -> user() -> associate($user);
          $newDish -> category() -> associate($category);

          $newDish -> save();
          return redirect() -> route('dish-index');

        }

    }

    //edit-update
    public function edit($id) {

        $users = User::all();
        $categories = Category::all();

        $dish = Dish::findOrFail($id);

        return view('pages.dish-edit', compact('users','categories','dish'));
    }
    public function update(Request $request, $id) {

        $request = $this -> conversion($request);
        
        $request -> validate([
            'name' => 'required|min:3|max:30',
            'description' => 'required|min:3|max:255',
            'price' => 'required|min:1|max:99999',
            'img_dish' => 'nullable|image|max:20240'
        ]);
            

        $user = User::findOrFail($request -> get('user_id'));
        $category = Category::findOrFail($request -> get('category_id'));

        $editDish = Dish::findOrFail($id);

        if ($request['img_dish'] != NULL || $request['img_dish'] != '') {

            $fileimg = $editDish -> img_dish;

            $file = storage_path('app/public/dishes/' . $fileimg);

            $deleteimg = File::delete($file);

            $img = $request -> file('img_dish');

            $ext = $img -> getClientOriginalExtension();
            $name = rand(100000, 999999) . '_' . time();
            $fileName = $name . '.' . $ext;

            $img -> storeAs('dishes', $fileName, 'public');
            $editDish -> img_dish = $fileName;
            
        }
            $editDish -> update([
                'name' => $request -> name,
                'description' => $request -> description,
                'price' => $request -> price,
                'category' => $request -> category,
                'status' => $request -> status,
                /* 'img_dish' => $fileName */
                ]);
    
            $editDish -> user() -> associate($user);
            $editDish -> category() -> associate($category);
    
            $editDish -> save();


        return redirect() -> route('dish-index');
        
    }

    //delete
    public function delete($id) {

        $dish = Dish::findOrFail($id);
        $dish -> delete();

        return redirect() -> route('dish-index');
    }

    //conversione euro -> cent (richiamata in store)
    private function conversion($request) {

        $request -> validate([
            'price' => 'required|min:1|max:99999'
        ]);

        $price = $request -> get('price') * 100;


        $request -> merge([
            'price' => $price
        ]);
        
        return $request;
    }

    //IMG UPLOAD DISHES -----------------------------------------------------------
        //upload img
        public function updateLogo(Request $request, $id) {
            
            //DA FARE PER VERIFICARE CHE FUNZIONI TUTTO
            //prendo l'icona inserita dall'utente
            $data = $request -> all();
            //usiamo la funzione file('colonna') per passare i dati 'complessi', in questo caso un immagine
            $image = $request -> file('img_dish');
            //dd($data, $image);
    
            //ALGORITMO PER RISOLVERE IL CONFLITTO DEI NOMI DEI FILE
                //ricaviamo l'estensione del file caricato    
            $ext = $image -> getClientOriginalExtension();
            
            //creiamo il nome del file updato, formato da un n. random da n. a m. + tempo in millisecondi
            $name = rand(100000, 999999) . '_' . time();

            //nome file completo
            $destFile = $name . '.' . $ext;
            
            $file = $image -> storeAs('img_dish', $destFile, 'public');
    
            //SALVIAMO L'INFORMAZIONE NEL DB

            $dish = Dish::findOrFail($id);

            dd($dish);


            //$dish = ;
            //il valore della colonna icon sarà uguale al file
            $dish -> img_dish = $destFile;

            $dish -> save();
                    
            //dd($image, $ext, $name, $destFile);
            return redirect('dish-index', compact('dish'));
        }
            
}       
