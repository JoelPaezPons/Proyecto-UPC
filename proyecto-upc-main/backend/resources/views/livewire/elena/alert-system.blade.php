<div style="border:1px solid #e5aef0; padding:20px; border-radius:8px;">

    <h2>Sistema de alertas</h2>

    <p>Anomalías Detectadas: <strong style="font-size:24px;">{{ $anomalyCount }}</strong></p>

    <button
        wire:click="registerAlert"
        wire:loading.attr="disabled"
        style="padding:10px 20px; background:red; color:white; border:none; border-radius:6px; cursor:pointer; font-size:14px;">
        <span wire:loading.remove wire:target="registerAlert">Registrar alerta</span>
        <span wire:loading wire:target="registerAlert">Guardando...</span>
    </button>

    <hr style="margin:20px 0;">

    <h3>Últimas incidencias</h3>

    @forelse($alerts as $alert)
    <div style="border:1px solid #e5aef0; padding:8px; margin-bottom:6px; border-radius:4px;">
        <span style="color:gray; font-size:12px;">{{ $alert->detected_at->format('H:i:s') }}</span>
        <strong>{{ $alert->satellite->name ?? 'Desconocido' }}</strong>
        — {{ $alert->message }}
    </div>
    @empty
    <p style="color:gray;">No hay alertas todavía.</p>
    @endforelse

</div>