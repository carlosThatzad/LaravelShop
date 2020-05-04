<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SHOPHOME ~</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('contact-us')}}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{route('logout')}}">Logout</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorías
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["1"])}}">Mansion</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["2"])}}">Duplex</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["3"])}}">Piso</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["4"])}}">Habitación</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["5"])}}">Torre</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["6"])}}">Terreno</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["7"])}}">Locales</a>


                        </div>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/login" role="button" tabindex="-1" aria-disabled="true">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('user.create')}}" role="button" tabindex="-1" aria-disabled="true">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('user.login')}}" role="button" tabindex="-1" aria-disabled="true">Zona Cliente</a>
                </li>
            </ul>

        </div>
    </nav>
</header>