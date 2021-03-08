@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @if (count($properties) > 0)
            <div class="row">
                @foreach ($properties as $property)
                    <div class="card-deck col-sm-3 mb-5">
                      <div class="card">
                        <a href="/properties/{!! $property->id !!}" class="card_body text-center text-dark">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-light">{!! $property->name !!}</li>
                            <li class="list-group-item ">{!! App\Property::tenancy_rate($property->id) !!}</li>
                          </ul>
                        </a>
                      </diV>
                    </div>
                @endforeach
            </div>
            <div class="offset-sm-10">
            {!! link_to_route('properties.create', '物件の登録',[],['class' => 'btn btn-md btn-primary']) !!}
            </div>
        @else
            <div class="center jumbotron text-center">
                <h1>物件を登録しましょう</h1>
                {!! link_to_route('properties.create', '物件の登録',[],['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        @endif
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Estate Management</h1>
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary mr-3']) !!}
                {!! link_to_route('signup.get', 'サインアップ', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection