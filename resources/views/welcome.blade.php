@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @if (count($properties) > 0)
            <ul class="list-unstyled row">
                @foreach ($properties as $property)
                    <div class="card-deck col-md-3 mb-5 ">
                      <div class="card" style="max-width: 18rem;">
                        <a href="/properties/{!! $property->id !!}" class="card_body text-center text-dark">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-light"><h4>{!! $property->name !!}</h4></li>
                            <li class="list-group-item ">入居率</li>
                          </ul>
                        </a>
                      </diV>
                    </div>
                @endforeach
            </ul>
            {!! link_to_route('properties.create', '建物の登録',[],['class' => 'btn btn-md btn-primary float-right']) !!}
        @else
            登録しましょう{!! link_to_route('properties.create', '建物の登録',[],['class' => 'btn btn-md btn-primary float-right']) !!}
        @endif
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Estate Management</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection