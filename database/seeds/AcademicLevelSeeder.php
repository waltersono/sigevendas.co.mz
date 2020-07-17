<?php

use Illuminate\Database\Seeder;
use App\Models\AcademicLevel;

class AcademicLevelSeeder extends Seeder
{
   

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $academicLevels = [
            'N/A',
            'Elementar',
            'Basico Geral',
            'Medio Geral',
            'Medio Profissional',
            'Superior',
            'Mestre',
            'Doutorado'
        ];

        for($i = 0; $i < count($academicLevels); $i++){
            $academicLevel = new AcademicLevel();
            $academicLevel->designation = $academicLevels[$i];
            $academicLevel->save();
        }
    }
}
