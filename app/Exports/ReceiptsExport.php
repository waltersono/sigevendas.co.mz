<?php

namespace App\Exports;

use App\Models\Receipt;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReceiptsExport implements FromCollection
{
    public function collection()
    {
        return Receipt::all();
    } 
} 