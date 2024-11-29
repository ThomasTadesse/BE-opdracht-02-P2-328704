<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Magazijn</h1>
        <form action="{{ route('magazijn.update', $magazijn->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="ProductId" class="block text-sm font-medium text-gray-700">ProductId</label>
                <input type="text" name="ProductId" id="ProductId" value="{{ $magazijn->ProductId }}" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="VerpakkingsEenheid" class="block text-sm font-medium text-gray-700">VerpakkingsEenheid</label>
                <input type="text" name="VerpakkingsEenheid" id="VerpakkingsEenheid" value="{{ $magazijn->VerpakkingsEenheid }}" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="AantalAanwezig" class="block text-sm font-medium text-gray-700">AantalAanwezig</label>
                <input type="text" name="AantalAanwezig" id="AantalAanwezig" value="{{ $magazijn->AantalAanwezig }}" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="IsActief" class="block text-sm font-medium text-gray-700">IsActief</label>
                <input type="text" name="IsActief" id="IsActief" value="{{ $magazijn->IsActief }}" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="Opmerkingen" class="block text-sm font-medium text-gray-700">Opmerkingen</label>
                <input type="text" name="Opmerkingen" id="Opmerkingen" value="{{ $magazijn->Opmerkingen }}" class="mt-1 block w-full">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
        </form>
    </div>
</x-layout>
