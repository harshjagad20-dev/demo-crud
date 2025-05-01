<?php

use App\Models\User;

it('returns a successful response', function () 
{
    $user = User::factory()->create();
    $response = $this->get('/user');
    dd($user);

    $response->assertStatus(200);
});
