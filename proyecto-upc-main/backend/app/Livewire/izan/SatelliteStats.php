<?php

namespace App\Livewire\Izan;

use App\Models\Satellites;
use Livewire\Component;

class SatelliteStats extends Component
{
    public float $altitude = 0;
    public float $speed = 0;
    public int $battery = 0;

    public function mount(): void
    {
        $this->updateInformation();
    }

    // wire:poll llama a esto cada 5s
    public function updateInformation(): void
    {
        $this->altitude = rand(400, 420);
        $this->speed    = rand(27000, 28000);
        $this->battery  = rand(5, 100);
    }

    public function render()
    {
        return view('livewire.izan.satellite-stats');
    }
}