<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
        'name', 'date_of_birth', 'tel', 'rent', 'security_deposit', 'move_in_date', 'move_out_date', 'memo'
    ];
    
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    
    
}
