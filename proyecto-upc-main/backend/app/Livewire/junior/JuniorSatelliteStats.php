<?php

namespace App\Livewire\Junior;

use Livewire\Component;
use App\Models\Satellites;

class JuniorSatelliteStats extends Component
{
    public Satellites $model;
    public string $name = 'Satellite_JR';
    /**
     * Satellite's unique International  ID 
     * @var string
     */
    public string $norad_id = 'RAST-JR01';
    public float $altitude = 0;
    /**
     * Satellite's speed / velocity
     * @var float
     */
    public float $speed = 0;
    /**
     * satellite's battery percentage %
     * @var int
     */
    public int $battery = 100;
    /**
     * Satellite status. It can either be "Operativo", "Alerta" or "Destruido"
     * @var string
     */
    public string $status = "Operativo";
    /**
     * Satellite's current mode. It can be "Standby", "Cientifico" or "Maniobra"
     * @var string
     */
    public string $mode = "Standby";
    public int $anomalies_count = 0;


    public function mount(): void
    {
        $this->addData();
    }

    public function addData(): void
    {
        $this->altitude = rand(400, 420) + round(mt_rand() / mt_getrandmax(), 2);
        if ($this->mode == "Cientifico" ) {
            $this->speed = $this->status == "Destruido" ? 0 : rand($this->speed - 300, $this->speed);    
        }elseif ($this->mode == "Standby") {
            rand($this->speed - 250, $this->speed);
        } 
        
        else {
            $this->speed = rand(2500, 3500);
        }
        
        // $this->fuel  = rand(10, 150);
        // $this->name = "Satellite_JR";
        // $this->norad_id = "RAST-JR01";
        if ($this->battery <= 15) {
            $this->status = "Alerta";
            $this->battery =  $this->mode == "Maniobra" ? $this->battery - rand(5, max: 15): $this->battery - rand(0, max: 5);
        } 
        

        if ($this->battery <= 0) {
            $this->battery = 0;
        } else {
            // $this->battery = $this->battery - rand(0, 5);
            $this->battery =  $this->mode == "Maniobra" ? $this->battery - rand(5, max: 15): $this->battery - rand(0, max: 5);
        }

        $this->anomalies_count = 0;
        $this->createModel();

    }
    public function createModel()
    {
        $modelExists = $this->fetchSatellite();
        if (isset($modelExists)) {
            //updte model in db with current data
            Satellites::where("name", "Satellite_JR")->update([
                "name" => $this->name,
                "norad_id" => $this->norad_id,
                "altitude" => $this->altitude,
                "velocity" => $this->speed,
                "battery" => $this->battery,
                "status" => $this->status,
                "mode" => $this->mode,
                "anomalies_count" => $this->anomalies_count
            ]);
            $this->model = $this->fetchSatellite();
        } else {
            // we create the model into de db
            $this->model = Satellites::create([
                "name" => $this->name,
                "norad_id" => $this->norad_id,
                "altitude" => $this->altitude,
                "velocity" => $this->speed,
                "battery" => $this->battery,
                "status" => $this->status,
                "mode" => $this->mode,
                "anomalies_count" => $this->anomalies_count
            ]);
        }
    }
    /**
     * Function used to reset the Satellite stats
     * @return void
     */
    public function resetModel()
    {
        $this->resetBattery();
        $this->chancheToStandby();
        $this->changeToOperative(); 
        Satellites::where("name", "Satellite_JR")->update([
            "name" => $this->name,
            "norad_id" => $this->norad_id,
            "altitude" => $this->altitude,
            "velocity" => $this->speed,
            "battery" => $this->battery,
            "status" => $this->status,
            "mode" => $this->mode,
            "anomalies_count" => $this->anomalies_count
        ]);
        $this->model = $this->fetchSatellite();

    }

    public function fetchSatellite()
    {
        return Satellites::where("name", "Satellite_JR")->first();
    }

    // battery reset
    public function resetBattery()
    {
        $this->battery = 100;
    }
    // Speed Modifiers
    public function addSpeed()
    {

        $this->speed = $this->speed + 100;
    }
    public function removeSpeed()
    {
        $this->speed = $this->speed - 100;
    }

    // change state
    public function changeToOperative()
    {
        $this->status = "Operativo";
    }

    public function changeToAlerta()
    {
        $this->status = "Alerta";
    }
    public function changeToDestroyed()
    {
        $this->speed = 0;
        $this->status = "Destruido";
    }



    // mode changers
    public function chancheToStandby()
    {
        $this->mode = "Standby";
    }

    public function changeModeToCientifico()
    {
        $this->mode = "Cientifico";
    }
    public function changeModeToManouver()
    {
        $this->mode = "Maniobra";
    }
    protected function rules(): array
    {
        return [
            'mode' => [
                'required',
                'in:Standby,Cientifico,Maniobra',
                function ($value, $error) {
                    if ($value === 'Maniobra') {
                        $battery = $this->fetchSatellite()->battery ?? 100;
                        if ($battery < 30) {
                            $error("No puedes Maniobrar con la bateria en {$battery}%.");
                        }
                    }
                },
            ],
        ];
    }
    public function render()
    {
        return view('livewire.junior.junior-satellite-stats');
    }
}