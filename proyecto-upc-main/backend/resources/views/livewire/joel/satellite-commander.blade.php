<div>
    <h3>Comandos</h3>

    <label>Satélite:</label>
    <select wire:model.live="targetSatelliteId">
        <option value="">Selecciona uno...</option>
        @foreach($satellites as $sat)
            <option value="{{ $sat->id }}">{{ $sat->name }} ({{ $sat->battery }}%)</option>
        @endforeach
    </select>

    <br><br>

    <label><strong>Seleccionar Modo:</strong></label>
    <div>
        <input type="radio" wire:model.live="operationMode" value="STANDBY"> STANDBY <br>
        <input type="radio" wire:model.live="operationMode" value="CIENTÍFICO"> CIENTÍFICO <br>
        <input type="radio" wire:model.live="operationMode" value="MANIOBRA"> MANIOBRA
    </div>

    <div>
        <span wire:loading wire:target="operationMode">Enviando señal...</span>
        
        @if($mensaje)
            <p>{{ $mensaje }}</p>
        @endif
    </div>
</div>