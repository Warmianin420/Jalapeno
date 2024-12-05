@include('shared.html')

@include('shared.head', ['pageTitle' => 'Zamówienia'])

<body>
    @include('shared.navbar')

    <div id="cennik" class="container mt-5 mb-5">
        <div class="row">
            <h1>Zamówienia</h1>
            <div class="row mb-2">
                <a href="{{ route('orders.create') }}">Dodaj nowe zamówienie</a>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Użytkownik</th>
                        <th scope="col">Towar</th>
                        <th scope="col">Ilość</th>
                        <th scope="col">Data zamówienia</th>
                        <th scope="col">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->pepper->name }}</td>
                            <td>{{ $order->quantity }}</td> <!-- Dodane wyświetlanie ilości -->
                            <td>{{ $order->order_date->format('d-m-Y H:i') }}</td> <!-- Sformatowana data -->
                            <td>
                                @can('is-admin')
                                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-link">Edycja</a>
                                @endcan
                                <form method="POST" action="{{ route('orders.destroy', $order->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Usuń" />
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row" colspan="6">Brak zamówień.</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
