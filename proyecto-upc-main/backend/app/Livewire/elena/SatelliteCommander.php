<?php

namespace App\Livewire\Elena;

use App\Models\Satellites;
use Livewire\Component;

class SatelliteCommander extends Component
{
    public int    $targetSatelliteId;
    public string $operationMode = 'STANDBY';
    public string $mensaje = '';

    public array $modes = ['STANDBY', 'CIENTÍFICO', 'MANIOBRA'];

    protected function rules(): array
    {
        return [
            'operationMode' => [
                'required',
                'in:STANDBY,CIENTÍFICO,MANIOBRA',
                function ($value, $error) {
                    if ($value === 'MANIOBRA') {
                        $battery = Satellites::find($this->targetSatelliteId)?->battery ?? 100;
                        if ($battery < 20) {
                            $error("No puedes usar MANIOBRA con batería al {$battery}%.");
                        }
                    }
                },
            ],
        ];
    }

    public function mount(): void
    {
        $sat = Satellites::first();
        $this->targetSatelliteId = $sat?->id ?? 1;
        $this->operationMode     = $sat?->mode ?? 'STANDBY';
    }

    // Livewire llama esto solo cuando cambia operationMode
    public function updatedOperationMode(string $value): void
    {
        $this->validate();
        Satellites::where('id', $this->targetSatelliteId)->update(['mode' => $value]);
        $this->mensaje = "Modo $value guardado correctamente.";
    }

    public function render()
    {
        $satellites = Satellites::orderBy('name')->get();
        return view('livewire.elena.satellite-commander', compact('satellites'));
    }
}