<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Avis;

class AvisController extends Controller
{   
    public function pageavis(String $id){
        return view('createAvis' ,['id'=>$id]);
    }

    public function add(Request $request , String $id){
        $avis = new Avis();
        $avis->avis = $request->avis;
        $avis->user_p = $id;
        $avis->user_n = auth::id();

        $avis->save();
        return redirect('/profil/'.$id);
    }

    public function delete(String $id){
        $user_p = Avis::where('id',$id)->value('user_p');
        $avis = Avis::find($id);
        $avis->delete();
        return redirect('/profil/'.$user_p);
    }
}
