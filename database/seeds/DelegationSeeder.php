<?php

use Illuminate\Database\Seeder;
use App\Models\Delegation;

class DelegationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $delegations = [
            'INAS Maputo Cidade',
            'INAS Matola',
            'INAS Manhica',
            'INAS Xai-xai',
            'INAS Chibuto',
            'INAS Chokwe',
            'INAS Chicualacuala',
            'INAS Inhambane',
            'INAS Maxixe',
            'INAS Vilanculos',
            'INAS Chimoio',
            'INAS Barue',
            'INAS Machanga',
            'INAS Beira',
            'INAS Caia',
            'INAS Tete',
            'INAS Moatize',
            'INAS Maravia',
            'INAS Quelimane',
            'INAS Mocuba',
            'INAS Gorue',
            'INAS Angoche',
            'INAS Nampula',
            'INAS Ribaue',
            'INAS Nacala',
            'INAS Cuamba',
            'INAS Marupa',
            'INAS Pemba',
            'INAS Motepuez',
            'INAS Mocimboa da Praia'
        ];

        for($i = 0; $i < count($delegations); $i++){
            $delegation = new Delegation();
            $delegation->designation = $delegations[$i];
            $delegation->save();
        }
        
    }
}
