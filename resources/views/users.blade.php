@extends("includes.layout")

@section("content")
@include("includes.menu")
<div class="container">
    <div class="row ml-3">
        <div class="col-12">
            <h1>Canais - FutNaTV</h1>
            <a href="{{ route('users-create') }}" class="btn btn-success">Inserir</a>
        </div>
    </div>
    <div class="row ml-3 mt-3">
        <div class="col-12">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>

                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('users-destroy', ['id' => $user->id]) }}" method="POST">
                            {{ method_field("DELETE") }}
                            {{ csrf_field() }}
                            <div class="button-group">
                                <a href="{{ route('users-edit', ['id' => $user->id]) }}" class="btn btn-info">Editar</a>
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