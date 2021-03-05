@extends('layouts.app')

@section('content')

    <h1 class=text-center>{!! $property->name !!}</h1>

    <div class="row">
        <div class="offset-3 col-6">
            {!! Form::model($property, ['route' => ['properties.update', $property->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', '物件名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('address', '住所:') !!}
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('site_area', '敷地面積:') !!}
                    {!! Form::text('site_area', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('year_of_construction', '建築年:') !!}
                    {!! Form::text('year_of_construction', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('number_of_buildings', '棟数:') !!}
                    {!! Form::text('number_of_buildings', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('number_of_rooms', '部屋数:') !!}
                    {!! Form::text('number_of_rooms', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('memo', '備考:') !!}
                    {!! Form::textarea('memo', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row m-auto">
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
            {!! Form::model($property, ['route' => ['properties.destroy', $property->id], 'method' => 'delete']) !!}
                    <span class="ml-2">{!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}</span>
            {!! Form::close() !!}
            </div>
            {!! link_to_route('properties.show', '物件詳細に戻る', ['property' => $property->id]) !!}
        </div>
    </div>

@endsection