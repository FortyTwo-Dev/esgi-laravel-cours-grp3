<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Cours ESGI' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <header class="bg-white shadow">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold text-gray-800">Cours ESGI - Laravel</h1>
                <ul class="flex space-x-6">
                    <x-nav-link :href="route('home')" :active="Route::is('home')">
                        Accueil
                    </x-nav-link>
                    <x-nav-link :href="route('projects.index')" :active="Route::is('projects.*')">
                        Projets
                    </x-nav-link>
                    <x-nav-link :href="route('about')" :active="Route::is('about')">
                        A propos
                    </x-nav-link>
                    <x-nav-link :href="route('contact')" :active="Route::is('contact')">
                        Contact
                    </x-nav-link>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8 flex flex-col">
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-white mt-auto">
        <div class="container mx-auto px-4 py-6 text-center">
            <p>&copy; {{ date('Y') }} - Cours ESGI Laravel</p>
        </div>
    </footer>
    @fluxScripts
</body>
</html>
