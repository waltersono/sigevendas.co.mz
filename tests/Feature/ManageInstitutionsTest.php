<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Institution;

class ManageInstitutionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function can_an_institution_be_created(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $address = $this->faker()->address;
        $contact_1 = $this->faker()->phoneNumber;
        $contact_2 = $this->faker()->phoneNumber;


        $response = $this->post("institutions",[
            'designation' => $designation,
            'address' => $address,
            'contact_1' => $contact_1,
            'contact_2' => $contact_2
        ]);

        $this->assertCount(1, Institution::all());
        $response->assertSessionHas("success");
        $response->assertRedirect("institutions");
    }

    /** @test */
    public function can_an_institution_be_updated(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $address = $this->faker()->address;
        $contact_1 = $this->faker()->phoneNumber;
        $contact_2 = $this->faker()->phoneNumber;


        $response = $this->post("institutions",[
            'designation' => $designation,
            'address' => $address,
            'contact_1' => $contact_1,
            'contact_2' => $contact_2
        ]);

        $Institution = Institution::first();

        $newDesignation = "New designation";
        $newAddress = "New address";
        $newContact_1 = "123456789";
        $newContact_2 = "987654321";


        $response = $this->patch("institutions/" . $Institution->id,[
            'designation' => $newDesignation,
            'address' => $newAddress,
            'contact_1' => $newContact_1,
            'contact_2' => $newContact_2
        ]);

        $this->assertEquals($newDesignation, Institution::first()->designation);
        $this->assertEquals($newAddress, Institution::first()->address);
        $this->assertEquals($newContact_1, Institution::first()->contact_1);
        $this->assertEquals($newContact_2, Institution::first()->contact_2);

        $response->assertSessionHas("success");
        $response->assertRedirect("institutions");
    }

    /** @test */
    public function can_an_institution_be_deleted(){
        $this->withExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        $designation = $this->faker()->word(6);
        $address = $this->faker()->address;
        $contact_1 = $this->faker()->phoneNumber;
        $contact_2 = $this->faker()->phoneNumber;


        $response = $this->post("institutions",[
            'designation' => $designation,
            'address' => $address,
            'contact_1' => $contact_1,
            'contact_2' => $contact_2
        ]);

        $Institution = Institution::first();

        $response = $this->delete("institutions/" . $Institution->id);

        $this->assertCount(0, Institution::all());
        $response->assertSessionHas("success");
    }
}
