<div>
    <h2 class="text-center mt-2">Crea il tuo articolo</h2>
    <div class="d-flex justify-content-center ">
        <form class="my-5" style="width: 26rem;" wire:submit="store">
            @if (session()->has('success'))
                <div class="alert alert-success text-center" id="succcess">
                    {{ session('success') }}
                </div>
            @endif
            <!-- title input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form4Example1" class="form-control" @error('title') is-invalid @enderror
                    wire:model.blur="title" />
                <label class="form-label" for="form4Example1">Name</label>
                @error('title')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- price input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form4Example2" class="form-control" @error('price') is-invalid @enderror
                    wire:model.blur="price" />
                <label class="form-label" for="form4Example2">Price</label>
                @error('price')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- description input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <textarea class="form-control" id="form4Example3" rows="4" @error('description') is-invalid @enderror
                    wire:model.blur="description"></textarea>
                <label class="form-label" for="form4Example3">Description</label>
                @error('description')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
            </div>

            <select class="form-select" aria-label="default select" wire:model.blur="category"
                @error('category') is-invalid @enderror>
                <option selected>seleziona categoria </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }} </option>
                    {{-- {{$authors->books->year}} ??  --}}
                @endforeach
            </select>
            @error('category')
                <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />
                <label class="form-check-label" for="form4Example4">
                    Send me a copy of this message
                </label>
            </div>{{-- inserimento immagini --}}
            <div class="mb-3">
                <input type="file" wire:model.live="temporary_images" multiple
                    class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img" />
                @error('temporary_images.*')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
                @error('temporary_images')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if (!empty($images))
                <div class="row">
                    <div class="col-12">
                        <p>Photo preview:</p>
                        <div class="row border border-4 border-success rounded shadow py-4">
                            @foreach ($images as $key => $image)
                                <div class="col d-flex flex-column align-items-center my-3">
                                    <div class="img-preview mx-auto shadow rounded"
                                        style="background-image: url({{ $image->temporaryUrl() }});">
                                    </div>
                                    <button type="button" class="btn mt-1"
                                        wire:click="removeImage({{ $key }})"> X 
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif




            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Crea</button>
        </form>
    </div>
</div>
<script>
    var delayInMilliseconds = 5000; //1 second
    setTimeout(function() {
        let message = document.querySelector('#success')
        success.remove()
        //your code to be executed after 1 second
    }, delayInMilliseconds);
</script>
