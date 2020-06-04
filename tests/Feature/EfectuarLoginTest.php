<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class EfectuarLoginTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_a_user_login(){
        //$this->withExceptionHandling();

        $email = 'root@root.com';
        $password = bcrypt('password');

        $response = $this->post('/signIn',[
            'email' => $email,
            'password' => $password
        ]);

        $user = User::where('email',$email)->first();
        
        $response->assertRedirect('home');
        
    }
}
