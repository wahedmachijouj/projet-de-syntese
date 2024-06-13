<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class Calendrier extends Model
{
    use HasFactory;

    public function userp(){
        return $this->belongsTo(User::class , "user_p" , "id");
    }
}
