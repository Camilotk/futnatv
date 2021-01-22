@extends("includes.layout")

@section("content")
@include("includes.menu")
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>Usuários - FutNaTV</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            @include('includes.errors')
            @if(isset($user) && $user->id)
            <form action="{{ route('users-update', ['id' => $user->id]) }} " method="POST">
                {{ method_field("PUT") }}
                @else
                <form action=" {{ route('users-store') }}" method="post">
                    @endif
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="nome do usuário" value="{{ $user->name ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="john@doe.com" value="{{ $user->email ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <div>
                            <p>(Para deixar a senha atual, deixe este campo em branco!)</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar</button>

                </form>
        </div>
    </div>
</div>
@endsection