<?php

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Contracts\Auth\Authenticatable;

use App\Models\User;

uses(TestCase::class, RefreshDatabase::class)->in('Feature');

/**
 * -----------------------------------------------------------------------
 *  Helpers
 * -----------------------------------------------------------------------
 */

/**
 * Set the currently logged in user for the application.
 *
 * @return TestCase
 */
function actingAs(Authenticatable $user, string $driver = null)
{
    return test()->actingAs($user, $driver);
}

/**
 * Set actingAs as a signed in dummy user.
 *
 * @return TestCase
 */
function asUser()
{
    return actingAs(User::factory()->create());
}

/**
 * Define LARAVEL_START constant.
 */

define('LARAVEL_START', microtime(true));
