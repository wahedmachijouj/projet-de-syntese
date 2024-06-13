<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Avis extends Model
{
    use HasFactory;
    protected $table = 'aviss';
    public function userp(){
        return $this->belongsTo(User::class , "user_p" , "id");
    }


    public function usern(){
        return $this->belongsTo(User::class , "user_n" , "id");
    }

        
}
