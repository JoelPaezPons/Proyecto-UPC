<div>
    <h3>Sistema de Alertas</h3>
    
    <p>Total de incidencias: <strong>{{ $totalAlertas }}</strong></p>

    <select wire:model.live="satelliteId">
        <option value="">-- Seleccionar Satélite con Fallo --</option>
        @foreach($satellites as $sat)
            <option value="{{ $sat->id }}">{{ $sat->name }}</option>
        @endforeach
    </select>

    <button wire:click="registrarAlerta" wire:loading.attr="disabled">
        <span wire:loading.remove wire:target="registrarAlerta">REGISTRAR ERROR</span>
        <span wire:loading wire:target="registrarAlerta">Grabando incidencia...</span>
    </button>

    @if (session()->has('status'))
        <p>{{ session('status') }}</p>
    @endif

    <hr>

    <h4>Historial Reciente:</h4>
    <ul>
        @foreach($ultimasAlertas as $alert)
            <li>
                <strong>{{ $alert->detected_at->format('H:i') }}</strong>: 
                {{ $alert->satellite->name ?? 'Sistema' }} - {{ $alert->message }}
            </li>
        @endforeach
    </ul>
</div>