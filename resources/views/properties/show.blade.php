@extends('layouts.app')

@section('content')

    <h1 class="text-center">{!! $property->name !!}</h1>

    <table class="table table-bordered text-center mb-0">
        <tbody>
            <tr>
                <td class="bg-light" style="width:10%">住所</td>
                <td style="width:40%">{!! $property->address !!}</td>
                <td class="bg-light" style="width:10%">棟数</td>
                <td>{!! $property->number_of_buildings !!}棟</td>
            </tr>
            <tr>
                <td class="bg-light">敷地面積</td>
                <td>{!! $property->site_area !!}㎡</td>
                <td class="bg-light">部屋数</td>
                <td>{!! $property->number_of_rooms !!}部屋</td>
            </tr>
            <tr>
                <td class="bg-light">建築年</td>
                <td>{!! $property->year_of_construction !!}年</td>
                <td class="bg-light">入居率</td>
                <td></td>
            </tr>
            <tr>
                <td class="bg-light">備考</td>
                <td class="text-left pl-4" colspan="3">{!! $property->memo !!}</td>
            </tr>
        </tbody>
    </table>
    <p class="text-right mb-4">{!! link_to_route('properties.edit', '建物情報の編集', ['property' => $property->id]) !!}</p>
    
    <div class="col-sm-4 offset-sm-4">
        <table class="table table-bordered text-center">
            <tr>
                <td class="bg-light">部屋名</td>
                <td class="bg-light">入居者名</td>
            </tr>
            <tr>
                <td>101号室</td>
                <td>佐藤楓</td>
            </tr>
        </table>
         <p class="text-right">部屋を登録する</p>
    </div>
@endsection