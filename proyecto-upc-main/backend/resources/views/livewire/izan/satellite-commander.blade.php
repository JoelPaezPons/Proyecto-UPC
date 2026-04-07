<div style="border:1px solid #ccc; padding:20px; border-radius:8px;">

    <h2>Consola de comandos</h2>

    <div style="margin-bottom:16px;">
        <label><strong>Satélite:</strong></label><br>
        <select wire:model.live="targetSatelliteId" style="padding:8px; border-radius:4px; border:1px solid #ccc; margin-top:4px;">
            @foreach($satellites as $sat)
            <option value="{{ $sat->id }}">{{ $sat->name }} (bat: {{ $sat->battery }}%)</option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom:16px;">
        <label><strong>Modo de operación:</strong></label><br>
        @foreach($modes as $modo)
        <label style="display:block; margin-top:6px;">
            <input type="radio" wire:model.live="operationMode" value="{{ $modo }}">
            {{ $modo }}
        </label>
        @endforeach
    </div>

    @error('operationMode')
    <p style="color:red;">{{ $message }}</p>
    @enderror

    @if($mensaje)
    <p style="color:green;">✅ {{ $mensaje }}</p>
    @endif

</div>