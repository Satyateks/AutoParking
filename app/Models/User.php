<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   protected $table='users';
   protected $fillable=[

    'name',
    'email',
    'phone',
    'password'

   ];
   public $timestamp=false;

   public function park_space()
   {
       return $this->hasMany(User_order::class,'user_id','id');
   }

   public function master_data()
   {
       return $this->hasMany(Master::class,'master_id','id');
   }


//    public $park_space;

//    // Or define a getter method
//    public function getParkSpaceAttribute()
//    {
//        return $this->attributes['park_space'];
//    }

}
