<?php
 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Calendrier;
 
class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
 
    public function registerUser(Request $request){
        


        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);


        $user = new User();
 
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->type === 'normal'){
            $user->category = 'aucun';
        }else{
            $user->category = $request->category;
        }
        if($request->type === 'normal'){
            $user->adresse = 'aucun';
        }else{
            $user->adresse = $request->adresse;
        }
        $user->type = $request->type;
            $user->password = Hash::make($request->password);  // Hash the password
            //$user->password = $request->password;
        $user->desc = "aucun";
 
        $user->save();

        if($request->type === 'professionnel'){
            $calendrier = new Calendrier();
            $calendrier->user_p= $user->id;
            $calendrier->save();
        }

        Auth::login($user);
        // return back()->with('success', 'Register successfully');
        return redirect('/recherche');
    }
 
    public function login(){
        return view('login');
    }
 
    public function loginUser(Request $request){
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
 
        if (Auth::attempt($credetials)) {
            return redirect('/recherche')->with('success', 'Login Success');
        }
 
        return back()->with('error', 'Error Email or Password');
    }
 
    public function logout(){
        Auth::logout();
 
        return redirect()->route('login');
    }


    public function choose(){
        $user = User::find(auth()->id());
        if($user->type === "normal"){
            return redirect ('/rdv')->with('id', $user->id);
        }else{
            return redirect ('/grdv')->with('id', $user->id);;
        }
    }
}



