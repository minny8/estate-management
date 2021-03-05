<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name' , 'address', 'site_area', 'year_of_construction', 'number_of_buildings', 'number_of_rooms', 'memo'
    ];
        
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    
}
