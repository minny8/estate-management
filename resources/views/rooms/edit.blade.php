@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <h1 class="text-center">{!! $property->name !!}</h1>
            
            {!! Form::model($room, ['route' => ['rooms.update', $room->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('name', '部屋名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('rent', '基本家賃:') !!}
                    {!! Form::text('rent', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('security_deposit', '基本敷金:') !!}
                    {!! Form::text('security_deposit', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('floor_plan', '間取り:') !!}
                    {!! Form::text('floor_plan', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('floor_space', '床面積:') !!}
                    {!! Form::text('floor_space', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('memo', '備考:') !!}
                    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row m-auto">
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                
            {!! Form::close() !!}
            {!! Form::model($room, ['route' => ['rooms.destroy', $room->id], 'method' => 'delete']) !!}
                    <span class="ml-2">{!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}</span>
            {!! Form::close() !!}
            </div>
            {!! link_to_route('rooms.show', '部屋詳細に戻る', ['room' => $room->id]) !!}
        </div>
    </div>

@endsection