<?php

namespace App\Livewire\Eduardo;


use App\Models\Satellites;
use Livewire\Component;

class SatelliteStats extends Component
{
    public float $altitude = 0;
    public float $speed = 0;
    public int $battery = 0;

    public $satellites = [];
    
    public function mount(): void
    {
        $this->refreshTelemetry();
    }

    public function refreshTelemetry(): void
    {
        $this->altitude = rand(400, 420) + round(mt_rand() / mt_getrandmax(), 2);
        $this->speed    = rand(27000, 28000);
        $this->battery  = rand(5, 100);
    }

    public function api(){
        $this->satellites = Satellites::all();
    }

    public function render()
    {
        return view('livewire.eduardo.satellite-stats');
    }
}