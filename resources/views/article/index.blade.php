<x-main>
    <h2 class="text-center my-4 mb-5">Elenco di tutti gli articoli in vendita</h2>
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
    <div class="d-flex justify-content-center">
        <div>
            {{$articles->links()}}
        </div>
    </div>
</x-main>
