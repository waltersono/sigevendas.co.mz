<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            'DPE',
            'DAS',
            'DPD',
            'DAF',
            'DAC',
            'DRH',
            'UGEA'
        ];

        for($i = 0; $i < count($departments); $i++){
            $department = new Department();
            $department->designation = $departments[$i];
            $department->save();
        }
    }
}
