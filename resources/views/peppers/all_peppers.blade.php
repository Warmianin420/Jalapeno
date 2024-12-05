@include('shared.html')

@include('shared.head', ['pageTitle' => 'Nasza oferta'])

<body>
    @include('shared.navbar')

    <div id="oferta" class="container mt-5">
        <div class="row">
            <h1>Nasza oferta</h1>
        </div>
        @can('is-admin')
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{ route('peppers.create') }}" class="btn btn-success">Dodaj nową ofertę</a>
                </div>
            </div>
        @endcan
        <div class="row">
            @forelse ($peppers as $pepper)
                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 d-flex flex-column">
                        <img src="{{ asset('storage/img/' . $pepper->img) }}" class="card-img-top img-fluid"
                            alt="{{ $pepper->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $pepper->name }}</h5>
                            <p class="card-text">{{ $pepper->description }}</p>
                            <a href="{{ route('peppers.show', $pepper->id) }}" class="btn btn-primary mt-auto">Więcej
                                szczegółów</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Brak dostępnego towaru.</p>
            @endforelse
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
