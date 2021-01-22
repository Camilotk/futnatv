@extends("includes.layout")

@section("content")
@include("includes.menu")
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Jogos - FutNaTV</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            @include('includes.errors')
            @if(isset($match) && $match->id)
            <form action="{{ route('matches-update', ['id' => $match->id]) }} " method="POST">
                {{ method_field("PUT") }}
                @else
                <form action=" {{ route('matches-store') }}" method="post">
                    @endif
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="team1">Time 1</label>
                        <input type="text" name="team1" id="team1" class="form-control" placeholder="nome do primeiro time" value="{{ $match->team1 ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="team2">Nome</label>
                        <input type="text" name="team2" id="team2" class="form-control" placeholder="nome do segundo time" value="{{ $match->team2 ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="date">Data</label>
                        <input type="datetime-local" name="date" id="date" class="form-control" value="{{ $match->date ?? '' }}">
                    </div>

                    <div class="form-group">
                        <h4>Canais</h4>
                        @foreach($channels as $channel)
                        <div class="form-check form-check-inline">
                            @if($match->channels()->find($channel->id))
                            <input type="checkbox" name="channels[]" id="channels-{{ $channel->id }}" value="{{ $channel->id ?? '' }}" checked>
                            @else
                            <input type="checkbox" name="channels[]" id="channels-{{ $channel->id }}" value="{{ $channel->id ?? '' }}">
                            @endif
                            <label for="channels-{{ $channel->id }}" class="form-check-label"> {{ " " . $channel->name }}</label>
                        </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>

                </form>
        </div>
    </div>
</div>
@endsection