<?php

use Illuminate\Database\Seeder;
use App\Models\Repartition;
use App\Models\Department;
use App\Models\Delegation;

class RepartitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dpe = [
            'RPE',
            'RMA',
            'RTICI'
        ];

        $drh = [
            'RF',
            'RGP'
        ];

        $das = [
            'RAS',
            'RSS'
        ];

        $dpd = [
            'RDP',
            'RPIGR'
        ];

        $daf = [
            'RC',
            'RP'
        ];

        $dac = [
            'RAC',
            'RA'
        ];

        $ugea = [
            'RAC'
        ];

        $repartitions = [
            'RPE',
            'RMA',
            'RTICI',
            'RAF',
            'RP',
            'RPD',
            'RAS',
            'RRH',
            'RA'
        ];

        $delegations = Delegation::all();

        for($i = 0; $i < count($dpe); $i++){
            $repartition = new Repartition();
            $repartition->designation = $dpe[$i];
            $repartition->central = 1;
            $repartition->division_id = Department::where('designation','DPE')->first()->id;
            $repartition->save();
        }

        for($i = 0; $i < count($drh); $i++){
            $repartition = new Repartition();
            $repartition->designation = $drh[$i];
            $repartition->central = 1;
            $repartition->division_id = Department::where('designation','DRH')->first()->id;
            $repartition->save();
        }

        for($i = 0; $i < count($das); $i++){
            $repartition = new Repartition();
            $repartition->designation = $das[$i];
            $repartition->central = 1;
            $repartition->division_id = Department::where('designation','DAS')->first()->id;
            $repartition->save();
        }

        for($i = 0; $i < count($dpd); $i++){
            $repartition = new Repartition();
            $repartition->designation = $dpd[$i];
            $repartition->central = 1;
            $repartition->division_id = Department::where('designation','DPD')->first()->id;
            $repartition->save();
        }

        for($i = 0; $i < count($dac); $i++){
            $repartition = new Repartition();
            $repartition->designation = $dac[$i];
            $repartition->central = 1;
            $repartition->division_id = Department::where('designation','DAC')->first()->id;
            $repartition->save();
        }

        for($i = 0; $i < count($daf); $i++){
            $repartition = new Repartition();
            $repartition->designation = $daf[$i];
            $repartition->central = 1;
            $repartition->division_id = Department::where('designation','DAF')->first()->id;
            $repartition->save();
        }

        for($i = 0; $i < count($ugea); $i++){
            $repartition = new Repartition();
            $repartition->designation = $ugea[$i];
            $repartition->central = 1;
            $repartition->division_id = Department::where('designation','UGEA')->first()->id;
            $repartition->save();
        }

        for($i = 0; $i < count($delegations); $i++){
            for($j = 0; $j < count($repartitions); $j++){
                $repartition = new Repartition();
                $repartition->designation = $repartitions[$j];
                $repartition->central = 0;
                $repartition->division_id = Delegation::where('id',$delegations[$i]->id)->first()->id;
                $repartition->save();
            }
        }



    }
}
