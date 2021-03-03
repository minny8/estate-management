@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-6">
            {!! Form::model($property, ['route' => 'properties.store']) !!}

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
                    {!! Form::text('memo', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>


@endsection