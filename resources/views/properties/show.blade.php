@extends('layouts.app')

@section('content')

    <h1 class="text-center">{{ $property->name }}</h1>

    <table class="table table-bordered text-center mb-0">
        <tbody>
            <tr>
                <td class="bg-light" style="width:10%">住所</td>
                <td style="width:40%">{{ $property->address }}</td>
                <td class="bg-light" style="width:10%">棟数</td>
                <td>{{ $property->number_of_buildings }}棟</td>
            </tr>
            <tr>
                <td class="bg-light">敷地面積</td>
                <td>{{ number_format($property->site_area) }}㎡</td>
                <td class="bg-light">部屋数</td>
                <td>{{ App\Property::num_of_rooms($property->id) }}部屋</td>
            </tr>
            <tr>
                <td class="bg-light">建築年</td>
                <td>{{ $property->year_of_construction }}年</td>
                <td class="bg-light">入居率</td>
                <td>{{ App\Property::tenancy_rate($property->id) }}</td>
            </tr>
            <tr>
                <td class="bg-light align-middle">備考</td>
                <td class="text-left pl-4" colspan="3">{!! nl2br(e($property->memo)) !!}</td>
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
            @foreach($rooms as $room)
            <tr>
                <td class="align-middle">{{ link_to_route('rooms.show', $room->name, ['room' => $room->id]) }}</td>
                <td>
                    @if (App\Property::living_status($room->id) == null)
                        {!! link_to_route('rooms.residents.create','空室',['room' => $room->id]) !!}
                    @elseif(App\Property::living_status($room->id)->move_in_date > date('Y-m-d'))
                        {!! link_to_route('residents.show', App\Property::living_status($room->id)->name, ['resident' => App\Property::living_status($room->id)->id]).nl2br(e(PHP_EOL)).date('m月d日',strtotime(App\Property::living_status($room->id)->move_in_date)).'入居' !!}
                    @elseif(App\Property::living_status($room->id)->move_out_date > date('Y-m-d'))
                        {!! link_to_route('residents.show', App\Property::living_status($room->id)->name, ['resident' => App\Property::living_status($room->id)->id]).nl2br(e(PHP_EOL)).date('m月d日',strtotime(App\Property::living_status($room->id)->move_out_date)).'退去' !!}
                    @else
                        {!! link_to_route('residents.show', App\Property::living_status($room->id)->name, ['resident' => App\Property::living_status($room->id)->id]) !!}
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
         <p class="text-right">{{ link_to_route('properties.rooms.create', '部屋の登録', ['property' => $property->id]) }}</p>
    </div>
@endsection