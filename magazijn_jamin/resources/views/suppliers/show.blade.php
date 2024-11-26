<x-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Geleverde Producten door {{ $supplier->LeverancierNaam }}</h1>
        @if ($products->isEmpty())
            <p>Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin.</p>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Product Naam</th>
                        <th class="py-2">Aantal in Magazijn</th>
                        <th class="py-2">Datum Laatste Levering</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="py-2">{{ $product->ProductNaam }}</td>
                            <td class="py-2">{{ $product->Aantal }}</td>
                            <td class="py-2">{{ $product->DatumLevering }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layout>
