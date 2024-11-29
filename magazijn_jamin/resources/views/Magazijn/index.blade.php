<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Magazijn Overzicht</h1>
        <a href="{{ route('magazijn.create') }}" class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Create New Magazijn</a>
        <table class="min-w-full bg-white rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 text-sm font-medium text-gray-900">ProductId</th>
                    <th class="py-2 px-4 text-sm font-medium text-gray-900">VerpakkingsEenheid</th>
                    <th class="py-2 px-4 text-sm font-medium text-gray-900">AantalAanwezig</th>
                    <th class="py-2 px-4 text-sm font-medium text-gray-900">IsActief</th>
                    <th class="py-2 px-4 text-sm font-medium text-gray-900">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($magazijn as $item)
                    <tr class="border-b">
                        <td class="py-2 px-4 text-sm text-gray-900">{{ $item->ProductId }}</td>
                        <td class="py-2 px-4 text-sm text-gray-900">{{ $item->VerpakkingsEenheid }}</td>
                        <td class="py-2 px-4 text-sm text-gray-900">{{ $item->AantalAanwezig }}</td>
                        <td class="py-2 px-4 text-sm text-gray-900">{{ $item->IsActief }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('magazijn.show', $item->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">View</a>
                            <a href="{{ route('magazijn.edit', $item->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('magazijn.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
