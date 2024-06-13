<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Rdv extends Model
{
    use HasFactory;


    public function usern(){
        return $this->belongsTo(User::class , "user_n" , "id");
    }

    public function userp(){
        return $this->belongsTo(User::class , "user_p" , "id");
    }
        
}
