<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Typology;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function __construct() {

        $this->middleware('auth');
    }
 
    public function index() {
        
        $user = Auth::user();
        $typs = Typology::all();
        return view('home', compact('user', 'typs'));
    }


    public function typstore(Request $request) {
        $data = $request -> all();
  
        $typs = Typology::findOrFail($data['typs']);
  
        $user = Auth::user();
        $user -> typologies() -> attach($typs);
  
        return redirect() -> route('home');
  
    }

    //upload img
    public function updateLogo(Request $request) {
        $data = $request -> all();
        
        $image = $request -> file('logo');
        //dd($data, $image); 
	
		//evita l'accumulamento delle img (PUNTO 7)
        $this -> deleteLogo();

		//ALGORITMO PER RISOLVERE IL CONFLITTO DEI NOMI DEI FILE
			//ricaviamo l'estensione del file caricato    
        $ext = $image -> getClientOriginalExtension();

        //creiamo il nome del file updato, formato da un n. random da n. a m. + tempo in millisecondi
        $name = rand(100000, 999999) . '_' . time();
		//nome file completo
        $destFile = $name . '.' . $ext;
        
        $file = $image -> storeAs('logo', $destFile, 'public');

	    //SALVIAMO L'INFORMAZIONE NEL DB
        $user = Auth::user();
        //il valore della colonna icon sarà uguale al file
        $user -> logo = $destFile;
        $user -> save();
				
        //dd($image, $ext, $name, $destFile);
		return redirect() -> back();
    }

    public function clearLogo() {
				
        //evita l'accumulamento delle img (PUNTO 7)
        $this -> deleteLogo();

        //recupero lo user
        $user = Auth::user();
        //tolgo il valore icon e metto NULL
        $user -> logo = null;
        //vado a salvare
        $user -> save();

        return redirect() -> back();
    }

    private function deleteLogo() {
        
        //recupero lo user e la sua icona
        $user = Auth::user();
 
        //prova ad eseguire queste cose
        try {
             
            //nome del file da eliminare
            $fileName = $user -> logo;
                     
            //percorso file da eliminare
            $file = storage_path('app/public/logo/'.$fileName);
     
            $res = File::delete($file);
         //se avviene qualunque errore, non fare nulla
        } catch (\Exception $e) { } //do nothing
    }


}
