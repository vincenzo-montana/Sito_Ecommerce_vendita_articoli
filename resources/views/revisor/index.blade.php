<x-main>
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 text-center pb-2">
                        Revisor dashboard
                    </h1>
                </div>
            </div>
            {{-- messaggio di conferma accettazione o di rifiuto dell'articolo dal revisor controller --}}
            @if (session()->has('message'))
                <div class="row justify-content-center">
                    <div class="col-5 alert alert-success text-center shadow rounded">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
        </div>
        @if ($article_to_check)
            <div class="row justify-content-evenly">
                @if ($article_to_check->images->count() > 0)
                    @foreach ($article_to_check->images as $key => $image)
                        <div class="col-6 col-md-4 mb-4 mt-4 d-flex justify-content-center">
                            <img src="{{ Storage::url($image->path) }}" class=" rounded shadow height"
                                alt="immagine{{ $key + 1 }} dell'articolo {{ $article_to_check->title }}">
                        </div>
                    @endforeach
                @else
                    <p class="text-center my-2 mx-2">l'utente non ha pubblicato immaggini</p>
                @endif
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between text-center">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>Autore: {{ $article_to_check->user->name }} </h3>
                        <h4>{{ $article_to_check->price }}€</h4>
                        <h4 class="fst-italic text-muted">{{ $article_to_check->category->name }}</h4>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        {{-- form associato alla rotta patch rifiuta articolo  --}}
                        <form action="{{ route('reject', $article_to_check) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn py-2 px-5 fw-bold ">Rifiuta</button>
                        </form>
                        {{-- form associato alla rotta patch accetta articolo  --}}
                        <form action="{{ route('accept', $article_to_check) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn py-2 px-5 fw-bold ">Accetta</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h1 class="fst-italic display-4">
                        Nessun articolo da revisionare
                    </h1>
                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-success"> Torna all'homepage</a>
                </div>
            </div>
        @endif
    </div>
    {{-- @else
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="row justify-content-center">
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-6 col-md-4 mb-4 text-center">
                        <img src="https://picsum.photos/300" class="img-fluid rounded shadow "
                            alt="immagine segnaposto">
                    </div>
                @endfor
            </div>
        </div>
    </div>
    @endif --}}






</x-main>
