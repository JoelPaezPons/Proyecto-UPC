<?php

namespace App\Livewire\Joel;

use App\Models\Satellites;
use Livewire\Component;

class SatelliteBrowser extends Component
{
    // Esta variable se vincula al input de búsqueda
    public $search = '';

    public function render()
{
    
    $satellites = \App\Models\Satellites::where('name', 'LIKE', '%' . $this->search . '%')->get();

    return view('livewire.joel.satellite-browser', [
        'satellites' => $satellites
    ]);
}
}