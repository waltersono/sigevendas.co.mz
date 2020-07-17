<?php

use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $careers = [
            'Tecnico Informatico',
            'Contabilista',
            'Tecnico de Accao Social',
            'Tecnico de Recursos Humanos',
            'Jurista',
            'Auditor'
        ];

        for($i = 0; $i < count($careers); $i++){
            $career = new Career();
            $career->designation = $careers[$i];
            $career->save();
        }
    }
}
