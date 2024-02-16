<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        
        $admin = User::factory()->create(['email' => 'admin@gmail.com']);
        $user = User::factory()->create(['email' => 'user@gmail.com']);

        $admin->assignRole('admin');
        $user->assignRole('user');

        $videos = File::files(resource_path('videos'));

        foreach ($videos as $videoFile) {
            $destinationPath = "videos/{$videoFile->getFilename()}";
            Storage::disk('public')->putFileAs('/', $videoFile, $destinationPath);

            $filename = pathinfo($videoFile->getFilename(), PATHINFO_FILENAME);

            Video::factory()->create([
                'url' => "storage/{$destinationPath}",
                'title' => $filename,
            ]);
        }
    }
}