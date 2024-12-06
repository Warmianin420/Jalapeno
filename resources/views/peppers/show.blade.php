@include('shared.html')

@include('shared.head', ['pageTitle' => 'Papryka ' . $pepper->name])

<body>
    @include('shared.navbar')

    <div id="papryki" class="container mt-5 mb-5">
        <div class="row m-2 text-center">
            <h1>Papryka: {{ $pepper->name }}</h1>
        </div>
        @include('shared.validation-error')
        @include('shared.session-error')
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card text-center">
                    <!-- Formularz dodania do koszyka -->
                    <form action="{{ route('cart.store') }}" method="POST" class="needs-validation">
                        @csrf
                        <img src="{{ asset('storage/img/' . $pepper->img) }}" class="card-img-top" alt="{{ $pepper->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pepper->name }}</h5>
                            <p class="card-text">{{ $pepper->description }}</p>
                            <p class="card-text">{{ $pepper->price }} PLN</p>
                            <input type="hidden" name="pepper_id" value="{{ $pepper->id }}">
                            @if (Auth::check())
                                <!-- Pole do wpisania ilości -->
                                <div class="form-group">
                                    <label for="quantity" class="form-label">Ilość:</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
                                </div>
                                <!-- Przycisk z ikoną -->
                                <button type="submit" class="btn btn-primary mt-2">
                                    <i class="fa fa-shopping-cart"></i> Dodaj do koszyka
                                </button>
                            @endif
                        </div>
                    </form>

                    <!-- Link do koszyka -->
                    @if (Auth::check())
                        <div class="mt-3">
                            <a href="{{ route('cart.index') }}" class="btn btn-success">
                                <i class="fa fa-shopping-basket"></i> Przejdź do koszyka
                            </a>
                        </div>
                    @endif

                    <!-- Opcje admina -->
                    @if (Auth::check() && Auth::user()->role == 'admin')
                        <div class="mt-3 mb-3">
                            <a href="{{ route('peppers.edit', ['pepper' => $pepper]) }}" class="btn btn-warning">Edytuj</a>
                            <form action="{{ route('peppers.destroy', $pepper->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
