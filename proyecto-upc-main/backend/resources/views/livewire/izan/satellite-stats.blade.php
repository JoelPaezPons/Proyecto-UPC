<div wire:poll.5s="updateInformation" style="border:1px solid #ccc; padding:20px; border-radius:8px;">

    <h2>Telemetría en tiempo real</h2>

    <p>Altitud: {{ $altitude }} km</p>
    <p>Velocidad: {{ $speed }} km/h</p>
    <p>Batería:
        @if($battery < 15)
            <span style="color:red; font-weight:bold;">{{ $battery }}%</span>
            @else
            <span style="color:green; font-weight:bold;">{{ $battery }}%</span>
            @endif
    </p>

</div>