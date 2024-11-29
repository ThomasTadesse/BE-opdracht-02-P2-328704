<x-layout>
<div class="container mx-auto p-4">
<h1 class="text-2xl font-bold mb-4">Overzicht Leveranciers</h1>
<a href="{{ route('leverancier.create') }}" class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Nieuw Toevoegen</a>
    <table class="min-w-full bg-white rounded-lg shadow-lg">
        <thead>
            <tr>
                <th class="py-2 px-4 text-sm font-medium text-gray-900">Naam</th>
                <th class="py-2 px-4 text-sm font-medium text-gray-900">Contactpersoon</th>
                <th class="py-2 px-4 text-sm font-medium text-gray-900">Leveranciernummer</th>
                <th class="py-2 px-4 text-sm font-medium text-gray-900">Mobiel</th>
                <th class="py-2 px-4 text-sm font-medium text-gray-900">Aantal verschillende producten</th>
                <th class="py-2 px-4 text-sm font-medium text-gray-900">Toon producten</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($leveranciers) && count($leveranciers) > 0)
                @foreach ($leveranciers as $leverancier)
                <tr>
                    <td class="py-2 px-4 text-sm text-gray-900">{{ $leverancier->naam }}</td>
                    <td class="py-2 px-4 text-sm text-gray-900">{{ $leverancier->contactpersoon }}</td>
                    <td class="py-2 px-4 text-sm text-gray-900">{{ $leverancier->leveranciernummer }}</td>
                    <td class="py-2 px-4 text-sm text-gray-900">{{ $leverancier->mobiel }}</td>
                    <td class="py-2 px-4 text-sm text-gray-900">{{ $leverancier->aantal_producten }}</td>
                    <td class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        <a href="{{ route('leverancier.show', $leverancier->id) }}" class="btn btn-primary">
                            📦
                        </a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="py-2 px-4 text-sm text-gray-900">Geen leveranciers gevonden.</td>
                </tr>
            @endif
        </tbody>
    </table>
    <a href="{{ route('welcome') }}" class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Home</a>
</div>
</x-layout>