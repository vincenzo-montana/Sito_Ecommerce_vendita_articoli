<x-main>
    <h2 class="text-center my-4 mb-5"> Articoli appartenenti alla categoria {{ $category->name }}</h2>
    <div class="row justify-content-evenly">
        @forelse ($articles as $article)
            <x-card :article="$article" />
        @empty
            <div class="col-12 text-center">
                <h4>Non sono stati creati articoli per questa categoria</h4>
                @auth
                    <a class="btn btn-dark my-5" href="{{ route('article.create') }}">publica un articolo</a>
                @endauth
            </div>
        @endforelse
    </div>
</x-main>
