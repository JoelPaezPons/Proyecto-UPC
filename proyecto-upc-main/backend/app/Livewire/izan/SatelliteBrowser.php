<?php

namespace App\Livewire\Izan;

use App\Models\Satellites;
use Livewire\Component;

class SatelliteBrowser extends Component
{
    // wire:model.live.debounce.300ms actualiza esta variable
    // pero espera 300ms para no hacer una petición por cada letra
    public string $query = '';

    public function render()
    {
        $satellites = Satellites::query()
            ->when($this->query, fn($q) => $q->search($this->query))
            ->orderBy('name')
            ->get();

        return view('livewire.izan.satellite-browser', [
            'satellites'  => $satellites,
            'resultCount' => $satellites->count(),
        ]);
    }
}