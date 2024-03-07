<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets_type extends Model
{
    use HasFactory;
    protected $table = 'tickets_type';

    public function Ticket()
    {
        return $this->hasMany(Ticket::class,'type_id','id');
    }
}
