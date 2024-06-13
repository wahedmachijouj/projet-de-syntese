<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rdv;
use App\Models\User;
use App\Models\Calendrier;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RendController extends Controller
{
    public function normalRendez(Request $request){

        // dd(auth::id());
        // $userId = session('id');
        // $data = Rdv::where('user_n',$userId)->get();
        // $data = Rdv::where('user_n',auth::id())->get();
        // return view('rdv',['rdvs'=>$data]);


        if($request->name != null){
            // ->toArray()
            $p_name = User::where('name',"like","%$request->name%")->where('type' , 'professionnel')->pluck('id');
            $rdv = Rdv::whereIn('user_p',$p_name)->where('user_n',auth::id())->get();
            // $rdv = Rdv::where('user_p',$p_name)->where('user_n',auth::id())->get();
            return view('rdv',['rdvs'=>$rdv]);
        }else{
            $data = Rdv::where('user_n',auth::id())->get();
            return view('rdv',['rdvs'=>$data]);
        }
    }

    public function proRendez(Request $request){
        // dd(auth::id());
        // $userId = session('id');
        // $data = Rdv::where('user_p',$userId)->get();
        $now = Carbon::now();
        $datenow = $now->toDateString();
        if($request->date != null){
            $data = Rdv::where('user_p',auth::id())->whereDate('date',$request->date)->get();
            // $data = Rdv::where('user_p',auth::id())->whereDate('date',$datenow)->get();
        }else{
            $data = Rdv::where('user_p',auth::id())->whereDate('date',$datenow)->get();
        }
        return view('grdv',['rdvs'=>$data]);
    }

    public function prenezRendz(Request $request){


        $request->validate([
            'user_n' => 'required|integer',
            'user_p' => 'required|integer',
            'tele' => 'required|integer',
            'email' => 'required|email',
            'info' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $rdv = new Rdv();
        $rdv->tele = $request->tele;
        $rdv->email =  $request->email;
        $rdv->date =  $request->date;
        $rdv->info =  $request->info;
        $rdv->user_n=  $request->user_n;
        $rdv->user_p =  $request->user_p;
        $rdv->save();
        $i = $request->user_p;

        
        $dateString = $rdv->date;
        $dateTime = Carbon::parse($dateString);
        $formattedDate = $dateTime->format('Y-m-d H:i:s');

        $calendrier = Calendrier::where('user_p',$i)->first();
        
        $tab = []; 
        
        if($calendrier->dates_indis == null){
            $tab[]=$formattedDate;
            $calendrier->dates_indis = json_encode($tab);
            $calendrier->save();
        }else{
            $ardates = $calendrier->dates_indis;
             $prev = json_decode($ardates) ;

             $mergedArray = array_values(array_merge($prev, [$formattedDate]));

             $calendrier->dates_indis=json_encode($mergedArray);
             $calendrier->save();
        }


        return redirect('/profil/'.$i);
    }

    public function supprimerRenez(String $id){
        $rdv = Rdv::find($id);

        $i = $rdv->user_p;

        $dateString = $rdv->date;
        $dateTime = Carbon::parse($dateString);
        $formattedDate = $dateTime->format('Y-m-d H:i:s');


        $calendrier = Calendrier::where('user_p',$i)->first();
            
        $ardates = $calendrier->dates_indis;
        $prev = json_decode($ardates) ;

        $table=[];
            foreach($prev as $date){
                if($date != $formattedDate){
                    $table[]=$date ;
                }
            }

        if(count($table) == 0){
            $calendrier->dates_indis= null;
        }else{
            $calendrier->dates_indis=json_encode($table);
        }
    

        $calendrier->save();  
        $rdv->delete();



        return redirect('/choose');
    }

    public function modifierRenez(String $id){
        $action1 = route('updateRdv',['id'=>$id]);
        $rdv = Rdv::find($id);
        $other = User::find($rdv->user_p);
        return view ('profil',compact('action1','rdv','other'));

    }

    public function updateRdv(Request $request , String $id){

        $request->validate([
            'user_n' => 'required|integer',
            'user_p' => 'required|integer',
            'tele' => 'required|integer',
            'email' => 'required|email',
            'info' => 'required|string|max:255',
            'date' => 'required|date',
        ]);



            // dd($id);
            $rdv = Rdv::find($id);
            $rdv->tele = $request->tele;
            $rdv->email = $request->email;
            $rdv->info = $request->info;
            

            $i = $rdv->user_p;

        
            $anciendateString = $rdv->date;
            $anciendateTime = Carbon::parse($anciendateString);
            $ancienformattedDate = $anciendateTime->format('Y-m-d H:i:s');

            $dateString = $request->date;
            $dateTime = Carbon::parse($dateString);
            $formattedDate = $dateTime->format('Y-m-d H:i:s');

            $calendrier = Calendrier::where('user_p',$i)->first();
            
            $ardates = $calendrier->dates_indis;
            $prev = json_decode($ardates) ;
            $table=[];

            foreach($prev as $date){
                if($date == $ancienformattedDate){
                    $table[] =  $formattedDate;
                }else{
                    $table[]=$date;
                }
            }

    
            $calendrier->dates_indis=json_encode($table);
            $calendrier->save();  
            
            $rdv->date = $request->date;
            $rdv->save();

            return redirect('/choose');
    }

}
