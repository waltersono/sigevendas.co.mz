<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Career;

class ManageCareersTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function can_an_career_be_created(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);

        $response = $this->post("careers",[
            'designation' => $designation
        ]);

        $this->assertCount(1, Career::all());
        $response->assertSessionHas("success");
        $response->assertRedirect("careers");
    }

    /** @test */
    public function can_an_career_be_updated(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);

        $this->post("careers",[
            'designation' => $designation
        ]);

        $career = Career::first();

        $newDesignation = "New designation";

        $response = $this->patch("careers/" . $career->id,[
            'designation' => $newDesignation
        ]);

        $this->assertEquals($newDesignation, Career::first()->designation);
        $response->assertSessionHas("success");
        $response->assertRedirect("careers");
    }

    /** @test */
    public function can_an_career_be_deleted(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);

        $this->post("careers",[
            'designation' => $designation
        ]);

        $career = Career::first();


        $response = $this->delete("careers/" . $career->id);

        $this->assertCount(0, Career::all());
        $response->assertSessionHas("success");
    }
}
