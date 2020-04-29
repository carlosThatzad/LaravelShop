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
                    <a class="nav-link" href="{{route('contact-us')}}">Contacto</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorías
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!--<a class="dropdown-item" href="{{ route('articulos.categ', ["2"])}}">HTML</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["3"])}}">CSS</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["4"])}}">JS</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["1"])}}">C++</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["6"])}}">PHP</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["7"])}}">MySQl</a>
                            <a class="dropdown-item" href="{{ route('articulos.categ', ["8"])}}">Java</a>

-->
                        </div>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/login" role="button" tabindex="-1" aria-disabled="true">Login</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>