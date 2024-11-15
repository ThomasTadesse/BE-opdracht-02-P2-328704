<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazijn Jamin</title>
    @vite(['resources/js/app.js'])
</head>
<body class="h-full">
    <div class="h-full flex flex-col">
        <header class="bg-gray-800 text-white p-4">
            <h1 class="text-2xl"> </h1>
        </header>
        <main class="flex-1 p-4">
            {{ $slot }}
        </main>
        <footer class="bg-gray-800 text-white p-4">
            <p>&copy; {{ date('Y') }}</p>
        </footer>
    </div>
</body>
</html>