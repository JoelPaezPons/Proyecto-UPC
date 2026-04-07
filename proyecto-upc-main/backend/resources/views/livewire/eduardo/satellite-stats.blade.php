<div wire:poll.5s="refreshTelemetry">
    <h2>Telemetría en Tiempo Real</h2>

    <p><strong>Altitud:</strong> {{ $altitude }} km</p>
    <p><strong>Velocidad:</strong> {{ $speed }} km/h</p>
    <p style="color: {{ $battery < 15 ? 'red' : 'green' }}">{{ $battery < 15 ? '🔌' : '🔋' }} 
    <strong>Batería:</strong> {{ $battery }}%</p>
   
    <a href="/">Ir a la App</a>
</div>

<div wire:poll.2s="api">
    @foreach ($satellites as $satellite)
        <p>{{ $satellite->name }}</p>
    @endforeach
</div>