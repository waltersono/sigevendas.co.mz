<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;


class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Supplier::class, 90)->create();
    }
}
