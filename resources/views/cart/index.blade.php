@include('shared.html')

@include('shared.head', ['pageTitle' => 'Twój koszyk'])

<body>
    @include('shared.navbar')

    <div id="koszyk" class="container mt-5 mb-5">
        <div class="row m-2 text-center">
            <h1>Twój koszyk</h1>
        </div>
        @include('shared.validation-error')
        @include('shared.session-error')

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive-sm">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produkt</th>
                        <th scope="col">Ilość</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Łączna kwota</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cartItems as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->pepper->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->pepper->price, 2) }} PLN</td>
                            <td>{{ number_format($item->pepper->price * $item->quantity, 2) }} PLN</td>
                            <td>
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Koszyk jest pusty.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($cartItems->isNotEmpty())
            <div class="row mt-4">
                <div class="col-6 text-start">
                    <!-- Przycisk "Kontynuuj zakupy" -->
                    <a href="{{ route('peppers.all_peppers') }}" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Kontynuuj zakupy
                    </a>
                </div>
                <div class="col-6 text-end">
                    <!-- Przycisk "Finalizuj zamówienie" -->
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Finalizuj zamówienie
                        </button>
                    </form>
                </div>
            </div>
        @else
            <!-- Przycisk "Kontynuuj zakupy", gdy koszyk jest pusty -->
            <div class="text-center mt-4">
                <a href="{{ route('peppers.all_peppers') }}" class="btn btn-primary">
                    <i class="fa fa-arrow-left"></i> Kontynuuj zakupy
                </a>
            </div>
        @endif
    </div>

    @include('shared.footer')
</body>
</html>
