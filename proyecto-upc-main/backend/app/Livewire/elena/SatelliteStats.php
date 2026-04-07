<?php

namespace App\Livewire\Elena;

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

    public function updateInformation(): void
    {
        $this->altitude = rand(400, 420);
        $this->speed    = rand(25000, 30000);
        $this->battery  = rand(5, 100);
    }

    public function render()
    {
        return view('livewire.elena.satellite-stats');
    }
}