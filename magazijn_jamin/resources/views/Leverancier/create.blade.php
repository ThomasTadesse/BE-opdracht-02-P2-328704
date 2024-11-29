<div class="container">
    <h1>Levering Product</h1>

    <div class="mb-4">
        <p><strong>Leverancier:</strong> {{ $leverancier->naam }}</p>
        <p><strong>Contactpersoon:</strong> {{ $leverancier->contactpersoon }}</p>
        <p><strong>Mobiel:</strong> {{ $leverancier->mobiel }}</p>
    </div>

    <form action="{{ route('levering.store', ['leveranciers' => $leverancier->id, 'product' => $product->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="aantal_producteenheden" class="form-label">Aantal producteenheden</label>
            <input type="number" class="form-control" id="aantal_producteenheden" name="aantal_producteenheden" required>
        </div>

        <div class="mb-3">
            <label for="datum_volgende_levering" class="form-label">Datum eerstvolgende levering</label>
            <input type="date" class="form-control" id="datum_volgende_levering" name="datum_volgende_levering" required>
        </div>

        <button type="submit" class="btn btn-primary">Sla op</button>
        <a href="{{ route('producten.index', $leverancier->id) }}" class="btn btn-secondary">Terug</a>
        <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
    </form>
</div>