<?php

namespace App\Livewire\Elena;

use App\Models\Alert;
use App\Models\Satellites;
use Livewire\Component;

class AlertSystem extends Component
{
    public int $anomalyCount = 0;
    public ?string $lastAlertTime = null;

    public function mount(): void
    {
        $this->anomalyCount = Alert::where('severity', 'RED')->count();
    }

    // wire:click llama a este método cuando pulsas el botón
    public function registerAlert(): void
    {
        $satellite = Satellites::where('status', 'error')
            ->inRandomOrder()
            ->firstOr(fn() => Satellites::inRandomOrder()->first());

        if (!$satellite) return;

        $messages = [
            'FALLO SENSOR SOLAR',
            'ANOMALÍA TÉRMICA DETECTADA',
            'PÉRDIDA SEÑAL TELEMETRÍA',
            'ERROR SISTEMA DE CONTROL',
            'DESVIACIÓN ORBITAL CRÍTICA',
        ];

        Alert::create([
            'satellite_id' => $satellite->id,
            'message'      => $messages[array_rand($messages)],
            'severity'     => 'RED',
            'detected_at'  => now(),
        ]);

        // Livewire actualiza la vista automáticamente al cambiar estas propiedades
        $this->anomalyCount++;
        $this->lastAlertTime = now()->format('H:i:s');
    }

    public function render()
    {
        $alerts = Alert::with('satellite')
            ->orderByDesc('detected_at')
            ->limit(20)
            ->get();

        return view('livewire.elena.alert-system', compact('alerts'));
    }
}