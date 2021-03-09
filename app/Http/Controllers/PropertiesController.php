<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Property;
use App\Room;

class PropertiesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $properties = $user->properties()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'properties' => $properties,
            ];
        }

        return view('welcome', $data);
    }
    
    public function create()
    {
        $property = new Property;
        
        return view('properties.create',[
           'property' => $property, 
        ]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:30',
            'address' => 'required|max:255',
            'site_area' => 'max:5',
            'year_of_construction' => 'max:4',
            'number_of_buildings' => 'max:2',
        ]);

        $request->user()->properties()->create([
            'name' => $request->name,
            'address' => $request->address,
            'site_area' => $request->site_area,
            'year_of_construction' => $request->year_of_construction,
            'number_of_buildings' => $request->number_of_buildings,
            'memo' => $request->memo,
        ]);

        return redirect('/');
    }
    
    public function show($id)
    {
        
        $property = Property::findOrFail($id);
        $rooms = Room::where('property_id', $id)->get()->all();
        
        if(\Auth::id() == $property->user_id){
            return view('properties.show', [
                'property' => $property,
                'rooms' => $rooms,
            ]);
        }else{
            return redirect('/');
        }
    }
    
    public function edit($id)
    {
        $property = Property::findOrFail($id);

        if(\Auth::id() == $property->user_id){
            return view('properties.edit', [
                'property' => $property,
            ]);
        }else{
            return redirect('/');
        }
    }
    
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:30',
            'address' => 'required|max:255',
            'site_area' => 'max:5',
            'year_of_construction' => 'max:4',
            'number_of_buildings' => 'max:2',
        ]);

        $property = Property::findOrFail($id);
        
        if(\Auth::id() == $property->user_id){
            $property->name = $request->name;
            $property->address = $request->address;
            $property->site_area = $request->site_area;
            $property->year_of_construction = $request->year_of_construction;
            $property->number_of_buildings = $request->number_of_buildings;
            $property->memo = $request->memo;
            $property->save();
    
            return redirect()->action('PropertiesController@show', ['property' => $property]);
        }else{
            return redirect('/');
        }
    }
    
    public function destroy($id)
    {
        $property = \App\Property::findOrFail($id);

        if (\Auth::id() === $property->user_id) {
            $property->delete();
        }

        return redirect('/');
    }
}
