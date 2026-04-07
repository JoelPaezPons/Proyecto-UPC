<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🛰️ Mission Control Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-slate-900 text-slate-100 font-sans p-6">
    <nav class="flex items-center gap-3 mb-6">
    <a href="/backoffice/Eduardo"
       class="px-4 py-2 rounded-lg bg-slate-700 border border-slate-600 text-slate-300">
        Eduardo
    </a>
    <a href="/backoffice/Izan"
       class="px-4 py-2 rounded-lg bg-slate-700 border border-slate-600 text-slate-300">
        Izan
    </a>
    <a href="/backoffice/Junior"
       class="px-4 py-2 rounded-lg bg-slate-700 border border-slate-600 text-slate-300">
        Junior
    </a>
    <a href="/backoffice/Joel"
       class="px-4 py-2 rounded-lg bg-slate-700 border border-slate-600 text-slate-300">
        Joel
    </a>
    <a href="/backoffice/Elena"
       class="px-4 py-2 rounded-lg bg-slate-700 border border-slate-600 text-slate-300">
        Elena
    </a>
</nav>
    <header class="mb-8 border-b border-slate-700 pb-4">
        <h1 class="text-3xl font-bold text-blue-400">Agencia Espacial - Backoffice Livewire</h1>
        <p class="text-slate-400">Panel de Telemetría y Comandos en Tiempo Real</p>
    </header>
    
    <main>
        @yield('contingut')
    </main>

    @livewireScripts
</body>
</html>

