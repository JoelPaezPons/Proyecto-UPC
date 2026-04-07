{{-- wire:poll.5s simula que los satélites cambian de estado solos --}}
<div wire:poll.5s="updateStatus" style="border:1px solid #ccc; padding:20px; border-radius:8px;">

    <h2>Monitor de conexión</h2>
    <p style="color:gray; font-size:14px;">Se actualiza solo cada 5s</p>

    @foreach($satellites as $sat)
    <div style="border:1px solid #eee; padding:10px; margin-bottom:8px; border-radius:4px; display:flex; align-items:center; gap:16px;">

        {{-- Punto de color según estado --}}
        <span style="
                width:12px; height:12px; border-radius:50%; display:inline-block;
                background: {{ $sat->status === 'online' ? 'green' : 'red' }};">
        </span>

        {{-- Nombre --}}
        <span style="flex:1; font-weight:bold;">{{ $sat->name }}</span>

        {{-- Estado en texto --}}
        <span style="color: {{ $sat->status === 'online' ? 'green' : 'red' }};">
            {{ $sat->status === 'online' ? 'En línea' : 'Sin señal' }}
        </span>

        {{-- Botón para cambiar estado manualmente --}}
        <button
            wire:click="toggleStatus({{ $sat->id }})"
            wire:loading.attr="disabled"
            style="padding:6px 12px; border:1px solid #ccc; border-radius:4px; cursor:pointer; background:white;">
            <span wire:loading.remove wire:target="toggleStatus({{ $sat->id }})">
                {{ $sat->status === 'online' ? 'Desconectar' : 'Conectar' }}
            </span>
            <span wire:loading wire:target="toggleStatus({{ $sat->id }})">
                ...
            </span>
        </button>

    </div>
    @endforeach

    {{-- Resumen abajo --}}
    <p style="margin-top:16px; font-size:14px;">
        🟢 En línea: <strong>{{ $satellites->where('status', 'online')->count() }}</strong>
        &nbsp;&nbsp;
        🔴 Sin señal: <strong>{{ $satellites->where('status', 'offline')->count() }}</strong>
    </p>

</div>