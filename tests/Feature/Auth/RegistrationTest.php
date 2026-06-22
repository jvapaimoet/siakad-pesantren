<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'role' => 'santri',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('new ustadz users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Ustadz User',
        'email' => 'ustadz@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'role' => 'ustadz',
    ]);

    $this->assertAuthenticated();
    $this->assertSame('ustadz', auth()->user()->role);
    $response->assertRedirect(route('dashboard', absolute: false));
});
