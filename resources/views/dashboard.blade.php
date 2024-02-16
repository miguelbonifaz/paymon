<x-app-layout>
    <x-slot name="header">
        Welcome, {{ auth()->user()->name }}
    </x-slot>
    <p class="text-gray-600">
        Choose a menu from the left side to get started.
    </p>
</x-app-layout>
