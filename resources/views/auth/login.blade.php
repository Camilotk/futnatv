@extends("includes.layout")

@section("content")
<div class="container">
    <div class="mt-3">

        <h1 class="title mt-3" style="text-align: center;">FutNaTV</h1>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="john@doe.com" value="{{ $user->email ?? '' }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control" required autocomplete="current-password">
            </div>

            <div class="form-group form-group-inline">
                <label for="remember_me">
                    <input type="checkbox" name="remember" id="remember_me">
                    <span>Lembrar-me</span>
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    Esqueceu sua senha?
                </a>
                @endif
                <button type="submit" class="btn btn-primary">
                    Logar
                </button>

            </div>
        </form>
    </div>
</div>
@endsection