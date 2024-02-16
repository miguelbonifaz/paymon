<x-app-layout>
    <x-slot name="header">
        Welcome, {{ auth()->user()->name }}
    </x-slot>
    testing!
</x-app-layout>
