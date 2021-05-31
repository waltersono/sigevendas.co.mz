<?php

namespace Tests\Feature;

use App\Models\AcademicLevel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageAcademicLevesTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function can_an_academic_level_be_created(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);

        $response = $this->post("academicLevels",[
            'designation' => $designation
        ]);

        $this->assertCount(1, AcademicLevel::all());
        $response->assertSessionHas("success");
        $response->assertRedirect("academicLevels");
    }

    /** @test */
    public function can_an_academic_level_be_updated(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);

        $this->post("academicLevels",[
            'designation' => $designation
        ]);

        $academicLevel = AcademicLevel::first();

        $newDesignation = "New designation";

        $response = $this->patch("academicLevels/" . $academicLevel->id,[
            'designation' => $newDesignation
        ]);

        $this->assertEquals($newDesignation, AcademicLevel::first()->designation);
        $response->assertSessionHas("success");
        $response->assertRedirect("academicLevels");
    }

    /** @test */
    public function can_an_academic_level_be_deleted(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);

        $this->post("academicLevels",[
            'designation' => $designation
        ]);

        $academicLevel = AcademicLevel::first();


        $response = $this->delete("academicLevels/" . $academicLevel->id);

        $this->assertCount(0, AcademicLevel::all());
        $response->assertSessionHas("success");
    }

}
