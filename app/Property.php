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
    
    public static function now_living($roomId)
    {
        $today = date('Y-m-d');
        $room = Room::findOrFail($roomId);
        $lastResident = $room->residents()->orderBy('move_in_date', 'desc')->first();
        if($lastResident != null && ($lastResident->move_out_date > $today || $lastResident->move_out_date == null))
        {
            return $lastResident;
        }else{
            return null;
        }
    }
    
}
