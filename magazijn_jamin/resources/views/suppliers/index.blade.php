<x-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Overzicht Leveranciers</h1>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Leverancier Naam</th>
                    <th class="py-2">Aantal Producten</th>
                    <th class="py-2">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td class="py-2">{{ $supplier->LeverancierNaam }}</td>
                        <td class="py-2">{{ $supplier->products_count }}</td>
                        <td class="py-2">
                            <a href="{{ route('suppliers.show', $supplier) }}" class="text-blue-500">Toon producten</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
