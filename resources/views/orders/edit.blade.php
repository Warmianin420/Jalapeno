@include('shared.html')

@include('shared.head', ['pageTitle' => 'Edytuj dane zamówienia'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row mt-4 mb-4 text-center">
            <h1>Edytuj dane zamówienia</h1>
        </div>

        @include('shared.validation-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{ route('orders.update', ['order' => $order->id]) }}" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="pepper_id" class="form-label">Towar</label>
                        <select id="pepper_id" name="pepper_id" class="form-control @if ($errors->first('pepper_id')) is-invalid @endif">
                            <option value="">Wybierz towar</option>
                            @foreach ($peppers as $pepper)
                                <option value="{{ $pepper->id }}" @if (old('pepper_id', $order->pepper_id) == $pepper->id) selected @endif>{{ $pepper->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Nieprawidłowy towar!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="quantity" class="form-label">Ilość</label>
                        <input id="quantity" name="quantity" type="number" min="1" class="form-control @if ($errors->first('quantity')) is-invalid @endif" value="{{ old('quantity', $order->quantity) }}">
                        <div class="invalid-feedback">Nieprawidłowa ilość!</div>
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
