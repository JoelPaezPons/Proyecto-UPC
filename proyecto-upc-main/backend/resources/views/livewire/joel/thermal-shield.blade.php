<div wire:poll.3s="ambientHeat" style="color: white;">
    <h3>Termico</h3>

    <p>
        Temperatura: <strong>{{ number_format($temperature, 1) }}°C</strong>
    </p>

    @if($warning)
        <p><strong>{{ $warning }}</strong></p>
    @endif

    <button wire:click="activateCooling" wire:loading.attr="disabled">
        <span wire:loading.remove wire:target="activateCooling"> Activando Refrigeración</span>
        <span wire:loading wire:target="activateCooling">Bombeando nitrógeno...</span>
    </button>
</div>