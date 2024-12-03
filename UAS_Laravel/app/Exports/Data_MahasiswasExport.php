<?php

namespace App\Exports;

use App\Models\Data_Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class Data_MahasiswasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data_Mahasiswa::all();
    }
}
