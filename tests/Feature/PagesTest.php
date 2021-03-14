<?php

use App\Providers\RouteServiceProvider;

use function Pest\Laravel\get;

it('can access landing if not authenticated')
    ->get('/')->assertStatus(200);

it('cannot access landing if authenticated')
    ->asUser()->get('/')
    ->assertRedirect(RouteServiceProvider::HOME);

it('can access a correct service type', function ($source, $expected) {
    get("/service?source={$source}")
        ->assertJson($expected);
})
->with([
    [1, ['to CSV!']],
    [2, ['to JSON!']],
]);

it('throws expection when accessing service with no source mapping')
    ->withoutExceptionHandling()
    ->get('/service?source=3')
    ->throws(BadMethodCallException::class);

it('gives an error message when accessing service with no source')
    ->get('/service')->assertJson(['Error']);
