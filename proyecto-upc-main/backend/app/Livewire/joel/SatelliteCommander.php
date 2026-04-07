<?php

namespace App\Livewire\Joel;

use App\Models\Satellites;
use Livewire\Component;

class SatelliteCommander extends Component
{
    public $targetSatelliteId;
    public $operationMode = 'STANDBY';
    public $mensaje = '';

    // Al cambiar el modo desde la vista, se ejecuta esto automáticamente
    public function updatedOperationMode($value)
{
    // 1. Buscamos el satélite
    $satellite = Satellites::find($this->targetSatelliteId);

    // 2. SEGURIDAD: Solo si el satélite existe, hacemos el update
    if ($satellite) {
        $satellite->update([
            'mode' => $value
        ]);
        $this->mensaje = "Modo actualizado a " . $value;
    } else {
        // Si es null, avisamos al usuario en lugar de petar
        $this->mensaje = "Error: Selecciona primero un satélite válido.";
    }
}

    public function render()
    {
        return view('livewire.joel.satellite-commander', [
            'satellites' => Satellites::all()
        ]);
    }
}