<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Property;

class PropertiesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            $properties = $user->properties()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'properties' => $properties,
            ];
        }

        // Welcomeビューでそれらを表示
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
            'name' => 'required',
            'address' => 'required|max:255',
        ]);

        $request->user()->properties()->create([
            'name' => $request->name,
            'address' => $request->address,
            'site_area' => $request->site_area,
            'year_of_construction' => $request->year_of_construction,
            'number_of_buildings' => $request->number_of_buildings,
            'number_of_rooms' => $request->number_of_rooms,
            'memo' => $request->memo,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function show($id)
    {
        
        $property = Property::findOrFail($id);

        return view('properties.show', [
            'property' => $property,
        ]);
    }
    
    public function edit($id)
    {
        $property = Property::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('properties.edit', [
            'property' => $property,
        ]);
    }
    
    public function update(Request $request, $id)
    {
         // バリデーション
        $request->validate([
            'name' => 'required',
            'address' => 'required|max:255',
        ]);

        $request->user()->properties()->update([
            'name' => $request->name,
            'address' => $request->address,
            'site_area' => $request->site_area,
            'year_of_construction' => $request->year_of_construction,
            'number_of_buildings' => $request->number_of_buildings,
            'number_of_rooms' => $request->number_of_rooms,
            'memo' => $request->memo,
        ]);

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $property = \App\Property::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $property->user_id) {
            $property->delete();
        }

        // 前のURLへリダイレクトさせる
        return redirect('/');
    }
}