<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;
use App\Property;

class RoomsController extends Controller
{
    public function create($id)
    {
        $property = Property::findOrFail($id);
        $room = new Room;
        return view('rooms.create',[
           'room' => $room, 
           'property' => $property,
        ]);
    }
    
    public function store(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
            'rent' => 'required',
        ]);


        $room = new Room;
        $room->property_id = $id;
        $room->name = $request->name;
        $room->rent = $request->rent;
        $room->security_deposit = $request->security_deposit;
        $room->floor_plan = $request->floor_plan;
        $room->floor_space = $request->floor_space;
        $room->memo = $request->memo;
        $room->save();
        
        return back();
    }
    
    public function show($id)
    {
        $room = Room::findOrFail($id);
        $property = Property::findOrFail($room->property_id);
        
        if(\Auth::id() == $property->user_id){
            return view('rooms.show', [
               'room' => $room,
               'property' => $property,
            ]);
        }else{
            return redirect('/');
        }
    }
    
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $property = Property::findOrFail($room->property_id);
        
        if(\Auth::id() == $property->user_id){
            return view('rooms.edit', [
               'room' => $room,
               'property' => $property,
            ]);
        }else{
            return redirect('/');
        }
    }
    
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'rent' => 'required',
        ]);

        $room = Room::findOrFail($id);
        $property = Property::findOrFail($room->property_id);
        
        if(\Auth::id() == $property->user_id){
            $room->property_id = $property->id;
            $room->name = $request->name;
            $room->rent = $request->rent;
            $room->security_deposit = $request->security_deposit;
            $room->floor_plan = $request->floor_plan;
            $room->floor_space = $request->floor_space;
            $room->memo = $request->memo;
            $room->save();
        
            return redirect()->action('RoomsController@show', ['room' => $room]);
        }else{
            return redirect('/');
        }
    }
    
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        
        if (\Auth::id() === $room->property->user_id) {
            $room->delete();
        }

        return redirect('/');
    }
}
