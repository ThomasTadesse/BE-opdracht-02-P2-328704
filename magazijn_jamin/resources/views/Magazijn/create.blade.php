<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create New Magazijn</h1>
        <form action="{{ route('magazijn.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="ProductId" class="block text-sm font-medium text-gray-700">ProductId</label>
                <input type="text" name="ProductId" id="ProductId" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="VerpakkingsEenheid" class="block text-sm font-medium text-gray-700">VerpakkingsEenheid</label>
                <input type="text" name="VerpakkingsEenheid" id="VerpakkingsEenheid" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="AantalAanwezig" class="block text-sm font-medium text-gray-700">AantalAanwezig</label>
                <input type="text" name="AantalAanwezig" id="AantalAanwezig" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="IsActief" class="block text-sm font-medium text-gray-700">IsActief</label>
                <input type="text" name="IsActief" id="IsActief" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="Opmerkingen" class="block text-sm font-medium text-gray-700">Opmerkingen</label>
                <input type="text" name="Opmerkingen" id="Opmerkingen" class="mt-1 block w-full">
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Create</button>
        </form>
    </div>
</x-layout>
