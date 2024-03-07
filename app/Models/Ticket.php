<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'place_nbr',
        'event_id',
        'type_id'
    ];
    public function tickets_type()
    {
        return $this->belongsTo(tickets_type::class, 'type_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
