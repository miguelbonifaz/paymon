<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, LazilyRefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed', ['--class' => 'RoleSeeder']);
    }

    public function actingAsAdmin(): TestCase
    {
        $user = User::factory()->create();
        $user->assignRole('admin');

        return $this->actingAs($user);
    }

    public function actingAsUser(): TestCase
    {
        $user = User::factory()->create();
        $user->assignRole('user');

        return $this->actingAs($user);
    }
}
