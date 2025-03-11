<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kyc extends Model
{
    use HasFactory;
    protected $table='kyc';
    protected $guard=[];

    protected $casts = [
        'id' => 'integer',
    ];
   public $timestamps = false;

   protected $fillable=[
    'fname'
    ,'address',
    'country',
    'state',

 ];
}
