@extends('includes.layout')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <h1 class="text-center mb-2">FutNaTV</h1>
            <p class="lead">Jogos do Dia</p>
        </div>
    </div>
    <div class="row mt-3">
        @foreach($matches as $match)
        <div class="col-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">{{ $match->team1 }} X {{ $match->team2 }}</h5>
                    <p class="card-text">{{ $match->formatted_date }}</p>
                    @foreach($match->channels()->get() as $channel)
                    @if($channel->url_image)
                    <img src="{{ asset('storage/channels/' . $channel->url_image) }}" alt="{{ $channel->name }}" class="img-thumbnail" style="max-width: 100px">
                    @else
                    {{ $channel->name }}
                    @endif
                    @endforeach
                </div>
            </div>
        </div>


        @endforeach
    </div>
</div>
@endsection