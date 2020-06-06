<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Tests\Helper;

class EfectuarLogoutTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    
    /** @test */
    public function can_a_user_logout(){

        $this->withExceptionHandling();

        $name = $this->faker->firstName();
        $email = $this->faker->email();
        $password = $this->faker->word();

        Helper::helperCreateNewUser($name, $email, $password);

        $response = $this->post('/authenticate',[
            'email' => $email,
            'password' => $password
        ]);

        $response->assertRedirect('dashboard');

        $response = $this->get('/logout');

        $response->assertRedirect('login');
    }
}
