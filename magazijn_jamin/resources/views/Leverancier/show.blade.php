<div class="container">
    <h1>Geleverde Producten</h1>
    
    <div class="mb-4">
        <p><strong>Naam leverancier:</strong> {{ $leverancier->naam }}</p>
        <p><strong>Contactpersoon:</strong> {{ $leverancier->contactpersoon }}</p>
        <p><strong>Leverancier NR:</strong> {{ $leverancier->leveranciernummer }}</p>
        <p><strong>Mobiel:</strong> {{ $leverancier->mobiel }}</p>
    </div>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Naam product</th>
                <th>Aantal in magazijn</th>
                <th>Verpakkingseenheid</th>
                <th>Laatste levering</th>
                <th>Nieuwe levering</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($producten as $product)
            <tr>
                <td>{{ $product->naam }}</td>
                <td>{{ $product->aantal_in_magazijn }}</td>
                <td>{{ $product->verpakkingseenheid }}</td>
                <td>{{ $product->laatste_levering }}</td>
                <td>
                    <a href="{{ route('levering.create', ['leverancier' => $leverancier->id, 'product' => $product->id]) }}" class="btn btn-success">
                        +
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="mt-4">
        <a href="{{ route('leveranciers.index') }}" class="btn btn-secondary">Terug</a>
        <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
    </div>
</div>