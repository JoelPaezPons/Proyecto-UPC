<div wire:poll.5s="Actualizar">

    <div class="mb-3">
        <p>Altitud: {{ number_format($altitude, 2) }} km</p>
        <p>Velocidad: {{ number_format($speed, 0) }} km/h</p>
        <p>Batería: <span class="{{ $battery < 20 ? 'text-danger' : 'text-success' }}">{{ $battery }}%</span></p>
        <p>Estado: <strong>{{ $status }}</strong></p>
    </div>

    <button wire:click="reiniciar" class="btn btn-primary btn-sm">
        Reiniciar Satélite
    </button>

    <span wire:loading class="text-info ms-2">Cargando...</span>

</div>
