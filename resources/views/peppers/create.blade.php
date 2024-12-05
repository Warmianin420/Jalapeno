@include('shared.html')

@include('shared.head', ['pageTitle' => 'Dodaj nową ofertę'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row mt-4 mb-4 text-center">
            <h1>Dodaj nową ofertę</h1>
        </div>

        @include('shared.validation-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{ route('peppers.store') }}" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Nazwa</label>
                        <input id="name" name="name" type="text"
                            class="form-control @if ($errors->first('name')) is-invalid @endif"
                            value="{{ old('name') }}">
                        <div class="invalid-feedback">Nieprawidłowa nazwa!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Opis</label>
                        <textarea id="description" name="description" type="text" rows="5"
                            class="form-control @if ($errors->first('description')) is-invalid @endif">{{ old('description') }}</textarea>
                        <div class="invalid-feedback">Nieprawidłowy opis!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="price" class="form-label">Cena</label>
                        <div class="input-group mb-3">
                            <input id="price" type="number" name="price" min="0.1" placeholder="0"
                                step="any" class="form-control @if ($errors->first('price')) is-invalid @endif"
                                value="{{ old('price') }}">
                            <span class="input-group-text">PLN</span>
                        </div>
                        <div class="invalid-feedback">Nieprawidłowa cena!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="img" class="form-label">Zdjęcie towaru</label>
                        <input id="img" name="img" type="file"
                            class="form-control @if ($errors->first('img')) is-invalid @endif"
                            multiple accept=".jpg, .jpeg">
                        <div class="invalid-feedback">Nieprawidłowy plik zdjęcia!</div>
                    </div>
                    <div class="text-center mt-4 mb-4">
                        <input class="btn btn-success" type="submit" value="Dodaj">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
