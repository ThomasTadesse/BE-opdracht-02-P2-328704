<x-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 px-4">
        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-6xl text-center mb-8">
            Magazijn Jamin
        </h1>

        <a href="{{ route('suppliers.index') }}" class="text-lg font-semibold text-blue-600 hover:text-blue-800">
           Bekijk Leveranciers
        </a>

        <a href="{{ route('products.index') }}" class="text-lg font-semibold text-blue-600 hover:text-blue-800">
            Bekijk Producten
        </a>

    </div>
</x-layout>
