<?php

namespace App\Livewire\Izan;

use App\Models\Satellites;
use Livewire\Component;

class ConnectionMonitor extends Component
{
    // wire:poll actualiza esto cada 5s
    public function updateStatus(): void
    {
        // Simulamos que algún satélite cambia de estado aleatoriamente
        $satellite = Satellites::inRandomOrder()->first();

        if (!$satellite) return;

        $newStatus = $satellite->status === 'online' ? 'offline' : 'online';
        $satellite->update(['status' => $newStatus]);
    }

    // wire:click para cambiar el estado manualmente
    public function toggleStatus(int $id): void
    {
        $satellite = Satellites::find($id);

        if (!$satellite) return;

        $satellite->update([
            'status' => $satellite->status === 'online' ? 'offline' : 'online'
        ]);
    }

    public function render()
    {
        $satellites = Satellites::orderBy('name')->get();

        return view('livewire.izan.connection-monitor', compact('satellites'));
    }
}