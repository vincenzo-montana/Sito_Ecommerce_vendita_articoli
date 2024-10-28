<x-main>


    <div class="d-flex justify-content-center mt-5 mb-5 ">
        <h2>Elenco degli articoli più recenti in vendita </h2>
    </div>
    {{-- messaggio di errore di visualizzazione della pagina poichè l'utente non è revisore e lo specifichiamo nel middleware ìsevisor  --}}
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
    @endif
    {{-- messaggio di avvenuta conferma per far diventare un utente revisore nel revisorcontroller funzione becomerevisor  --}}
    @if (session()->has('message'))
        <div class="alert alert-success text-center shadow rounded w-50">
            {{ session('message') }}
        </div>
    @endif
    <div class="row justify-content-evenly">
        @forelse ($articles as $article)
            <x-card :article="$article" />
        @empty
            <div class="col-12">
                <h3 class="text-center">
                    Non sono stati creati articoli
                </h3>
            </div>
        @endforelse
    </div>
</x-main>
