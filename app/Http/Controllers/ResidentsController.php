<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;
use App\Resident;

class ResidentsController extends Controller
{
    public function create($id)
    {
        $room = Room::findOrFail($id);
        $resident = new Resident;
        
        if(\Auth::id() == $room->property->user_id){
            return view('residents.create',[
               'room' => $room, 
               'resident' => $resident,
            ]);
        }else{
            return redirect('/');
        }
    }
    
    public function store(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'tel' => 'required|max:255',
        ]);
        
        $room = Room::findOrFail($id);
        
        if(\Auth::id() == $room->property->user_id){
            $room->residents()->create([
               'name' => $request->name,
               'date_of_birth' => $request->date_of_birth,
               'tel' => $request->tel, 
               'rent' => $request->rent,
               'security_deposit' => $request->security_deposit,
               'move_in_date' => $request->move_in_date,
               'move_out_date' => $request->move_out_date,
               'memo' => $request->memo,
            ]);
            return redirect()->action('RoomsController@show', ['room' => $room]);
        }else{
            return redirect('/');
        }
    }
    
    public function show($id)
    {
        $resident = Resident::findOrFail($id);
        
        if(\Auth::id() == $resident->room->property->user_id){
            return view('residents.show',[
                'resident' => $resident,
            ]);
        }else{
            return redirect('/');
        }
    }
    
    public function edit($id)
    {
        $resident = Resident::findOrFail($id);
        
        if(\Auth::id() == $resident->room->property->user_id){
            return view('residents.edit',[
                'resident' => $resident,
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

        $resident = Resident::findOrFail($id);
        $room = Room::findOrFail($resident->room_id);
        
        if(\Auth::id() == $resident->room->property->user_id){
            $resident->room_id = $room->id;
            $resident->name = $request->name;
            $resident->date_of_birth = $request->date_of_birth;
            $resident->tel = $request->tel;
            $resident->rent = $request->rent;
            $resident->security_deposit = $request->security_deposit;
            $resident->move_in_date = $request->move_in_date;
            $resident->move_out_date = $request->move_out_date;
            $resident->memo = $request->memo;
            $resident->save();
            
            return redirect()->action('ResidentsController@show', ['resident' => $resident]);
        }else{
            return redirect('/');
        }
    }
    
    public function destroy($id)
    {
        if(\Auth::id() == $resident->room->property->user_id){
            $resident = Resident::findOrFail($id);
            $room = Room::findOrFail($resident->room_id);
            $resident->delete();
            
            return redirect()->action('RoomsController@show', ['room' => $room]);
        }else{
            return redirect('/');
        }
    }
}
