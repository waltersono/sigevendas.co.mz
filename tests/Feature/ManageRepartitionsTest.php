<?php

namespace Tests\Feature;

use App\Models\Repartition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageRepartitionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    /** @test */
    public function can_a_repartition_be_created(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $central = $this->faker()->numberBetween(0,1);
        $division_id = $this->faker()->numberBetween(1,100); 
        $employee_id = $this->faker()->numberBetween(0,99);

        $response = $this->post("repartitions",[
            'designation' => $designation,
            'central' => $central,
            'division_id' => $division_id,
            'employee_id' => $employee_id
        ]);

        $this->assertCount(1,Repartition::all());
        $response->assertSessionHas("success");
        $response->assertRedirect("repartitions");
    }

    /** @test */
    public function can_a_repartition_be_updated(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $central = $this->faker()->numberBetween(0,1);
        $division_id = $this->faker()->numberBetween(1,99); 
        $employee_id = $this->faker()->numberBetween(0,99);

        $this->post("repartitions",[
            'designation' => $designation,
            'central' => $central,
            'division_id' => $division_id,
            'employee_id' => $employee_id
        ]);

        $repartition = Repartition::first();

        $designation = "New designation";
        $central = 0;
        $division_id = 100;
        $employee_id = 100;


        $response = $this->patch("repartitions/" . $repartition->id,[
            'designation' => $designation,
            'central' => $central,
            'division_id' => $division_id,
            'employee_id' => $employee_id
        ]);



        $this->assertEquals($designation, Repartition::first()->designation);
        $this->assertEquals($central, Repartition::first()->central);
        $this->assertEquals($division_id, Repartition::first()->division_id);
        $this->assertEquals($employee_id, Repartition::first()->head_of_repartition_id);

        $response->assertSessionHas("success");
        $response->assertRedirect("repartitions");
    }

    /** @test */
    public function can_a_repartition_be_deleted(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $central = $this->faker()->numberBetween(0,1);
        $division_id = $this->faker()->numberBetween(1,99); 
        $employee_id = $this->faker()->numberBetween(0,99);

        $this->post("repartitions",[
            'designation' => $designation,
            'central' => $central,
            'division_id' => $division_id,
            'employee_id' => $employee_id
        ]);

        $repartition = Repartition::first();

        $response = $this->delete("repartitions/" . $repartition->id);

        $this->assertCount(0, Repartition::all());
        $response->assertSessionHas("success");

    }


}
