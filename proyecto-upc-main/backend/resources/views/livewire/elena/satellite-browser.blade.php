<div style="border:1px solid #e5aef0; padding:20px; border-radius:8px;">

    <h2>Buscador de satélites</h2>

    <input
        type="text"
        wire:model.live.debounce.300ms="query"
        placeholder="Buscar satélite..."
        style="padding:8px; width:300px; border:1px solid #e5aef0; border-radius:4px; color: #e5aef0;" />

    <p style="color:gray; font-size:14px;">Resultados: {{ $resultCount }}</p>

    <table border="1" cellpadding="8" style="border-collapse:collapse; width:100%;">
        <tr style="color: violet;">
            <th>Nombre</th>
            <th>NORAD ID</th>
            <th>Estado</th>
            <th>Altitud</th>
            <th>Batería</th>
        </tr>

        @forelse($satellites as $sat)
        <tr>
            <td>{{ $sat->name }}</td>
            <td>{{ $sat->norad_id }}</td>
            <td>{{ $sat->status }}</td>
            <td>{{ $sat->altitude }} km</td>
            <td>{{ $sat->battery }}%</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align:center; color:white;">No se ha encontrado nada</td>
        </tr>
        @endforelse
    </table>

</div>