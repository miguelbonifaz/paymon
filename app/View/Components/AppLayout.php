<?php

namespace App\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function menu(): Collection
    {
        return collect([
            [
                'name' => 'Dashboard',
                'url' => route('dashboard'),
                'showMenu' => auth()->user()->hasRole(['admin', 'user']),
                'isActive' => request()->routeIs('dashboard'),
            ],
            [
                'name' => 'Upload videos',
                'url' => route('admin.videos.index'),
                'showMenu' => auth()->user()->hasRole(['admin']),
                'isActive' => request()->routeIs('admin.videos.*'),
            ],
            [
                'name' => 'Analytics',
                'url' => route('admin.analytics.index'),
                'showMenu' => auth()->user()->hasRole(['admin']),
                'isActive' => request()->routeIs('admin.analytics.index'),
            ],
            [
                'name' => 'Videos',
                'url' => route('videos.index'),
                'showMenu' => auth()->user()->hasRole(['user']),
                'isActive' => request()->routeIs('videos.*'),
            ],
        ]);
    }

    public function render(): View
    {
        return view('layouts.app');
    }
}
