@extends('layouts.app')
@section('titol', 'home')
@section('contingut')
<div class="flex flex-col gap-6">
        <livewire:izan.satellite-stats /> 
        <livewire:izan.satellite-commander />
        <livewire:izan.satellite-browser />
        <livewire:izan.alert-system/> 
</div>
@endsection