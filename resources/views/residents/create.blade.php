@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <h1 class=text-center>{!! $room->property->name.$room->name !!}</h1>
            {!! Form::model($resident, ['route' => ['rooms.residents.store', $room->id]]) !!}

                <div class="form-group">
                    {!! Form::label('name', '氏名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('date_of_birth', '生年月日:') !!}
                    {!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('tel', 'TEL:') !!}
                    {!! Form::text('tel', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('rent', '家賃:') !!}
                    {!! Form::text('rent', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('security_deposit', '敷金:') !!}
                    {!! Form::text('security_deposit', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('move_in_date', '入居日:') !!}
                    {!! Form::date('move_in_date', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('move_out_date', '退去日:') !!}
                    {!! Form::date('move_out_date', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('memo', '備考:') !!}
                    {!! Form::textarea('memo', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
            {!! link_to_route('rooms.show', '部屋詳細に戻る', ['room' => $room->id]) !!}
        </div>
    </div>

@endsection