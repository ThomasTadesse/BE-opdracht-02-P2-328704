<div class="container">
    <h1>Overzicht Leveranciers</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Contactpersoon</th>
                <th>Leveranciernummer</th>
                <th>Mobiel</th>
                <th>Aantal verschillende producten</th>
                <th>Toon producten</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leveranciers as $leverancier)
            <tr>
                <td>{{ $leverancier->naam }}</td>
                <td>{{ $leverancier->contactpersoon }}</td>
                <td>{{ $leverancier->leveranciernummer }}</td>
                <td>{{ $leverancier->mobiel }}</td>
                <td>{{ $leverancier->aantal_producten }}</td>
                <td>
                    <a href="{{ route('producten.index', $leverancier->id) }}" class="btn btn-primary">
                        📦
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
</div>