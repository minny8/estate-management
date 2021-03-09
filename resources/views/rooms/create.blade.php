@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <h1 class=text-center>{{ $property->name }}</h1>
            {!! Form::model($room, ['route' => ['properties.rooms.store', $property->id]]) !!}
                
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
                    {!! Form::textarea('memo', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
            {!! link_to_route('properties.show', '物件詳細に戻る', ['property' => $property->id]) !!}
        </div>
    </div>

@endsection