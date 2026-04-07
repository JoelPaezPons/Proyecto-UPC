@extends('layouts.app')
@section('titol', 'home')
@section('contingut')
    <div class="flex flex-col gap-6">
        <livewire:joel.satellite-stats />
        <livewire:joel.satellite-commander />
        <livewire:joel.satellite-browser />
        <livewire:joel.alert-system />
        <livewire:joel.thermal-shield />
    </div>
@endsection
