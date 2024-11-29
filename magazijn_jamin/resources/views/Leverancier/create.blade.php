<x-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Levering Product</h1>
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
        <button type="submit" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Sla op</button>
        <a href="{{ route('producten.index', $leverancier->id) }}" class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Terug</a>
        <a href="{{ route('home') }}" class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Home</a>
    </form>
</div>
</x-layout>