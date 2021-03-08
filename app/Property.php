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
    
    public function residents()
    {
        return $this->hasManyThrough(Resident::class, Room::class);
    }
    
    public static function num_of_rooms($propertyId)
    {
        $property = Property::findOrFail($propertyId);
        return $property->rooms->count();
    }
    
    public static function living_status($roomId)
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
    
    
    
    public static function tenancy_rate($propertyId)
    {
        
        $today = date('Y-m-d');
        $property = Property::findOrFail($propertyId);
        $nowRsident = $property->residents->where('move_in_date', '<', $today)
                                          ->where('move_out_date', '')
                                          ->count();
        $willMoveOut = $property->residents->where('move_in_date', '<', $today)
                                           ->where('move_out_date', '>', $today)
                                           ->count();
        $moveInNull = $property->residents->where('move_in_date', null)
                                          ->count();
        $sum = $nowRsident + $willMoveOut - $moveInNull;
        $num_of_rooms = $property->rooms->count();
        
        if($num_of_rooms != 0){
            $rate = round($sum/$num_of_rooms*100);
        }else{
            $rate = 0;
        }
        
        return  $sum . '/' . $num_of_rooms . '  (' . $rate . '%)';
    }
}
