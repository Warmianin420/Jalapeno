@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edycja oferty'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row mt-4 mb-4 text-center">
            <h1>Edytuj ofertę</h1>
        </div>

        @include('shared.validation-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{ route('peppers.update', ['pepper' => $pepper->id]) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Nazwa</label>
                        <input id="name" name="name" type="text" class="form-control @if ($errors->first('name')) is-invalid @endif" value="{{ old('name', $pepper->name) }}">
                        <div class="invalid-feedback">Nieprawidłowa nazwa!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Opis</label>
                        <textarea id="description" name="description" class="form-control @if ($errors->first('description')) is-invalid @endif" rows="3">{{ old('description', $pepper->description) }}</textarea>
                        <div class="invalid-feedback">Nieprawidłowy opis!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="price" class="form-label">Cena</label>
                        <div class="input-group mb-2">
                            <input id="price" type="number" name="price" min="0" placeholder="0" step="any" class="form-control @if ($errors->first('price')) is-invalid @endif" value="{{ old('price', $pepper->price) }}">
                            <span class="input-group-text"> PLN</span>
                        </div>
                        <div class="invalid-feedback">Nieprawidłowa cena!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="img" class="form-label">Zdjęcie</label>
                        <input id="img" name="img" type="file" class="form-control">
                        <div class="invalid-feedback">Nieprawidłowe zdjęcie!</div>
                    </div>
                    <div class="text-center mt-4 mb-4">
                        <input class="btn btn-success" type="submit" value="Zapisz">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>
</html>
