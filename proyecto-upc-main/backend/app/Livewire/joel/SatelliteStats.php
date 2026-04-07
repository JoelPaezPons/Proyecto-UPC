<?php

namespace App\Livewire\Joel;

use Livewire\Component;

class SatelliteStats extends Component
{
    public float $altitude = 0;
    public float $speed = 0;
    public int $battery = 0;
    public string $status = "";

    public function mount(): void
    {
        $this->Actualizar();
    }

    public function Actualizar(): void
    {
        $this->altitude = rand(350, 450);
        $this->speed    = rand(25000, 30000);
        $this->battery  = rand(5, 100);
        $this->status   = ($this->battery < 20) ? "MODO AHORRO" : "OPERATIVO";
    }

    public function reiniciar(): void
    {
        if ($this->battery > 20) {
            $this->status = "REINICIANDO...";
        }
    }
    
    public function render()
    {
        return view('livewire.joel.satellite-stats');
    }
}