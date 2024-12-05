@include('shared.html')

@include('shared.head', ['pageTitle' => 'Dodaj nowe zamówienie'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row mt-4 mb-4 text-center">
            <h1>Dodaj nowe zamówienie</h1>
        </div>

        @include('shared.validation-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{ route('orders.store') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-2">
                        <label for="pepper_id" class="form-label">Towar</label>
                        <select id="pepper_id" name="pepper_id"
                            class="form-control @if ($errors->first('pepper_id')) is-invalid @endif">
                            <option value="">Wybierz towar</option>
                            @foreach ($peppers as $pepper)
                                <option value="{{ $pepper->id }}" @if (old('pepper_id') == $pepper->id) selected @endif>
                                    {{ $pepper->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Nieprawidłowy towar!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="begin" class="form-label">Data wypożyczenia</label>
                        <input id="date" name="date" type="date" min="{{ date('Y-m-d') }}"
                            class="form-control @if ($errors->first('date')) is-invalid @endif"
                            value="{{ old('date') }}">
                        <div class="invalid-feedback">Nieprawidłowa data!</div>
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
