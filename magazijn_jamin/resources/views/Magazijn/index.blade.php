<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Magazijn Overzicht</h1>
        <a href="{{ route('magazijn.create') }}" class="mb-4 inline-block px-4 py-2 bg-green-500 text-white rounded">Create New Magazijn</a>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">ProductId</th>
                    <th class="py-2">VerpakkingsEenheid</th>
                    <th class="py-2">AantalAanwezig</th>
                    <th class="py-2">IsActief</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($magazijn as $item)
                    <tr>
                        <td class="py-2">{{ $item->ProductId }}</td>
                        <td class="py-2">{{ $item->VerpakkingsEenheid }}</td>
                        <td class="py-2">{{ $item->AantalAanwezig }}</td>
                        <td class="py-2">{{ $item->IsActief }}</td>
                        <td class="py-2">
                            <a href="{{ route('magazijn.show', $item->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded">View</a>
                            <a href="{{ route('magazijn.edit', $item->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded">Edit</a>
                            <form action="{{ route('magazijn.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
