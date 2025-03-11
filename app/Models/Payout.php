<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    use HasFactory;
    protected $table = "payouts";
    protected $guarded = [];

    public function owners(){
        return $this->belongsTo(Owner::class, 'owner_id','id');
    }
}
