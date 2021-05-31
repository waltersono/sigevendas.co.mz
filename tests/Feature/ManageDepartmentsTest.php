<?php

namespace Tests\Feature;

use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageDepartmentsTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function can_a_department_be_created(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $head_of_department_id = $this->faker()->numberBetween(0,99);

        $response = $this->post('/departments',[
            'designation' => $designation,
            'head_of_department_id' => $head_of_department_id
        ]);

        $this->assertCount(1,Department::all());
        $response->assertRedirect('departments');
        $response->assertSessionHas('success');
    }

    /** @test */
    public function can_a_department_be_updated(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $head_of_department_id = $this->faker()->numberBetween(0,99);

        $response = $this->post('/departments',[
            'designation' => $designation,
            'head_of_department_id' => $head_of_department_id
        ]);

        $this->assertCount(1,Department::all());

        $department = Department::first();

        $newDesignation = "New designation";
        $headOfDeparmentId = 100;

        $response = $this->patch('departments/' . $department->id,[
            'designation' => $newDesignation,
            'head_of_department_id' => $headOfDeparmentId
        ]);

        $this->assertEquals($newDesignation, Department::first()->designation);
        $this->assertEquals($headOfDeparmentId, Department::first()->head_of_department_id);
        $response->assertRedirect("departments");
        $response->assertSessionHas("success");
    }

    /** @test */
    public function can_a_department_be_deleted(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $head_of_department_id = $this->faker()->numberBetween(0,99);

        $response = $this->post('/departments',[
            'designation' => $designation,
            'head_of_department_id' => $head_of_department_id
        ]);

        $this->assertCount(1,Department::all());

        $department = Department::first();

        $response = $this->delete('departments/' . $department->id);

        $this->assertCount(0, Department::all());
        $response->assertSessionHas("success");
    }
}
