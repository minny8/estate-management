@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <h1 class=text-center>{{ $resident->room->property->name . $resident->room->name }}</h1>
            {!! Form::model($resident, ['route' => ['residents.update', $resident->id], 'method' => 'put']) !!}

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
                <div class="row m-auto">
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
            {!! Form::model($resident, ['route' => ['residents.destroy', $resident->id], 'method' => 'delete']) !!}
                    <span class="ml-2">{!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}</span>
            {!! Form::close() !!}
            </div>
            {!! link_to_route('residents.show', '居住者詳細に戻る', ['resident' => $resident->id]) !!}
        </div>
    </div>

@endsection