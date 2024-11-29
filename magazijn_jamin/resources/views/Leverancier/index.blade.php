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
            @foreach ($leverancier as $supplier)
            <tr>
                <td class="py-2 px-4 text-sm text-gray-900">>{{ $supplier->naam }}</td>
                <td class="py-2 px-4 text-sm text-gray-900">>{{ $supplier->contactpersoon }}</td>
                <td class="py-2 px-4 text-sm text-gray-900">>{{ $supplier->leveranciernummer }}</td>
                <td class="py-2 px-4 text-sm text-gray-900">>{{ $supplier->mobiel }}</td>
                <td class="py-2 px-4 text-sm text-gray-900">>{{ $supplier->aantal_producten }}</td>
                <td class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">>
                    <a href="{{ route('producten.index', $supplier->id) }}" class="btn btn-primary">
                        📦
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('welcome') }}" class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Home</a>
</div>
</x-layout>