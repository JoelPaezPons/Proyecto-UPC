<?php

namespace App\Livewire\Joel;

use App\Models\Alert;
use App\Models\Satellites;
use Livewire\Component;

class AlertSystem extends Component
{
    public $satelliteId;
    public $mensajeAlerta = "Anomalía en sensores térmicos";
    public $totalAlertas = 0;

    public function mount()
    {
        $this->totalAlertas = Alert::count();
    }

    public function registrarAlerta()
    {
        
        if (!$this->satelliteId) {
            return;
        }

        // Creamos la alerta en la base de datos
        Alert::create([
            'satellite_id' => $this->satelliteId,
            'message'      => $this->mensajeAlerta,
            'severity'     => 'RED',
            'detected_at'  => now(),
        ]);

        $this->totalAlertas++;
        session()->flash('status', '🚨 Alerta registrada en el diario de misión.');
    }

    public function render()
    {
        return view('livewire.joel.alert-system', [
            'satellites' => Satellites::all(),
            'ultimasAlertas' => Alert::latest()->take(5)->get()
        ]);
    }
}