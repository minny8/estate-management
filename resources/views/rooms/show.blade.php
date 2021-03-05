@extends('layouts.app')

@section('content')
    
    <h1 class="text-center">{!! $property->name . $room->name !!}</h1>
    <div class="col-sm-4 offset-sm-4">
        <table class="table table-bordered text-center mb-0">
            <tbody>
                <tr>
                    <td class="bg-light" style="width:10%">基本家賃</td>
                    <td style="width:25%">{!! $room->rent !!}</td>
                </tr>
                <tr>
                    <td class="bg-light" style="width:10%">基本敷金</td>
                    <td>{!! $room->security_deposit !!}</td>
                </tr>
                <tr>
                    <td class="bg-light">間取り</td>
                    <td>{!! $room->floor_plan !!}</td>
                </tr>
                <tr>
                    <td class="bg-light">床面積</td>
                    <td>{!! $room->floor_space!!}㎡</td>
                </tr>
                <tr>
                    <td class="bg-light">現況</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="bg-light align-middle">備考</td>
                    <td class="text-left pl-4">{!! nl2br(e($room->memo)) !!}</td>
                </tr>
            </tbody>
        </table>
        
        <span class="mb-4">{!! link_to_route('properties.show', '建物情報に戻る', ['property' => $room->property_id]) !!}</span>
        <span class="float-right mb-4">{!! link_to_route('rooms.edit', '部屋情報の編集', ['room' => $room->id]) !!}</span>
        
    </div>
@endsection