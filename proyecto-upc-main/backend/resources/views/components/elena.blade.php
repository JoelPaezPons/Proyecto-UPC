@extends('layouts.app')
@section('titol', 'home')
@section('contingut')
<div class="flex flex-col gap-6">
        <livewire:elena.satellite-stats /> 
        <livewire:elena.satellite-commander />
        <livewire:elena.satellite-browser />
        <livewire:elena.alert-system/> 
</div>
@endsection