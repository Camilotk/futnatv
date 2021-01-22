@extends("includes.layout")

@section("content")
@include("includes.menu")
<div class="container">
    <div class="row ml-3">
        <div class="col-12">
            <h1>Jogos - FutNaTV</h1>
            <a href="{{ route('matches-create') }}" class="btn btn-success">Inserir</a>
        </div>
    </div>
    <div class="row ml-3 mt-3">
        <div class="col-12">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Jogo</th>
                    <th>Data</th>
                    <th>Canais</th>
                    <th>Ações</th>
                </tr>

                @foreach($matches as $match)
                <tr>
                    <td>{{ $match->id }}</td>
                    <td>{{ $match->team1 }} x {{ $match->team2 }}</td>
                    <td>{{ $match->formatted_date }}</td>
                    <td>
                        <ul>
                            @foreach($match->channels()->get() as $channel)
                            <li>{{ $channel->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <form action="{{ route('matches-destroy', ['id' => $match->id]) }}" method="POST">
                            {{ method_field("DELETE") }}
                            {{ csrf_field() }}
                            <div class="button-group">
                                <a href="{{ route('matches-edit', ['id' => $match->id]) }}" class="btn btn-info">Editar</a>
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection