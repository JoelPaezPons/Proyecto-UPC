<div>
    <h3>Buscador</h3>
    
    <input 
        type="text" 
        wire:model.live.debounce.300ms="search" 
        placeholder="Buscar..." 
        style="color: black;"
    >

    <div wire:loading wire:target="search">Buscando...</div>

    <table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Batería</th> </tr>
    </thead>
    <tbody>
        @foreach($satellites as $sat)
            <tr>
                <td>{{ $sat->name }}</td>
                <td>{{ $sat->battery }}%</td> </tr>
        @endforeach
    </tbody>
</table>
</div>