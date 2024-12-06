@include('shared.html')

@include('shared.head', ['pageTitle' => 'Szczegóły zamówienia'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">
        <div class="row">
            <h1>Szczegóły zamówienia #{{ $order->id }}</h1>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h4>Użytkownik:</h4>
                <p>{{ $order->user->name }}</p>

                <h4>Data zamówienia:</h4>
                <p>{{ $order->created_at->format('d-m-Y H:i') }}</p>

                <h4>Łączna kwota:</h4>
                <p>{{ $order->total_price }} PLN</p>

                <h4>Produkty:</h4>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nazwa</th>
                            <th>Cena</th>
                            <th>Ilość</th>
                            <th>Łączna kwota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ number_format($item['price'], 2) }} PLN</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ number_format($item['total'], 2) }} PLN</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>
