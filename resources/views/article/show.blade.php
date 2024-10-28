<x-main>
    <h2 class="text-center my-4 mb-5">Dettaglio articolo {{ $article->title }}</h2>
    <div class="row height-custom align-items-center py-5 flex-column">
        <div class="col-12 col-md-6 mb-3">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @if ($article->images->count() > 0)
                        @foreach ($article->images as $key => $image)
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($image->path) }}" class=" rounded shadow height2" />
                            </div>
                        @endforeach
                    @else
                    <div class="swiper-slide">
                            <p>Nessuna foto pubblicata dall'utente</p>
                            <img src="https://picsum.photos/300"
                                class="img-fluid rounded shadow "alt="nessuna foto inserita dall'utente">
                        </div>
                    @endif
                </div>
                
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="col-12 col-md-6 mt-3 height-custom text-center">
            <h2 class="display-5"><span class="fw-bold">titolo :</span> {{ $article->title }}</h2>
            <div class="d-flex flex-column justify-content-center h-50">
                <h4 class="fw-bold">Prezzo: {{ $article->price }} $</h4>
                <h5>Descrizione :</h5>
                <p>{{ $article->description }}</p>
            </div>
        </div>
    </div>
</x-main>
<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: true,
            },
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>
