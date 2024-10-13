<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller
{

    public function showAlbums(){

        $albums=$this->getAlbums();
        $table_bands=Band::all();

        return view("albums.show_albums", compact('albums', 'table_bands'));
    }

    private function getAlbums(){

        $albums=DB::table('albums')
        ->join('table_bands','table_bands.id','albums.band_id')
        ->select('albums.*','table_bands.name as bandName')
        ->get();

        return $albums;
    }

    public function albumform(){

        $table_bands=Band::all();

        return view('albums.add_album',compact('table_bands'));
    }

    public function addAlbum(Request $request){

        $albumdetails=request()->validate([

            "name"=>"required|string|max:50",
            "cover"=>"required|image",
            "date_of_release"=>"required|date",
            'band_id' => 'required|integer',
        ]);

        if ($request->hasFile('cover')) {
            $albumdetails['cover'] = $request->file('cover')->store('album_photos', 'public'); // Save photo
        }
        $newalbum=Album::create($albumdetails);

        return redirect()->route('show.albums')->with("message","Álbum adicionado com successo.");

    }

    public function deleteAlbum(Album $album)
{
    $album->delete();
    return redirect()->back()->with('message', 'Álbum apagado.');
}

public function getEditAlbum(Album $album){

    return view('editAlbum',compact('album'));

}

public function editAlbum(Request $request,Album $album){

    if(Auth::user()->user_type==1 ||Auth::user()->user_type==2 ){

        $request->validate([

            'name'=>'required|string',
            'cover'=>'required|file',
            'date_of_release'=>'required|date',
        ]);
    
        $album->update([
    
            'name'=>$request->name,
            'cover'=>$request->cover,
            'date_of_release'=>$request->date_of_release,
        ]);

        return redirect()->route('bands.albums', $album->band_id)->with('message', 'Álbum atualizado com successo.');

    }

    return redirect()->route('bands.albums',$album->band_id)->with('message','User sem autorização.');

}
}
