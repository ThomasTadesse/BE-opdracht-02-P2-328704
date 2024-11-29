<x-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Bewerk Leverancier</h1>
    <form action="{{ route('leverancier.update', $leverancier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="naam" class="form-label">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" value="{{ $leverancier->naam }}" required>
        </div>
        <div class="mb-3">
            <label for="contactpersoon" class="form-label">Contactpersoon</label>
            <input type="text" class="form-control" id="contactpersoon" name="contactpersoon" value="{{ $leverancier->contactpersoon }}" required>
        </div>
        <div class="mb-3">
            <label for="leveranciernummer" class="form-label">Leveranciernummer</label>
            <input type="text" class="form-control" id="leveranciernummer" name="leveranciernummer" value="{{ $leverancier->leveranciernummer }}" required>
        </div>
        <div class="mb-3">
            <label for="mobiel" class="form-label">Mobiel</label>
            <input type="text" class="form-control" id="mobiel" name="mobiel" value="{{ $leverancier->mobiel }}" required>
        </div>
        <button type="submit" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Sla op</button>
        <a href="{{ route('leverancier.index') }}" class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Terug</a>
        <a href="{{ route('home') }}" class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Home</a>
    </form>
</div>
</x-layout>
