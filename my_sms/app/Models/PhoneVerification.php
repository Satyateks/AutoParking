<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhoneVerification extends Model
{
    protected $primaryKey = 'pv_id';
    protected $table = 'phone_verification';

    protected $fillable = array('phone','otp','is_verified');

   

}
