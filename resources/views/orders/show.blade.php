@include('shared.html')

@include('shared.head', ['pageTitle' => 'Szczegóły zamówienia'])

<body>
    @include('shared.navbar')

    <div id="szczegoly" class="container mt-5 mb-5">
        <div class="row text-center">
            <h1>Szczegóły zamówienia</h1>
        </div>
        <div class="row mt-4">
            <p>Dziękujemy za złożenie zamówienia. Twoje zamówienie zostało zapisane.</p>
        </div>
    </div>

    @include('shared.footer')
</body>
</html>
