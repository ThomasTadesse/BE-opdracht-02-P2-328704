<x-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Geleverde Producten</h1>
    <div class="mb-4">
        <p><strong>Naam leverancier:</strong> {{ $leverancier->Naam }}</p>
        <p><strong>Contactpersoon:</strong> {{ $leverancier->Contactpersoon }}</p>
        <p><strong>Leverancier NR:</strong> {{ $leverancier->Leveranciernummer }}</p>
        <p><strong>Mobiel:</strong> {{ $leverancier->Mobiel }}</p>
    </div>
    <table class="min-w-full bg-white rounded-lg shadow-lg">
        <thead>
            <tr>
                <th class="py-2 px-4 text-sm font-medium text-gray-900">Naam product</th>
                <th class="py-2 px-4 text-sm font-medium text-gray-900">Aantal in magazijn</th>
                <th class="py-2 px-4 text-sm font-medium text-gray-900">Verpakkingseenheid</th>
                <th class="py-2 px-4 text-sm font-medium text-gray-900">Laatste levering</th>
                <th class="py-2 px-4 text-sm font-medium text-gray-900">Nieuwe levering</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($producten) && count($producten) > 0)
            @foreach ($producten as $product)
            <tr>
                <td class="py-2 px-4 text-sm text-gray-900">{{ $product->Naam }}</td>
                <td class="py-2 px-4 text-sm text-gray-900">{{ $product->magazijn->AantalAanwezig ?? 'N/A' }}</td>
                <td class="py-2 px-4 text-sm text-gray-900">{{ $product->magazijn->VerpakkingsEenheid ?? 'N/A' }}</td>
                <td class="py-2 px-4 text-sm text-gray-900">{{ $product->DatumGewijzigd->format('d-m-Y') }}</td>
                <td class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                       <a href="#" class="btn btn-success">
                        +
                    </a>
                </td>
            </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="6" class="mb-4 px-4 py-2 text-sm text-gray-900 bg-red-200 hover:bg-red-400 text-center">Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="mt-4">
        <a href="{{ route('leverancier.index') }}" class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Terug</a>
        <a href="{{ route('home') }}" class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Home</a>
    </div>
</div>
</x-layout>