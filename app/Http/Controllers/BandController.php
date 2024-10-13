<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    //


    public function index(){

        //$table_bands=Band::all();
        $table_bands = Band::withCount('albums')->get();

        return view("show_bands",compact("table_bands"));
    }

    public function addingBand(){

        return view("add_band");
    }

    public function viewBand($id){

        $band=Db::table('table_bands')
        ->where('id', $id)
        ->first();

        return view('view_band',compact('band'));
    }


    public function addBand(Request $request){

       

        if(Auth::user()->user_type==1){

            $action="";
            if(isset($request->id)){
    
                $action="atualizado";
    
                $request->validate([
    
                    "name"=> "required|string:max:50",
                    "photo"=> "required|image"
                ]);
    
                $photo=null;
    
                if($request->hasFile("photo")){
    
                    $photo = $request->file('photo')->store('photos', 'public');
                }
    
                Band::where("id",$request->id)
                ->update([
    
                    "name"=> $request->name,
                    "photo"=> $photo
                ]);
            }else{
    
                $photo=null;
    
                $action="adicionado";
                $request->validate([
    
                    "name"=>"string|max:50",
                    "photo"=>"image"
                ]);
    
    
                if ($request->hasFile("photo")) {
                    $photo = $request->file('photo')->store('photos', 'public');
                }
                Band::insert([
    
                    "name"=>$request->name,
                    "photo"=> $photo
                ]);
            }
            return redirect()->route("show.bands")->with("message", "Banda ". $action. " com sucesso.");
        }
        return redirect()->route("show.bands")->with("message", "Apenas o admin pode adicionar Bandas.");

    }

    public function deleteBand($id){

        if(Auth::user()->user_type==1){

            DB::table("table_bands")->where("id",$id)->delete();
            return back();
        }

        return redirect()->route('show.bands')->with('message','Apenas o admin pode eliminar bandas.');
    }

    public function searchBand(Request $request){

        $search=$request->input("search");
        $table_bands=Band::where("name","like","%". $search . "%")->get();
        return view("show_bands",compact("table_bands"));
    }

    public function showAlbums(Band $band)
    {
        // Fetch the albums for the specific band
        $albums = $band->albums;

        return view('view_band_albums',compact('band','albums'));
    }
}
