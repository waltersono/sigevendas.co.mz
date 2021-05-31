<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Helper;
use App\Models\User;

class ManageAccount extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function can_a_user_update_info(){

        $name = $this->faker->firstName();
        $email = $this->faker->email();
        $password = $this->faker->password();

        $user = Helper::helperCreateNewUser($name, $email, $password);

        $newName = $this->faker->firstName();
        $newEmail = $this->faker->email();

        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $this->put('/profile/info/' . $user->id,[
            'name' => $newName,
            'email' => $newEmail
        ]);

        $this->assertEquals($newName, User::first()->name);
        $this->assertEquals($newEmail, User::first()->email);
    }

    /** @test */
    public function can_a_user_update_password(){

        $name = $this->faker->firstName();
        $email = $this->faker->email();
        $password = $this->faker->password(8);

        $user = Helper::helperCreateNewUser($name, $email, $password);

        $newPassword = $this->faker->password(8);

        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $response = $this->put('/profile/password/' . $user->id,[
            'current_password' => $password,
            'new_password' => $newPassword,
            'new_password_confirmation' => $newPassword
        ]);

        $this->assertTrue(app('hash')->check($newPassword, User::first()->password));
        $response->assertSessionHas('success','Palavra-passe actualizada com sucesso!');
    }
}
