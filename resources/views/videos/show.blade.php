<x-app-layout>
    <x-slot name="header">
        {{ $video->title }}
    </x-slot>

    <livewire:videos.show-video :video-id="$video->id"/>
</x-app-layout>