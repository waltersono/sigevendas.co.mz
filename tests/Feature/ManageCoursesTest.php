<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageCoursesTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function can_a_course_be_created(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $data = [
            'designation' => $this->faker()->word(6),
            'academicLevel_id' => $this->faker()->numberBetween(1,99),
            'type'  => $this->faker()->randomElement(array('long','short')),
            'duration' => $this->faker()->numberBetween(1,3650),
            'institution_id' => $this->faker()->numberBetween(1,99),
            'content' => $this->faker()->sentence(20)

        ];

        $response = $this->post('courses',$data);

        $this->assertCount(1, Course::all());
        $response->assertSessionHas('success');
    }

    /** @test */
    public function can_a_course_be_updated(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $data = [
            'designation' => $this->faker()->word(6),
            'academicLevel_id' => $this->faker()->numberBetween(1,99),
            'type'  => $this->faker()->randomElement(array('long','short')),
            'duration' => $this->faker()->numberBetween(1,3650),
            'institution_id' => $this->faker()->numberBetween(1,99),
            'content' => $this->faker()->sentence(20)

        ];

        $this->post('courses',$data);

        $course = Course::first();

        $newData = [
            'designation' => $this->faker()->word(6),
            'academicLevel_id' => $this->faker()->numberBetween(1,99),
            'type'  => $this->faker()->randomElement(array('long','short')),
            'duration' => $this->faker()->numberBetween(1,3650),
            'institution_id' => $this->faker()->numberBetween(1,99)
        ];

        $response = $this->patch('courses/' . $course->id, $newData);

        $this->assertEquals($newData['designation'], Course::first()->designation);
        $this->assertEquals($newData['academicLevel_id'], Course::first()->academicLevel_id);
        $this->assertEquals($newData['type'], Course::first()->type);
        $this->assertEquals($newData['duration'], Course::first()->duration);

        $response->assertSessionHas('success');
    }


    /** @test */
    public function can_a_course_be_deleted(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $data = [
            'designation' => $this->faker()->word(6),
            'academicLevel_id' => $this->faker()->numberBetween(1,99),
            'type'  => $this->faker()->randomElement(array('long','short')),
            'duration' => $this->faker()->numberBetween(1,3650),
            'institution_id' => $this->faker()->numberBetween(1,99),
            'content' => $this->faker()->sentence(20)

        ];

        $this->post('courses',$data);

        $course = Course::first();

        $response = $this->delete('courses/' . $course->id);

        $this->assertCount(0, Course::all());
        $response->assertSessionHas('success');
    }

    /** @test */
    public function can_a_course_be_shown(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $data = [
            'designation' => $this->faker()->word(6),
            'academicLevel_id' => $this->faker()->numberBetween(1,99),
            'type'  => $this->faker()->randomElement(array('long','short')),
            'duration' => $this->faker()->numberBetween(1,3650),
            'institution_id' => $this->faker()->numberBetween(1,99),
            'content' => $this->faker()->sentence(20)

        ];

        $this->post('courses',$data);

        $course = Course::first();

        $response = $this->get('courses/' . $course->id);

        $response->assertStatus(200);
    }

    
}
