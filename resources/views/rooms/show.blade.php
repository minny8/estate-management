@extends('layouts.app')

@section('content')
    
    <h1 class="text-center">{{ $property->name . $room->name }}</h1>
    <div class="col-sm-4 offset-sm-4">
        <table class="table table-bordered text-center mb-0">
            <tbody>
                <tr>
                    <td class="bg-light" style="width:10%">基本家賃</td>
                    <td style="width:25%">{{ number_format($room->rent) }}円</td>
                </tr>
                <tr>
                    <td class="bg-light" style="width:10%">基本敷金</td>
                    <td>{{ number_format($room->security_deposit) }}円</td>
                </tr>
                <tr>
                    <td class="bg-light">間取り</td>
                    <td>{{ $room->floor_plan }}</td>
                </tr>
                <tr>
                    <td class="bg-light">床面積</td>
                    <td>{{ $room->floor_space }}㎡</td>
                </tr>
                <tr>
                    <td class="bg-light align-middle">現況</td>
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