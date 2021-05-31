<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\OrganicUnity;

class ManageOrganicUnitiesTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function can_an_organic_unities_be_created(){

        $this->withExceptionHandling();

        $designation = $this->faker->word(5);
        $general_manager_id = $this->faker->numberBetween(1,10);
        $deputy_director_id = $this->faker->numberBetween(1,10);

        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $response = $this->post('organicUnities',[
            'designation'   =>  $designation,
            'general_manager_id'    => $general_manager_id,
            'deputy_director_id' =>  $deputy_director_id
        ]);

        $this->assertCount(1, OrganicUnity::all());
        $response->assertRedirect('organicUnities');
        $response->assertSessionHas('success');
            
    }

    /** @test */
    public function a_designation_is_required(){
        
        $this->post('organic_unities',[
            'designation'   => ''
        ]);

        $this->assertCount(0, OrganicUnity::all());            
    }

    /** @test */
    public function can_an_organic_unities_be_updated(){

        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker->word(10);
        $general_manager_id = $this->faker->numberBetween(1,10);
        $deputy_director_id = $this->faker->numberBetween(1,10);

        $this->post('organicUnities',[
            'designation'   =>  $designation,
            'general_manager_id'    => $general_manager_id,
            'deputy_director_id' =>  $deputy_director_id
        ]);

        $this->assertCount(1, OrganicUnity::all());

        $organicUnity = OrganicUnity::first();

        $response = $this->patch('organicUnities/' . $organicUnity->id,[
            'designation'   =>  'New Designation',
            'general_manager_id'    => '100',
            'deputy_director_id' =>  '100'
        ]);

        $this->assertNotEquals(OrganicUnity::first()->designation, $organicUnity->designation);
        $this->assertNotEquals(OrganicUnity::first()->general_manager_id, $organicUnity->general_manager_id);
        $this->assertNotEquals(OrganicUnity::first()->deputy_director_id, $organicUnity->deputy_director_id);
        $response->assertRedirect('organicUnities');
        $response->assertSessionHas('success');
    }

    /** @test */
    public function can_an_organic_unities_be_deleted(){

        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker->word(4);
        $general_manager_id = $this->faker->numberBetween(1,10);
        $deputy_director_id = $this->faker->numberBetween(1,10);

        $this->post('organicUnities',[
            'designation'   =>  $designation,
            'general_manager_id'    => $general_manager_id,
            'deputy_director_id' =>  $deputy_director_id
        ]);

        $this->assertCount(1, OrganicUnity::all());

        $organicUnity = OrganicUnity::first();

        $response = $this->delete('organicUnities/' . $organicUnity->id);

        $this->assertCount(0, OrganicUnity::all());
        $response->assertSessionHas('success');
    }
}
