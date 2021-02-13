<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class UsersManagementTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->withoutExceptionHandling();
        factory(User::class, 3)->create();
        $response = $this->get('/users');
        $users = User::all();
        $response->assertViewIs('users.index');
        $response->assertViewIs('users', $users);
    }
}
