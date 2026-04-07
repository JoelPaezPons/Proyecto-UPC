<div>
    <div wire:poll.5s="addData">
        <div class="inline-flex justify-between w-[25rem]">
            <h4><strong>International ID:</strong> {{ $model->norad_id }}</h4>
            <p><strong>Name: </strong>{{ $model->name }}</p>
        </div>
        
        <p><strong>Altitute: </strong> {{ $model->altitude }}m</p>
        <p><strong>Current Speed: </strong> {{ $model->velocity }}km/h</p>
        <p><strong>Battery:</strong> {{ $model->battery }}</p>
        <p><strong>Status:</strong> {{ $model->status }}</p>
        <p><strong>Mode:</strong> {{ $model->mode }}</p>

    </div>

    <h5>Controls</h5>
    
    <div class="flex flex-col">
        
        <div >
            <!--Reset battery -->
            <button wire:click="resetBattery" class="text-bold">Reset Baterry</button>
            <span> | </span>
            <!--Speed controls-->
            <button wire:click="addSpeed" class="text-bold">Add Speed</button>
            <span> | </span>
            <button wire:click="removeSpeed" class="text-bold">Remove Speed</button>
        </div>
        <!--state controls-->
        <div>
            <button wire:click="changeToOperative" class="text-bold">Change Mode To Operative</button>
            <span> | </span>
            <button wire:click="changeToAlerta" class="text-bold">Change mode To Alerta</button>
            <span> | </span>
            <button wire:click="changeToDestroyed" class="text-bold">Change Mode to Destroyed</button>
        </div>

        <!--Mode controls-->

        <div class="">
            <button wire:click="chancheToStandby">Change to Standby</button>
            <span> | </span>
            <button wire:click="changeModeToCientifico">change to Cientifico</button>
            <span> | </span>
            <button wire:click="changeModeToManouver">Change to Manouver</button>
            <span> | </span>
            <button wire:click="resetModel">Reset Satellite</button>
        </div>


    </div>
    @error("Maniobra")
    <p>{{ $model->maniobra }}</p>
    @enderror
    <!--Loading Message-->
    <div wire:loading>
        <div>Loading stats....</div>
    </div>
</div>
