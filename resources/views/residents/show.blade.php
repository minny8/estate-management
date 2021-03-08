@extends('layouts.app')

@section('content')
    
    <h1 class="text-center">{!! $resident->room->property->name . $resident->room->name !!}</h1>
    <div class="col-sm-4 offset-sm-4">
        <table class="table table-bordered text-center mb-0">
            <tbody>
                <tr>
                    <td class="bg-light" style="width:10%">入居者名</td>
                    <td style="width:25%">{!! $resident->name !!}</td>
                </tr>
                <tr>
                    <td class="bg-light" style="width:10%">生年月日</td>
                    <td>
                        @if($resident->date_of_birth != null)
                            {!! date('Y年m月d日',strtotime($resident->date_of_birth)) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="bg-light">TEL</td>
                    <td><a href="tel:{!! $resident->tel !!}">{!! $resident->tel !!}</td>
                </tr>
                <tr>
                    <td class="bg-light">家賃</td>
                    <td>{!! number_format($resident->rent) !!}円</td>
                </tr>
                <tr>
                    <td class="bg-light">敷金</td>
                    <td>{!! number_format($resident->security_deposit) !!}円</td>
                </tr>
                <tr>
                    <td class="bg-light">入居日</td>
                    <td>
                        @if($resident->move_in_date != null)
                            {!! date('Y年m月d日',strtotime($resident->move_in_date)) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="bg-light">退去日</td>
                    <td>
                        @if($resident->move_out_date != null)
                            {!! date('Y年m月d日',strtotime($resident->move_out_date)) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="bg-light align-middle">備考</td>
                    <td class="text-left pl-4">{!! nl2br(e($resident->memo)) !!}</td>
                </tr>
            </tbody>
        </table>
        <span class="mb-4">{!! link_to_route('properties.show', '建物情報に戻る', ['property' => $resident->room->property->id]) !!}</span>
        <span class="float-right mb-4">{!! link_to_route('residents.edit', '居住者情報の編集', ['resident' => $resident->id]) !!}</span>
    </div>
@endsection