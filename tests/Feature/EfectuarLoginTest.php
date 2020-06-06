<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\Helper;

class EfectuarLoginTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function can_a_user_login(){
        
        $name = $this->faker->firstName();
        $email = $this->faker->email();
        $password = $this->faker->word();

        Helper::helperCreateNewUser($name, $email, $password);

        $response = $this->post('/authenticate',[
            'email' => $email,
            'password' => $password
        ]);

        $response->assertRedirect('dashboard');
    }

    /** @test */
    public function an_email_is_required(){

        $password = $this->faker->word();

        $response = $this->post('/authenticate',[
            'email' => '',
            'password' => $password
        ]);

        $response->assertSessionHasErrors();

        $response->assertRedirect('/');
    }

    /** @test */
    public function a_password_is_required(){

        $email = $this->faker->email();

        $response = $this->post('/authenticate',[
            'email' => $email,
            'password' => ''
        ]);

        $response->assertSessionHasErrors();

        $response->assertRedirect('/');
    }

    /** @test */
    public function can_an_invalid_user_be_denied(){

        $response = $this->post('/authenticate',[
            'email' => 'invalid_email',
            'password' => 'invalid_password'
        ]);

        $response->assertRedirect('/');
    }

}
