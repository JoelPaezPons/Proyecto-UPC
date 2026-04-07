<?php

namespace App\Livewire\Elena;

use App\Models\Satellites;
use Livewire\Component;

class SatelliteBrowser extends Component
{
    public string $query = '';

    public function render()
    {
        $satellites = Satellites::query()
            ->when($this->query, fn($q) => $q->search($this->query))
            ->orderBy('name')
            ->get();

        return view('livewire.elena.satellite-browser', [
            'satellites'  => $satellites,
            'resultCount' => $satellites->count(),
        ]);
    }
}