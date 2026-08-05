<?php

use Illuminate\Support\Facades\Auth;

it('registers a user', function () {
    visit('/register')
        ->fill('name', 'Jonh Doe')
        ->fill('email', 'jonh@example.com')
        ->fill('password', 'password123!@#')
        ->click('Create Account')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    expect(Auth::user())->toMatchArray([
        'name' => 'Jonh Doe',
        'email' => 'jonh@example.com'
    ]);
});
