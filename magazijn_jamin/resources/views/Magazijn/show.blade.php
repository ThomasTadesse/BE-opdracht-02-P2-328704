<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Magazijn Details</h1>
        <div class="bg-white p-4 rounded shadow">
            <p><strong>ProductId:</strong> {{ $magazijn->ProductId }}</p>
            <p><strong>VerpakkingsEenheid:</strong> {{ $magazijn->VerpakkingsEenheid }}</p>
            <p><strong>AantalAanwezig:</strong> {{ $magazijn->AantalAanwezig }}</p>
            <p><strong>IsActief:</strong> {{ $magazijn->IsActief }}</p>
            <p><strong>Opmerkingen:</strong> {{ $magazijn->Opmerkingen }}</p>
            <p><strong>DatumAangemaakt:</strong> {{ $magazijn->DatumAangemaakt }}</p>
            <p><strong>DatumGewijzigd:</strong> {{ $magazijn->DatumGewijzigd }}</p>
        </div>
        <a href="{{ route('magazijn.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded">Back to List</a>
    </div>
</x-layout>
