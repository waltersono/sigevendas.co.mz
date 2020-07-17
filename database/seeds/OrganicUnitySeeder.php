<?php

use Illuminate\Database\Seeder;
use App\Models\OrganicUnity;

class OrganicUnitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrganicUnity::class, 1)->create();
    }
}
