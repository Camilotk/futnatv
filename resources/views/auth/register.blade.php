@extends("includes.layout")

@section("content")
<div class="container">
    <div class="mt-3">

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" required autofocus autocomplete="name">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirme sua senha</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}">
                    Já é registrado?
                </a>

                <button type="submit" class="btn btn-primary">
                    Registrar-se
                </button>
            </div>
        </form>
    </div>
</div>
@endsection