<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Rdv;
use App\Models\Avis;
use App\Models\Calendrier;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'category',
        'type',
        'adresse',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function rdvs_n(){
        return $this->hasMany(Rdv::class , "user_n" , "id");
    }

    public function rdvs_p(){
        return $this->hasMany(Rdv::class , "user_p" , "id");
    }


    public function Avis_n(){
        return $this->hasOne(Avis::class , "user_n" , "id");
    } 

    public function Avis_p(){
        return $this->hasOne(Avis::class , "user_p" , "id");
    } 


    public function Calendrier(){
        return $this->hasOne(Calendrier::class , "user_p" , "id");
    } 
        

}
