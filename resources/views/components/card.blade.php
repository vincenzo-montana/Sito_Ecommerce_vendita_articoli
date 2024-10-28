<div class="col-12 col-md-6 col-lg-5 d-flex flex-md-row card p-3 my-3">
        <img class=" my-2 mx-2 mb-md-0 rounded-3 img-preview" src="{{$article->images->isNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/200/100'}}"  alt="">
        <div class="text-center d-flex flex-column justify-content-evenly my-2  flex-grow-1">
            <h4>articolo : {{ $article->title }}</h4>
            <h5 class="card-text ">{{ $article->description }}</h5>
            <h6>prezzo : {{ $article->price }}</h6>
        </div>
        <div class="d-flex flex-column justify-content-evenly my-2 flex-wrap w-md-auto align-items-center ">
            <a href="{{route('article.show', compact('article'))}}" class="btn2 my-2 ">dettaglio</a>
            {{-- ho dato alla rotta dell ancor il nome del name route che in questo caso è bycategory  --}}
            <a class="btn2 my-2 " href="{{route('bycategory', $article->category)}}" >{{$article->category->name}}</a>
        </div>
</div>
