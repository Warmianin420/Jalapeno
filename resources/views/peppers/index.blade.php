@include('shared.html')

@include('shared.head', ['pageTitle' => 'Jalapeño'])

<body>
    @include('shared.navbar')

    <div id="start">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/jalapeno.jpg" class="d-block w-100" alt="Papryka jalapeño">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-white">Zawsze świeże nasiona!</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/habanero.jpg" class="d-block w-100" alt="Papryki habanero">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-white">Najostrzejsze odmiany!</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/piri-piri.jpg" class="d-block w-100" alt="Papryki piri-piri">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-white">Wysoka kiełkowalność!</h1>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div id="oferta" class="container mt-5">
        <div class="row">
            <h1>Nasza oferta</h1>
        </div>
        <div class="row">
            @forelse ($randomPeppers as $pepper)
                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 d-flex flex-column">
                        <img src="{{ asset('storage/img/' . $pepper->img) }}" class="card-img-top img-fluid"
                            alt="{{ $pepper->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $pepper->name }}</h5>
                            <p class="card-text">{{ $pepper->description }}</p>
                            <a href="{{ route('peppers.show', $pepper->id) }}"
                                class="btn btn-primary mt-auto">Więcej szczegółów</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Brak dostępnych towarów.</p>
            @endforelse
        </div>
    </div>

    <div id="cennik" class="container mt-5 mb-5">
        <div class="row">
            <h1>Cennik</h1>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Cena</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peppers as $pepper)
                        <tr>
                            <th scope="row">{{ $pepper->id }}</th>
                            <td>{{ $pepper->name }}</td>
                            <td>{{ $pepper->description }}</td>
                            <td>{{ $pepper->price }} PLN</td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row" colspan="4">Brak dostępnych towarów.</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
