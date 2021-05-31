<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Delegation;

class ManageDelegationsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function can_a_delegation_be_created(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $deputy_id = $this->faker()->numberBetween(0,99);

        $response = $this->post('/delegations',[
            'designation' => $designation,
            'deputy_id' => $deputy_id
        ]);

        $this->assertCount(1,Delegation::all());
        $response->assertRedirect('delegations');
        $response->assertSessionHas('success');
    }

    /** @test */
    public function can_a_delegation_be_updated(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $deputy_id = $this->faker()->numberBetween(0,99);

        $response = $this->post('/delegations',[
            'designation' => $designation,
            'deputy_id' => $deputy_id
        ]);

        $this->assertCount(1,Delegation::all());

        $delegation = Delegation::first();

        $newDesignation = "New designation";
        $deputyId = 1;

        $response = $this->patch('delegations/' . $delegation->id,[
            'designation' => $newDesignation,
            'deputy_id' => $deputyId
        ]);

        $this->assertEquals($newDesignation, Delegation::first()->designation);
        $this->assertEquals($deputyId, Delegation::first()->deputy_id);
        $response->assertRedirect("delegations");
        $response->assertSessionHas("success");
    }

    /** @test */
    public function can_a_delegation_be_deleted(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $deputy_id = $this->faker()->numberBetween(0,99);

        $response = $this->post('/delegations',[
            'designation' => $designation,
            'deputy_id' => $deputy_id
        ]);

        $this->assertCount(1,Delegation::all());

        $delegation = Delegation::first();

        $response = $this->delete('delegations/' . $delegation->id);

        $this->assertCount(0, Delegation::all());
        $response->assertSessionHas("success");
    }
}
