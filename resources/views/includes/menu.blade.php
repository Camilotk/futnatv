<div class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <a href="#" class="navbar-brand">FutNaTV</a>

    <?php // menu hamburguer 
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nvbcontent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a href="{{ route('matches-list') }}" class="nav-link">Jogos</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('channels-list') }}" class="nav-link">Canais</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users-list') }}" class="nav-link">Usuários</a>
            </li>
            <!-- <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">
                    Registrar-se
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">
                    Login
                </a>
            </li> -->

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();" class="nav-link">
                    Sair
                </a>
            </form>

        </ul>
    </div>
</div>