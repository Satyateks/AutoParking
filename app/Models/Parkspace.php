<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkspace extends Model
{
    use HasFactory;

    protected $table='parking_space';
    protected $guard=[];

protected $fillable = ['id', /* other fillable attributes */];

    public $timestamp=false;




}
