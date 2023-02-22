<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->postJson('/api/auth/registration', [
            'name' => 'Dillinger',
            'email' => 'test@mail.ru',
            'password' => 'Dillinger655',
        ]);
        $response->assertOk();
    }

    public function testLogin()
    {
        User::factory()->create([
            'email' => $email = 'tests@mail.ru',
            'name' => 'dillinger',
            'password' => bcrypt($pass = 'Dillinger655'),
        ]);

        $response = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => $pass,
        ]);
        $response->assertStatus(200);
    }

    public function testLoginUnauthorized()
    {
        $response = $this->postJson('/api/auth/login', [
            'email' => 'tests@mail.ru',
            'name' => 'dillinger',
            'password' => bcrypt('Dillinger655'),
        ]);
        $response->assertUnauthorized();
    }

    public function testBrands()
    {
        $response = $this->postJson('/api/brands',
            [
                'name' => 'samsung',
        ]);
        $response->assertStatus(201);

        $response = $this->get('/api/brands',
        [
            'name' => 'samsung'
        ]);

        $response->assertStatus(200);
    }

}

