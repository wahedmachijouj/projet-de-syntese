<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Calendrier;
use App\Models\Avis;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ProController extends Controller
{
    public function recherche(){
        $data = User::where('type','professionnel')->get();
        return view('recherche' ,['users'=>$data]);
    }

    public function find(Request $request){
        // if($request->name == "home"){
        //     return redirect('home');

        // }
        if($request->name!=null and $request->category!='aucun'){
            $data = User::where('type','professionnel')->where("name","like","%$request->name%")->where('category',$request->category)->get();
            if($data->count() > 0 ){
                return view('recherche' ,['users'=>$data]);
            }
            $name= $request->name;
                return view('recherche' ,['name'=>$name]);
        }

        if($request->name!=null and $request->category=='aucun'){
            $data = User::where('type','professionnel')->where("name","like","%$request->name%")->get();
            if($data->count() > 0 ){
                return view('recherche' ,['users'=>$data]);
            }
            $name= $request->name;
                return view('recherche' ,['name'=>$name]);
        }

        if($request->name==null and $request->category!='aucun'){
            $data = User::where('type','professionnel')->where('category',$request->category)->get();
            if($data->count() > 0 ){
                return view('recherche' ,['users'=>$data]);
            }
        }

        if($request->name==null and $request->category=='aucun'){
            return redirect('/recherche');
        }



    }

    public function profil($id){
        // return 'Je suis la page ' . $id . ' !';
        // return view('profil', compact('number'));
        // return view('profil', ['number' => $number]);
        

        $number = $id;

        // if(User::find($number)->type == 'professionnel'){
        //     $calendrier = Calendrier::where("user_p",$number)->first();
        //     //dd($calendrier->startHour .'   '.$calendrier->endHour .'   '. $calendrier->interval .'   '.$calendrier->dates_indis );
        //     // $datenow = Carbon::now()->format('Y-m-j H:m:s');
        //     $now = Carbon::now();
        //     $year = $now->year;
        //     $month = $now->month; 
        //     $day = $now->day;
        //     $startHour= $calendrier->startHour;
        //     $endHour = $calendrier->endHour;
        //     $interval= $calendrier->interval;
        //     $dates_indis = $calendrier->dates_indis;
        //     $table = [];
        //     $x= 0;


        //     // $isPast = $datenow->isPast();



        //     for($i=$startHour ; $i<$endHour ; $i++){
        //         for($j= $x ; $j<60 ; $j+= $interval){
        //             if ($j+$interval > 60){
        //                 $x = $interval - (60-$j);
        //                 $datenow = Carbon::create($year, $month, $day, $i, $j, 0);
        //                 $datenow = $datenow->format('Y-m-j H:i:s');
        //                 // dump($datenow);
        //                 $datenow = Carbon::parse($datenow);
        //                 // dump($datenow);
        //                 $isPast = $datenow->isPast();
        //                 // dump($isPast);
        //                 $datenow = $datenow->format('Y-m-j H:i:s');
        //                 // dump($datenow);
        //                 if($isPast){
        //                     $table[]= $datenow;
        //                 }
        //             }else{
        //                 $datenow = Carbon::create($year, $month, $day, $i, $j, 0);
        //                 $datenow = $datenow->format('Y-m-j H:i:s');
        //                 // dump($datenow);
        //                 $datenow = Carbon::parse($datenow);
        //                 // dump($datenow);
        //                 $isPast = $datenow->isPast();
        //                 // dump($isPast);
        //                 $datenow = $datenow->format('Y-m-j H:i:s');
        //                 // dump($datenow);
        //                 if($isPast){
        //                     $table[]= $datenow;
        //                 }
        //             }
        //         }
        //     }
        //     // dump($table);

        //     if($calendrier->dates_indis == null){
        //         $calendrier->dates_indis  = json_encode($table);
        //     }else{
        //         $ardates = $calendrier->dates_indis;
        //         $prev = json_decode($ardates) ;

        //         $mergedArray = array_values(array_merge($prev, $table));

        //         $calendrier->dates_indis=json_encode($mergedArray);
        //     }
        //     $calendrier->save();

        // }


        if(Auth::id() == $number){
            $user = User::find($number);
            // return view('profil', ['user'=>$user]);
            return view('profil', compact('user'));
            // dd('user : '. $user);
        }else{
            $other = User::find($number);
            // return view('profil' ,['other'=>$other]);
            $action1=route('createRdv') ;
            $aviss = Avis::where('user_p',$number)->get();
            return view('profil', compact('other','action1','aviss'));
            // dd('other : '. $other->calendrier);
        }
    }

    public function modifier(Request $request ,string $id){
        $user = User::find($id);
 
        $user->name = $request->name;
        if($user->category != 'aucun'){
        $user->category = $request->category;
        }
        if($user->adresse != 'aucun'){
            $user->adresse = $request->adresse;
        }
        $user->email = $request->email;
        if($request->password != null){
        $user->password = Hash::make($request->password);
        }
        $user->desc = $request->desc;

        $user->save();
        $num = $id;
        return redirect('profil/'.$id);
    }

    public function saveInCalendrier(Request $request , String $id){
        $days = $request->input('area_jour');
        $hour = $request->input('area_heur');
        $startHour = $request->input('startHour');
        $endHour = $request->input('endHour');
        $interval = $request->input('interval');
        $rdates=[];

        



        if(!Calendrier::where('user_p',$id)->count()== 0){

            $calendrier = Calendrier::find(Calendrier::where('user_p', $id)->value('id'));
            
            if($hour != null){
                $dates = explode(',', $hour);
                foreach($dates as $date){
                    $dateTime = Carbon::parse($date);
                    $date = $dateTime->format('Y-m-d H:i:s');
                    $rdates[]= $date;
                }
            }
    
    
            if($days != null){
                $dates = explode(',', $days);
    
                if($startHour==null){
                    $startHour==  $calendrier->startHour;
                }
                if($endHour==null  ){
                    $endHourr==  $calendrier->endHour;
                }
                if($interval==null ){
                    $interval==  $calendrier->interval;
                }

                foreach($dates as $date){
                    $dateTime = Carbon::parse($date);
                    $date = $dateTime->format('Y-m-d');
    
                    for ($h = $startHour ; $h < $endHour; $h++) {
                        for($m=0 ; $m < 60 ; $m+=$interval){
                            $H = $h;
                            $M = $m;
                            if ($H < 10){
                                $H = '0'.$H;
                            }
                            if ($M < 10){
                                $M = '0'.$M;
                            }
                            $final = $H.":".$M.":00";
                            $rdates[]= $date.' '.$final;
                        }
    
                    }
                }
    
            }


            if($request->input('startHour')==null){
                $hhh =  8;
            }else{
                $hhh = $request->input('startHour') ;
            }
            if($request->input('endHour')==null  ){
                $mmm=  17;
            }else{
                $mmm = $request->input('endHour');
            }
            if($request->input('interval')==null ){
                $iii= 30;
            }else{
                $iii = $request->input('interval');
            }
            


            if($days!=null or $hour!=null){
                if($calendrier->dates_indis != null){
                    $ardates = $calendrier->dates_indis;
                    $prev = json_decode($ardates) ;

                    $mergedArray = array_values(array_merge($prev, $rdates));

                    $calendrier->dates_indis=json_encode($mergedArray);
                }else{
                    $calendrier->dates_indis=json_encode($rdates);
                }
            }
            $calendrier->startHour=	$hhh;
            $calendrier->endHour= $mmm;
            $calendrier->interval=  $iii;
            $calendrier->save();
        }

        return redirect ('/profil/'.$id);
    }
}
