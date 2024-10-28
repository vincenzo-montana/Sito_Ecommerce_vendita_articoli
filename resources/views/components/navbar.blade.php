<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="">
            Presto.it
            <img class="logo" src="https://svgsilh.com/svg/402758.svg" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                @auth
                    <h6 class="mt-2 me-2 ">Ciao {{ Auth::user()->name }}</h6>
                @endauth
                <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                <a class="nav-link active" aria-current="page" href="{{ route('article.index') }}">{{ __('ui.allarticles') }}
                </a>
                {{-- Drop down categorie --}}
                <div class=" nav-link active dropdown">
                    <a class=" dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.categorie') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('bycategory', $category) }}">{{ __("ui.$category->name") }}</a></li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </div>
                {{-- Drop down dashborad revisor --}}
                @auth
                    @if (Auth::user()->is_revisor)
                        <div class=" nav-link active dropdown">
                            <a class=" dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dashboard
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link active " href="{{ route('revisor.index') }}">Zona revisore
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                @endauth
                {{-- pulsante crea articolo  --}}
                @auth
                    <a class="nav-link active" aria-current="page" href="{{ route('article.create') }}">{{ __('ui.createarticle') }}</a>
                @endauth
                @guest
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                @endguest
            </div>
            @auth
                <div class="navbar-nav me-auto">
                    <form class="d-flex" action="{{ route('logout') }} " method="POST">
                        @csrf
                        <button class="nav-link active mx-2" type="submit"> logout <i
                                class="fa-solid fa-right-from-bracket"></i></button>
                    </form>
                    <x-_locale lang="it"/>
                    <x-_locale lang="en"/>
                    <x-_locale lang="es"/>

                </div>
            @endauth
        </div>
    </div>
    </div>
</nav>
