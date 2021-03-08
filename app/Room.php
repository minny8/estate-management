<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'rent', 'security_deposit', 'floor_plan', 'floor_space', 'memo'
    ];
    
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    
    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
    

}
