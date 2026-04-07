<?php

namespace App\Livewire\Joel;

use Livewire\Component;

class ThermalShield extends Component
{
    public float $temperature = 50.0;
    public bool $isCooling = false;
    public string $warning = "";

    // Simula que la temperatura sube cada 3 segundos
    public function ambientHeat()
    {
        if (!$this->isCooling) {
            $this->temperature += rand(5, 15);
        } else {
            $this->temperature -= rand(10, 20);
            if ($this->temperature < 40) $this->isCooling = false;
        }

        // Regla de negocio: Alerta crítica si supera los 150 grados
        $this->warning = ($this->temperature > 150) ? "⚠️ ¡PELIGRO! ESCUDO CRÍTICO" : "";
    }

    public function activateCooling()
    {
        $this->isCooling = true;
    }

    public function render()
    {
        return view('livewire.joel.thermal-shield');
    }
}