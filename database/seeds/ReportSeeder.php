<?php

use Illuminate\Database\Seeder;
use App\Models\Report;
class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reports = [
            'Informacao do Nivel Academico',
            'Funcionarios Estudantes',
            'Funcionarios Graduados',
            'Funcionarios Formados na Area Especifica'
        ];

        for($i = 0; $i < count($reports); $i++){
            $report = new Report();
            $report->designation = $reports[$i];
            $report->save();
        }
    }
}
