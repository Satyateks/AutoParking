<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recent_order extends Model
{
    use HasFactory;
    protected $table='recent_order';
    protected $guard=[];
    public function owners()
    {
        return $this->hasMany(Owner::class, 'id', 'owner_id');
    }

}
