<?php

use App\User\Models\User;

it('can login users', function () {
    $user = User::factory()->create([
        'password' => bcrypt($password = 'password'),
    ]);

    $this->postJson(route('auth.login'), [
        'email' => $user->email,
        'password' => $password,
    ])->assertCreated()
        ->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in',
        ]);
});

it('requires valid data', function ($error, $input) {
    $credentials = array_merge([
        'email' => 'test@gmail.com',
        'password' => 'password',
    ], [$error => $input]);

    $this->postJson('/api/auth/login', $credentials)->assertJsonValidationErrors($error);
})->with([
    'email is valid' => ['email', 'invalid-email'],
    'password is required' => ['password', null],
]);
